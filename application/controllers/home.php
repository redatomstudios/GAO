<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function index() {
		$this->load->view("public/header");
		$this->load->view("public/sidebar");
		$this->load->view("public/home");
		$this->load->view("public/footer");
	}

}

?>
