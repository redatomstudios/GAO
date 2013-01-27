<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct(){
		# code...
		parent::__construct();

		$this->load->model('testModel');
	}

	public function index(){
		# code...
		$this->load->view('test');
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

	public function addTemplate(){
		# code...
		if(!$post = $this->input->post())
			$this->load->view('addTemplate');

		else{
			$this->load->library('mylibrary');
			// echo "<pre>";

			$templateName = preg_replace('/[^a-zA-Z0-9]/', '_', $post['templateName']);
			$d = $this->mylibrary->uploader($templateName, 'templateView');
			// print_r($d);
			$data['userView'] = $d['filename'];
			$d = $this->mylibrary->uploader($templateName, 'cmsView');
			$data['cmsView'] = $d['filename'];
			$data['templateName'] = $templateName;
			$fields = array();
			// print_r($post);
			for($i=1; $i<=sizeof($post['fieldName']);$i++){
				$fields[$i] = array(
					'fieldName' => $post['fieldName'][$i],
					'fieldType' => $post['fieldType'][$i]);
			}
			$this->testModel->createTemplate($data, $fields);
			// print_r($post);
		}

	}

	public function addView(){
		/*
		* 1. Select a template
		* 2. Get view fields from the table name
		* 3. Show views as checkboxes
		* 
		*/
	}

}