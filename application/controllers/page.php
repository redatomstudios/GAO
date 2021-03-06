<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('mylibrary');
	}

	public function index($requestPage = '') {
		/*
		 * This will load the page which has the name 'index'
		 * The 'index' page is the only page with a required name
		 * and it serves as the entry point into the website
		 * If a $requestPage is specified, then it loads that page
		 * instead.
		 */
		$basePath = '';
		$root = $this->db->get_where('pages', array('pageName' => 'index'));
		$root = $root->row_array();

	/*
	 * Here we get the index and check to see if it exists.
	 * The index is required, so don't proceed without it.
	 */
		if($root) {

	/*
	 * If no page was specified, we load the index by default.
	 */
			if(!$requestPage) $requestPage = 'index';
	/*
	 * Loading a page consists of the following steps:
	 *   - Get the template used by the page
	 *   - load the associated filenames from the template table
	 *   - load the data from the database and store into the $data variable
	 *     with the same name as each database field name
	 *   - Load view, passing the $data variable
	 */
			// Step 1 - Get the template used by the page
			$thisPage = $this->db->get_where('pages', array('pageName' => $requestPage));
			$thisPage = $thisPage->row_array();

			// Check to see if anything was returned, and if so continue
			if(sizeof($thisPage)) {
				$thisTemplate = $thisPage['templateName'];

				// Step 2 - Now lets get the template view filename from the templates table
				$thisPage = $this->db->get_where('templates', array('templateName' => $thisTemplate));
				$thisPage = $thisPage->row_array();
				$thisView = ($this->isLoggedIn($requestPage)?$thisPage['cmsView']:$thisPage['userView']);
				// $thisView = $thisPage['userView'];

				// Step 3 - Get the associated page data from the database
				$pageData = $this->db->get_where($thisTemplate, array('pageName' => $requestPage));
				$data['pageData'] = $pageData->row_array();

				// Step 3.1 - use html_entity_decode to return to proper display formatting
				// $data['pageData'][$i] = html_entity_decode($data['pageData'][$i]);
				function replace($matches) {
					foreach ($matches as $match) {
						$str = substr($match,3,strlen($match)-6);
						$ret = include "./plugins/".$str.'.php';
						// echo base_url("plugins/".$str.'.php');

					}
					return $ret;
				}

				foreach($data['pageData'] as $i => $field) {
					$decodedHtml = html_entity_decode($data['pageData'][$i]);
					$data['pageData'][$i] = preg_replace_callback('/\{\{\{[a-zA-Z 0-9_]*\}\}\}/', 'replace', $decodedHtml);
				}

				// Step 3.2 - Get the navigation items
				$data['navItems'] = $this->createNav();

				// Step 4 - Load the view, passing the $data variable
				$data['templateName'] = $thisTemplate;

				// Prints out all countries, we need to use this to create the countries dropdown...
				//print_r($this->mylibrary->getCountries());
				$this->load->view('templates/' . $thisTemplate . '/' . $thisView, $data);
			} else {
				// redirect('');
			}
		} else {
			echo "CMS misconfiguration: Invalid index definition";
		}
	}

	public function contactus(){
	/*
	* Process the contact us page and send the Email to the client
	*/
		# code...

		$this->load->model('pagesModel');
		$this->load->model('captchaModel');

		if($get = $this->input->get()){
			$word = $get['captcha'];
			$ip = $this->input->ip_address();
			$this->captchaModel->deleteCaptchas();
			if($this->captchaModel->checkCaptcha($word, $ip)) {
				echo "Corrent Captcha";
			} else {
				echo "Incorrect Captcha";
			}
		}
		else{
			$this->load->helper('captcha');
			$this->load->helper('string');


			$vals = array(
				'word'		 => random_string('alpha', 6),
        'img_path'	 => './captcha/',
        'img_url'	 => base_url().'captcha/',
        'font_path'  => './system/fonts/arial.ttf',
        'size'  => '20',
        'img_width'	 => '270',
        'img_height' => '50',
        'border' => 1,
        'expiration' => 7200
      );

			$cap = create_captcha($vals);
			$cap['ip'] = $this->input->ip_address(); print_r($cap);
			$this->captchaModel->insertCaptcha($cap);

			$data['cap'] = $cap['image'];
			$this->load->view('templates\SkyBlue\contactus',$data); //Make this dynamic
		}
	}

	private function validateRegistration(){
		$this->load->model('captchaModel');
		$this->load->model('fundusercontrolModel');

		$get = $this->input->get();

		$errors = array();

		if($this->fundusercontrolModel->getUser($get['username'])){
			 $errors['username'] = 'Username already exists';
		}

		$word = $get['captcha'];
		$ip = $this->input->ip_address();
		$this->captchaModel->deleteCaptchas();
		if(!$this->captchaModel->checkCaptcha($word, $ip)) {
			 $errors['captcha'] = 'Wrong Captcha';
		}

		if(!strlen($get['charityName'])) {
		    $errors['charityName'] = 'No Charity Name Given';
		}

		if(!strlen($get['fundraiserName'])) {
		    $errors['fundraiserName'] = 'No Fundraiser Name Given';
		}

		if(!preg_match('/^[\w][\W|\w]{5,}$/', $get['password'])) {
		    $errors['password'] = "Password should be at least 6 characters and should start with a character, digit or _";
		}

		foreach ($get as $key => $value) {
			$get[$key] = trim($value);
		}

		if(empty($get['firstName']) && !preg_match('#^[A-Z \'.-]{2,50}$#i', $get['firstName'])) {
		    $errors['firstName'] = "First Name must be at least 2 characters (A-Z \' . -).";
		}

		if(empty($get['lastName']) && !preg_match('#^[A-Z \'.-]{2,50}$#i', $get['lastName'])) {
		    $errors['lastName'] = "Last Name must at least 2 characters (A-Z \' . -).";
		}

		if(!preg_match('/^[a-zA-Z]\w{5,}$/', $get['username'])){
			$errors['username'] = "Username should start with a character and should contain only characters, digits or _";
		}

		if(!(filter_var($get['email'], FILTER_VALIDATE_EMAIL))) {
		    $errors['email'] = "Invalid email address.";
		}

		if($get['email'] != $get['confirmEmail']){
			$errors['confirmEmail'] = "Email must match with confirmed email.";
		}

		if($get['password'] != $get['confirmPassword']){
			$errors['confirmPassword'] = "Password must match with confirmed password.";
		}



		$returnString = '{"errorMessages": [';

    foreach ($errors as $key => $value) {
    		$returnString .= '{"fieldName": "' . $key . '","errorMessage": "' . $value . '"},';
    }

    $returnString = rtrim($returnString, ",");

    $returnString .= '],"response": "' . (sizeof($errors) > 0 ? 'failure' : 'success') . '"}';

		// echo $returnString;
		return array(
			"status" 			=> (sizeof($errors) > 0 ? false : true),
			"statusString" 	=> $returnString
		);
	}

	public function register(){

		$validation = $this->validateRegistration();

		if(!$validation["status"]) {
			echo json_encode($validation);
			return false;
		}

		$this->load->model('templatesmodel');
		$this->load->model('fundusercontrolmodel');
	 	$this->load->model('funduserdetailsmodel');
	 	$this->load->model('pagesmodel');

		$get = $this->input->get();

		$page['pageName'] = $get['username'];
		$page['pageTitle'] = $get['fundraiserName'] . ', fundraising for ' . $get['charityName'];
		$page['templateName'] = 'straightedge';

		$this->pagesmodel->createFundPage($page);

		$userdetailData['title'] = $get['title'];
		$userdetailData['firstName'] = $get['firstName'];
		$userdetailData['lastName'] = $get['lastName'];
		$userdetailData['username'] = $get['username'];
		$userdetailData['email'] = $get['email'];
		$userdetailData['country'] = $get['country'];
		$userdetailData['houseNumber'] = $get['houseNumber'];
		$userdetailData['postalCode'] = $get['postalCode'];

		$this->funduserdetailsmodel->createUser($userdetailData);


		$usercontrolData['username'] = $get['username'];
		$usercontrolData['passcode'] = $get['password'];

		$this->fundusercontrolmodel->createUser($usercontrolData);

		$templates = $this->templatesmodel->getFundraiserTemplates();

		$templateData['fundraiserName'] = $get['fundraiserName'];
		$templateData['charityName'] = $get['charityName'];
		$templateData['description'] = $get['eventDescription'];
		$templateData['pageName'] = $get['username'];

		foreach ($templates as $template) {
			$this->templatesmodel->insertTemplate($template['tableName'], $templateData);
		}

		$this->login($get['username']);
		echo '{"status": "success", "redirectUrl": "/' . $templateData['pageName'] . '"}';
	}

	public function login($username)	{
		$this->session->set_userdata(array(
			'sessionID' => random_string('alnum', 16),
			'username'=>$username,
			'usertype' => 'user'));
	}

	public function isLoggedIn($username){
		# code...
		if($this->session->userdata('username') == $username)
			return true;
		return false;
	}

	private function createNav() {
		/*
		 * This function pulls data from the pages table
		 * and keeps the pages with a navOrder > 0.
		 * Then it returns an array such that [[pageName, pagePath]]
		 */
								$this->db->order_by('navOrder', 'asc');
		$allPages = $this->db->get('pages');
		$navPages = array();
		foreach($allPages->result_array() as $thisPage) {
			if($thisPage['navOrder']) {
				$navPages[] = $thisPage;
			}
		}

		return $navPages;
	}
}


//This is for testing git-ftp
?>


