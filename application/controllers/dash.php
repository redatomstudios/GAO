<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dash extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$data['thisPage'] = 'dashboard';

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view('dashboard/home', $data);
		$this->load->view('dashboard/footer');
	}

	public function templates($templateID = 0) {
		$data['thisPage'] = 'templates';

		$activeView = '';
		if(!$templateID) {
			$activeView = 'dashboard/pages/listTemplates';
		} else {
			$activeView = 'dashboard/pages/editTemplate';
			if($templateID == 'new') {
				// This is new template, don't load anything from DB
				$data['pageHeading'] = 'New Template';
			} else {
				// This is an old template that's being edited, load from DB 
			}
		}

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view($activeView, $data);
		$this->load->view('dashboard/footer');
	}


}

?>
