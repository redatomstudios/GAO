<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		# code...
		parent::__construct();

		$this->load->model('testModel');
	}

	public function index(){
		# code...
		
	}

	public function createUser(){
	# code...
		//Load View
		$data['username'] = 'admin';
		$data['passcode'] = 'passcode';

		$this->testModel->createUser($data);
	}


	public function login(){
		# code...
		$data['username'] = 'admin';
		$data['passcode'] = 'passcode';
		if($this->testModel->login($data))
			echo "Login Success";
		else
			echo "Failed";
	}

}