<?php
$obj = new Page();

$obj->load->helper('captcha');
$obj->load->helper('string');

$obj->load->model('captchaModel');

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
$cap['ip'] = $obj->input->ip_address();
$obj->captchaModel->insertCaptcha($cap);

return $cap['image'];



?>