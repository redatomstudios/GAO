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
		$this->load->model('templatesModel');


		// $data['thisPage'] = 'templates';

		$activeView = '';
		if(!$templateID) {
			$data['templates'] = $this->templatesModel->getTemplates();
			$activeView = 'dashboard/pages/listTemplates';
		} else {
			$activeView = 'dashboard/pages/editTemplate';
			if($templateID == 'new') {
				if(!$post = $this->input->post()){
					$data['pageHeading'] = 'New Template';
					$this->load->view('dashboard/header');
					$this->load->view('dashboard/sidebar', $data);
					$this->load->view($activeView, $data);
					$this->load->view('dashboard/footer');
				}
				else{

					$this->load->library('mylibrary');
					$this->load->model('templatesModel');

					$templateName = preg_replace('/[^a-zA-Z0-9]/', '_', $post['templateName']);
					$d = $this->mylibrary->uploader($templateName, 'publicView');
					$data['userView'] = $d['filename'];
					$d = $this->mylibrary->uploader($templateName, 'cmsView');
					$data['cmsView'] = $d['filename'];
					$data['templateName'] = $templateName;
					$fields = array();
					// print_r($post);
					for($i=0; $i<sizeof($post['fieldName']);$i++){
						$fields[$i] = array(
							'fieldName' => $post['fieldName'][$i],
							'fieldType' => $post['fieldType'][$i],
							'fieldLength' => $post['fieldLength'][$i],
							'fieldDefault' => $post['fieldDefault'][$i]);
					}
					$this->templatesModel->createTemplate($data, $fields);
					// This is new template, don't load anything from DB
				}
			} else {
				// This is an old template that's being edited, load from DB 
			}
		}

		// $this->load->view('dashboard/header');
		// $this->load->view('dashboard/sidebar', $data);
		// $this->load->view($activeView, $data);
		// $this->load->view('dashboard/footer');
	}

	public function pages($pageID = 0) {
		$data['thisPage'] = 'pages';

		$activeView = '';
		if(!$pageID) {
			// No page specified, so list all the current pages
			$activeView = 'dashboard/pages/listPages';
		} else {
			// Since the view for each template is different, set $activeView to the 
			// CMS View corresponding to the template used by the selected page.
			$activeView = 'dashboard/pages/editTemplate'; // <-- I'm just loading this temporarily :o
			if($pageID == 'new') {
				// This is a new page, load the empty CMS view
				$data['pageHeading'] = 'New Page';
			} else {
				// This is a pre-existing page that's being edited, load values from DB 
			}
		}

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view($activeView, $data);
		$this->load->view('dashboard/footer');
	}

}

?>
