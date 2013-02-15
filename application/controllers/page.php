<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function index($requestPage = '') {
		// This will load the page which has the name 'index'
		// The 'index' page is the only page with a required name
		// and it serves as the entry point into the website

		$basePath = '';
		$root = $this->db->get_where('pages', array('pageName' => 'index'));
		$root = $root->row_array();
		if($root) {
			if($requestPage) {
				// We're loading a subpage, so we need to pull some extra data from the database
				echo 'Loading subpage: ' . $requestPage;

				// Get the template used by the page
				$thisPage = $this->db->get_where('pages', array('pageName' => $requestPage));
				$thisPage = $thisPage->row_array();
				if(sizeof($thisPage)) {
					$thisTemplate = $thisPage['templateName'];

					echo '<br />Page is using template: ' . $thisTemplate;

					// Now lets get the template view filename from the templates table
					$thisPage = $this->db->get_where('templates', array('templateName' => $thisTemplate));
					$thisPage = $thisPage->row_array();

					$thisView = $thisPage['userView'];

					$this->load->view($thisTemplate . '/' . $userView);
				} else {
					redirect('');
				}
			} else {
				// No page provided, so we just load the index page
				echo 'Loading index';
			}
		} else {
			echo "Server misconfiguration: Invalid index definition";
		}
	}

}

?>
