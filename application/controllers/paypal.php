<?php
//if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{

	public function __construct(){

		parent::__construct();

        $mode = 'live';

        if ($mode == 'live') {
            $this->_url = 'https://www.paypal.com/cgi-bin/webscr';
        } else{
            $this->_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
        }
        $this->load->model('adminModel');
        $this->load->model('bookingModel');

    }


    //View the form from which it goes to paypal - dont alter the form fields in that view
    public function index(){

        

        $post = $this->input->post();
        
        

        //echo $date . "<br />";
        $theMonth = $months[$post['month']-1];

        $rn = (($roomName=='Twin')?'TR':(($roomName=='Double')?'DR':(($roomName=='King Double')?'KD':'')));

        $itemName = $roomName.' Room on '.$theMonth.' '.$post['day'].', '.$post['year'];


        // 121212/KR/004


        $itemNumber = $date.'/'.$rn.'/'.$count;

        //echo $itemNumber;

        $paypal['amount']=$price; // Enter Your Product Price Here without currency sign ($ etc.)
        //$paypal['business']="team_1355029199_biz@redatomstudios.com"; //Enter Your Email Here
        $paypal['business']="sales@give-as-one.com"; //Enter Your Email Here
        $paypal['site_url']="http://www.give-as-one.com";  //enter your website url
        $paypal['continue_button_text']="Click Here To Continue"; //This text will be on the Button That prompts buyer to return to your site to get the download
        $paypal['item_name']= $itemName; //Name of your product. Change this if  you want to check item name before processing.
        $paypal['notify_url']="http://www.give-as-one.com/paypal/notify"; // Or use ipn_curl.php if the your IPN doesn't work properly (timeouts, etc.)
                               
        $paypal['item_number']=$itemNumber; //Item number. Optional.
        $paypal['success_url']="http://www.theorangetreehotel.com/paypal/success";
        $paypal['cancel_url']="http://theorangetreehotel.com/home/index/3";
        // // -- End Main Settings --

        // // Other Settings (Changing these are optional)
        // $paypal['image_url']=base_url()."/resources/branding/Logo.png";
        $paypal['return_method']="2"; //1=GET 2=POST
        $paypal['currency_code']="GBP"; //[USD,GBP,JPY,CAD,EUR]
        $paypal['lc']="UK";

        //$paypal['url']="https://www.sandbox.paypal.com/cgi-bin/webscr";
        $paypal['url']="https://www.paypal.com/cgi-bin/webscr";
        $paypal['post_method']="libCurl"; //fso=fsockopen(); curl=curl command line libCurl=php compiled with libCurl support
        // $paypal['curl_location']="/usr/local/bin/curl";

        $paypal['bn']="toolkit-php";
        $paypal['cmd']="_xclick";

        // //Payment Page Settings
        // $paypal['display_comment']="0"; //0=yes 1=no
        // $paypal['comment_header']="Comments";
        // $paypal['background_color']=""; //""=white 1=black
        // $paypal['display_shipping_address']=""; //""=yes 1=no
        // $paypal['display_comment']="1"; //""=yes 1=no


        // //Product Settings
        $paypal['on0']= "Booking Number";
        $paypal['os0']= $itemNumber;

              

        $this->load->view('paypal/paypalVerify',$paypal);
    }


    //Runs automatically after returning from paypal - No output will be displayes
    //So, no point in giving echos
    //You can give file write though
	public function notify(){

		$postFields = 'cmd=_notify-validate';

        foreach($_POST as $key => $value)
        {
                $postFields .= "&$key=".urlencode($value);
        }

        $ch = curl_init();
        curl_setopt_array($ch, array(
                CURLOPT_URL => $this->_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $postFields
        ));

        $result = curl_exec($ch);
        curl_close($ch);

        $str = $result;
        $postsFlds = explode('&', $postFields);

        foreach ($postsFlds as $value) {
            $p = explode('=', $value);
            $posts[$p[0]] = urldecode($p[1]);
        }


        foreach ($posts as $key => $value) {
            $str .= "<br />".$key.": ".$value;
        }

        $str .= "THE FINAL TESTING!!!!";
        $fh = fopen('.'.base_url().'resources/testing/result.html', 'w');
        fwrite($fh, $str);
        fclose($fh);

        if($result == 'VERIFIED'){

            /*
            Verify Room Price against Room Types on that date
            Update Database
            Send mail to buyer
            Send mail to admin
            */
            $str = 'Initial Verification Complete';

            

            //Verify Further
            $date = $posts['item_number'];
            $nameOfItem = $posts['item_name'];

            $temps = explode(' ', $nameOfItem);
            $roomName = $temps[0]/*.' '.$temps[1]*/;

            $data = explode('/', $date);
            $dateExtracted = $data[0];
            $roomNumber = $data[2];

            $year = ('20'.substr($dateExtracted, 4, 2));
            $month = (substr($dateExtracted, 2, 2));
            $dat = (substr($dateExtracted, 0, 2));

            $M_values = array(0, 3, 3, 6, 1, 4, 6, 2, 5, 0, 3, 5);
            $C = 5;
            $Y = $year % 100;
            $L = floor($Y/4) + ($year % 400 == 0 ? 1 - ($month == 1 || $month == 2 ? 1 : 0) : 0);
            $M = $M_values[$month - 1];
            $D = $dat;

            //$day = (5 + ($year % 100) + floor(($year % 100) / 4) + $month + $dat) % 7;
            $day = ($C + $Y + $L + $M + $D) % 7;

            $str .= '<br /><br /> Dates from Item Number:<br />';
            $str .= "Year: $year <br />";
            $str .= "Month: $month <br />";
            $str .= "Date: $dat <br />";

            $res = $this->adminModel->getRoomPrices();
            foreach ($res as $room) {
                # code...
                 $roomType = explode(' ', $room['Type']);
                 if($roomName == $roomType[0]){
                    $roomId = $room['Id'];
                    $prices = explode(';', $room['Prices']);
                    $price = $prices[$day]; 

                    $str .= "<br /><br />From DB: <br />";
                    $str .= "Room Type: ". $room['Type'];
                    $str .= "Prices: ". $room['Prices'];
                    $str .= "Price: ". $price;
                 }
            }

            $str .= "<br /><br />From POST: <br />";
            $str .= "Day: ".$day."<br />";
            $str .= "Price: ".$posts['mc_gross']."<br />Currency: ".$posts['mc_currency'];


            if($price == $posts['mc_gross'] && $posts['mc_currency'] == 'GBP' && $price != 0){
                $str.= "<br /><br /><br />Price: $price <br />Room Type: $roomName <br /> <b>Perfectly Verified!! </b>";
                $verified = true;
            }
            else{
                $str.= "<br /><br /><br /><br /><br /> <b>Perfectly Not Verified!!</b>";
                $verified = false;
            }

            if($verified == true){


                if($this->bookingModel->bookRoom($roomId, $dateExtracted, $roomNumber, $posts['item_name'], $posts['item_number'], $posts['txn_id'], $price)){
                    $str .= "<br /> <br /> <b> Added to database  </b>";


                    $date = explode(' on ',$posts['item_name']);
                    $date = $date[1];

                    //SEND EMAIL
                    // $mailContent = '<table style = "background: #150500; color: #FFF;">
                    //                  <tr><th>The Orange Tree Hotel Booking Confirmation</th></tr>
                    //                  <tr><td>$roomType room booked on $date</td></tr>
                    //                  <tr><td>
                    //                   This email is to confirm that a $roomType room has been booked at The Orange Tree Hotel on  $date. The details of the booking are given below:
                    //                   <br />
                    //                   Room Type: '. $roomName .'<br />
                    //                   Booked for: ' . $date . '<br />
                    //                   Booking price: '. $price . '<br />
                    //                   Booking Number: '. $posts['item_number'] . '<br />
                    //                   Payment Status: Confirmed <br />
                    //                   <br />
                    //                   Please save this email for your records. For support, contact sales@theorangetreehotel.com
                    //                  </td></tr>
                    //                  <tr><td>This email was sent to '. $paypal['business'] .', the email associated with the PayPal account used when booking a room at The Orange Tree Hotel.</td></tr>
                    //                 </table>';

                    $mailContent = '
                                    <table style="background: #150500; color: #FFF !important; padding: 0 30px 50px 30px;" align="center" cellpadding="0">
                                      <style>
                                        body {
                                          background: #150100;
                                          border: solid 2px #777;
                                        }

                                        td, tr, h1, .im, a, a:hover, a:visited, a:active {
                                            color: white;
                                        }
                                      </style>
                                      <tbody>
                                        <tr>
                                          <td style="font-weight: bold; padding: 0; text-align: right;">
                                            <img alt="The Orange Tree Hotel" src="http://www.theorangetreehotel.com/resources/branding/Logo.png" width="417" height="150" style="float: left;">
                                            <h1 style="font-size: 20px; padding: 20px 0 0">Booking Confirmation</h1>
                                            '. ($roomName == 'King' ? 'King Double' : $roomName) .' Room booked for<br />'. $date .'
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="padding: 50px 0">
                                            This email is to confirm that a '. ($roomName == 'King' ? 'King Double' : $roomName) .' Room has been booked at The Orange Tree Hotel for '. $date .'. The details of the booking are given below:
                                            <br /><br /><br /><br />
                                            <table>
                                              <tr><th style="text-align: left;">Room Type: </th><td> '. ($roomName == 'King' ? 'King Double' : $roomName) .' Room </td></tr>
                                              <tr><th style="text-align: left;">Booked for: </th><td> ' . $date . ' </td></tr>
                                              <tr><th style="text-align: left;">Booking price: </th><td> '. $price . ' '. $posts['mc_currency'] .'</td></tr>
                                              <tr><th style="text-align: left;">Booking Number: </th><td> '. $posts['item_number'] . ' </td></tr>
                                              <tr><th style="text-align: left;">Payment Status: </th><td> Confirmed  </td></tr>
                                            </table>
                                            <br /><br /><br />
                                            <B><U>Further Booking Information:</U></B><BR><BR>
                                            <B>Hotel Address:</B>&nbsp; The hotel address is The Orange Tree Hotel, Little Melton Road, Little Melton, NR9 3JL.<BR><BR>
                                            <B>Checking in:</B>&nbsp; You can check in to your room between 14:00PM and 23:00PM, please report to the Hotel Reception and bring this email along with you as proof of booking and pre-payment. You can arrive at the hotel before 14:00PM on the day of your booking and store you baggage
                                             / valuables in our lock-up safe room.<BR><BR>
                                            <B>Room Safe:</B>&nbsp; Each room has a digital safe, the use of this is free of any charges.<BR><BR>
                                            <B>Parking:</B>&nbsp; We have a free car park for guest use only at the rear of the hotel, this car park can be accessed from Little Melton Road.<BR><BR>
                                            <B>Breakfast:</B>&nbsp; Breakfast is available from 8:00AM until 10:30AM; please note this is not included in your room price and the cost of breakfast varies depending on what you order. As a guide the cost for a Full English Breakfast including coffee or tea and fresh fruit juice is �8.50 per person.<BR><BR>
                                            <B>Checking Out:</B>&nbsp; You must check out of your room by 12:00AM to give us enough time to make your room nice and clean for the next guest.<BR><BR>
                                            <B>Cancellation Policy:</B>&nbsp; If for any reason you need to cancel your room please let us know as soon as possible. If you cancel your booking 14 days before your stay you will get a full refund, if you cancel 24 hours before your earliest check in time (14:00PM) you will get a 50% refund,
                                             if you give us less than 24 hours notice you will not be entitled to any refund. To cancel your booking simply send an email to <a href="mailto:sales@theorangetreehotel.com">sales@theorangetreehotel.com</a> - please note: your Booking Number should be in the 
                                             subject line of your email.
                                            <br /><br /><br />
                                            We look forward to welcoming you to The Orange Tree Hotel. Please save this email for your records. For support, contact <a href="mailto:sales@theorangetreehotel.com">sales@theorangetreehotel.com</a><br />
                                          </td>
                                        </tr>
                                        <tr>
                                          <td style="font-size: 10px;" valign="top">
                                            This email was sent to '. $posts['payer_email'] .', the email associated with the PayPal account used when booking a room at The Orange Tree Hotel.
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                    ';

                    $to      = $posts['business'] . ', ' . $posts['payer_email'];
                    $subject = 'The Orange Tree Hotel Booking Confirmation';
                    $headers = 'From: sales@theorangetreehotel.com' . "\r\n" .
                        'Reply-To: sales@theorangetreehotel.com' . "\r\n" .
                        'Content-Type: text/html; charset=ISO-8859-1' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                    mail($to, $subject, $mailContent, $headers);
                    




                }
                else
                    $str .= "<br /> <br /> <b> NOT added to database  </b>";
            }
        }
        $fh = fopen('.'.base_url().'resources/testing/result.html', 'a');
        fwrite($fh, $str);
        fclose($fh);


        

        // echo $result;
        // echo "<pre>";
        
       // print_r($postFields);
                
	}



    //Shows the sucess message(if sucess) AFTER the control returns from notify
    public function success(){

        $posts = $this->input->post();

        $date = $posts['item_number'];
        $nameOfItem = $posts['item_name'];

        $temps = explode(' ', $nameOfItem);
        $roomName = $temps[0]/*.' '.$temps[1]*/;

        $data = explode('/', $date);
        $dateExtracted = $data[0];
        $roomNumber = $data[2];

        $year = ('20'.substr($dateExtracted, 4, 2));
        $month = (substr($dateExtracted, 2, 2));
        $dat = (substr($dateExtracted, 0, 2));

        $M_values = array(0, 3, 3, 6, 1, 4, 6, 2, 5, 0, 3, 5);
        $C = 5;
        $Y = $year % 100;
        $L = floor($Y/4) + ($year % 400 == 0 ? 1 - ($month == 1 || $month == 2 ? 1 : 0) : 0);
        $M = $M_values[$month - 1];
        $D = $dat;

        //$day = (5 + ($year % 100) + floor(($year % 100) / 4) + $month + $dat) % 7;
        $day = ($C + $Y + $L + $M + $D) % 7;

       
        $res = $this->adminModel->getRoomPrices();
        foreach ($res as $room) {
            # code...
            $roomType = explode(' ', $room['Type']);
             if($roomName == $roomType[0]){
                $roomId = $room['Id'];
                $prices = explode(';', $room['Prices']);
                $price = $prices[$day]; 
             }
        }


        if($price == $posts['mc_gross'] && $posts['mc_currency'] == 'GBP' && $price != 0){
            $data['verified'] = true;

            
        }
        else{
            $data['verified'] = false;
        }
        $this->load->view('paypal/success', $data);

        
    }

    public function cancel(){
        echo "Cancelled!!";
    }
}

?>