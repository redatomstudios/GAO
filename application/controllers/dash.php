<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dash extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view("dashboard/header");
		$this->load->view("dashboard/sidebar");
		$this->load->view("dashboard/home");
		$this->load->view("dashboard/footer");
	}

}

?>
