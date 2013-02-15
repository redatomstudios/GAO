<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
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
				$thisView = $thisPage['userView'];

				// Step 3 - Get the associated page data from the database
				$pageData = $this->db->get_where($thisTemplate, array('pageName' => $requestPage));
				$data['pageData'] = $pageData->row_array();

				// Step 4 - Load the view, passing the $data variable
				$data['templateName'] = $thisTemplate;
				$this->load->view('templates/' . $thisTemplate . '/' . $thisView, $data);
			} else {
				redirect('');
			}
		} else {
			echo "Server misconfiguration: Invalid index definition";
		}
	}

}

?>
