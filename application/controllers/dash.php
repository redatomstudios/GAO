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

	public function templates($templateID = 0, $tId = 0) {
		$this->load->model('templatesModel');

		$view = 1;
		$data = array();
		$data1['thisPage'] = 'templates';

		$activeView = '';
		if(!$templateID) {
			$templates = $this->templatesModel->getTemplates();
			$data['templates'] = $templates;
			// echo "<pre>";
			// print_r($data['templates']);
			$activeView = 'dashboard/pages/listTemplates';
		} else {


			$activeView = 'dashboard/pages/editTemplate';
			if($templateID == 'new') {

				if(!$post = $this->input->post()){
					$data1['pageHeading'] = 'New Template';
				}
				else{
					$view = 0;
					$this->load->library('mylibrary');
					$this->load->model('templatesModel');

					$templateName = preg_replace('/[^a-zA-Z0-9]/', '_', $post['templateName']);


					$d = $this->mylibrary->uploader($templateName, 'publicView');
					$data['userView'] = $d['filename'];
					$d = $this->mylibrary->uploader($templateName, 'cmsView');
					$data['cmsView'] = $d['filename'];


					$data['templateName'] = $post['templateName'];
					$data['tableName'] = $templateName;
					$fields = array();
					for($i=0; $i<sizeof($post['fieldName']);$i++){
						if($post['fieldName'][$i] != '')
							$fields[] = array(
								'fieldName' => $post['fieldName'][$i],
								'fieldType' => $post['fieldType'][$i],
								'fieldLength' => $post['fieldLength'][$i],
								'fieldDefault' => $post['fieldDefault'][$i]);
						else
							continue;
					}

					$this->templatesModel->createTemplate($data, $fields);

					// Moving the files from uploader folder
					$identifier = $post['identifier'];
					$idDir = $_SERVER['DOCUMENT_ROOT'] . base_url(). 'uploader/server/php/files/' . $identifier;
					if($handle = opendir($idDir)){

						$dir = $_SERVER['DOCUMENT_ROOT'] . base_url(). 'Resources/';
						if(!is_dir($dir . 'js/' . $templateName))
                   			mkdir($dir . 'js/' . $templateName);
                   		if(!is_dir($dir . 'css/' . $templateName))
                   			mkdir($dir . 'css/' . $templateName);
                   		if(!is_dir($dir . 'images/' . $templateName))
                   			mkdir($dir . 'images/' . $templateName);


						while (false !== ($entry = readdir($handle))) {
					        if ($entry != "." && $entry != ".." && (sizeof($file = explode('.', $entry)) > 1)) {
					        	$ext = $file[sizeof($file)-1];
					        	// echo "</br> $entry";
					            if($ext == 'css' || ($ext == 'php' && $file[0] == 'styles')){
					            	//move entry to css folder
					            	copy("$idDir/$entry", "$dir/css/$templateName/$entry");
					            }
					            elseif ($ext == 'js' || $ext == 'php') {
					            	//move entry to js folder
					            	copy("$idDir/$entry", "$dir/js/$templateName/$entry");
					            }
					            else{
					            	//move entry to images folder
					            	copy("$idDir/$entry", "$dir/images/$templateName/$entry");
					            }
					        }
					    }
					}

					$this->mylibrary->deleteDirectory($idDir);
					redirect('/dash/templates');
				}

			}elseif($templateID == 'delete'){
				$view = 0;
				echo "<pre>";
				$this->load->library('mylibrary');
				if($post = $this->input->post()){
					// print_r($post['templateDeletions']);
					$templates = $post['templateDeletions'];
				}else{
					$templates = array($tId);
				}
				foreach ($templates as $templateId) {
					# code...
					$t = $this->templatesModel->getTemplate($templateId);
					$templateIds[] = $t['id'];
					$templateTables[] = $t['tableName'];
					$this->templatesModel->deleteTemplate($t['id'], $t['tableName']);


					if(is_dir($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/css/" . $t['tableName']))
						$this->mylibrary->deleteDirectory($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/css/" . $t['tableName']);
					if(is_dir($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/js/" . $t['tableName']))
						$this->mylibrary->deleteDirectory($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/js/" . $t['tableName']);
					if(is_dir($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/images/" . $t['tableName']))
						$this->mylibrary->deleteDirectory($_SERVER['DOCUMENT_ROOT'] . base_url() . "Resources/images/" . $t['tableName']);


					$this->mylibrary->deleteDirectory($_SERVER['DOCUMENT_ROOT'] . base_url(). 'application/views/templates/' . $t['tableName']);

				}
				
				redirect('/dash/templates');

			} else {
				// This is an old template that's being edited, load from DB 
				if(!$post = $this->input->post()){
					$data = $this->templatesModel->getTemplate($templateID);
				}
				// echo "<pre>";
				// print_r($data);
			}
		}
		if($view){
			$this->load->view('dashboard/header');
			$this->load->view('dashboard/sidebar', $data1);
			$this->load->view($activeView, $data);
			$this->load->view('dashboard/footer');
		}
	}

	public function pages($pageID = 0) {
		$this->load->model('templatesModel');
		$this->load->model('pagesModel');

		$data['thisPage'] = 'pages';

		$activeView = '';
		if(!$pageID) {
			// No page specified, so list all the current pages
			$activeView = 'dashboard/pages/listPages';

			$templates = $this->templatesModel->getTemplates();
			// echo "<pre>";
			// print_r($templates);
			$pages = array();
			foreach ($templates as $template) {
				# code...
				$data1['templates'][$template['id']] = $template['templateName'];
				if($ps = $this->pagesModel->getPages($template['tableName'])){
					$ps['template'] = $template['templateName'];
					$pages = array_merge($pages, $ps);
				}
			}
			$data1['pages'] = $pages;



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
		$this->load->view($activeView, $data1);
		$this->load->view('dashboard/footer');
	}

	public function newPage(){
		# code...

		$this->load->model('templatesModel');


		$templateId = $this->input->post('pageTemplate');
		$template = $this->templatesModel->getTemplate($templateId);
		$templateFolder = $template['tableName'];

		$data['css'] = '';
		$idDir = $_SERVER['DOCUMENT_ROOT'] . base_url(). 'Resources';
		if($handle = opendir("$idDir/css/$templateFolder")){
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					// echo "</br>$entry";
					$data['css'] .= '<link href="/GAO/resources/css/' . "$templateFolder/$entry" . '" rel="stylesheet">';
				}
			}
		}
		// echo "</br>";
		$data['js'] = '';
		if($handle = opendir("$idDir/js/$templateFolder")){
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					// echo "</br>$entry";
					$data['js'] .= '<script src="/GAO/resources/js/' . "$templateFolder/$entry" . '"></script>';
				}
			}
		}

		$this->load->view("templates/$templateFolder/" . $template['cmsView'], $data);
	}

	public function temp() {
		$data['pageHeading'] = 'New Page';
		$data['thisPage'] = 'pages';
				
		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view('view_cms');
		$this->load->view('dashboard/footer');
	}

}

?>
