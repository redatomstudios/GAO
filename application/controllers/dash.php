<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dash extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');

		$accessPath = $this->router->fetch_method();
		if( !($accessPath == 'login' || $accessPath == 'logout') ) {
			if(!$this->session->userdata('sessionID')) redirect('dash/logout');
		}
	}

	public function index() {

		$data['thisPage'] = 'dashboard';

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view('dashboard/home', $data);
		$this->load->view('dashboard/footer');
	}

	public function login() {
		$post = $this->input->post();
		if(!$post) {
			$this->load->view('auth');
		} else {
			$uname = $post['uName'];
			$pword = $post['pWord'];
			$authStatus = false;

			$this->load->database();
			$dbData = $this->db->get_where('usercontrol', array('username' => $uname));
			$dbData = $dbData->row_array();

			$salt = $dbData['salt'];
			$accesscode = sha1($uname . $salt . $pword);

			if($dbData['accesscode'] == $accesscode) {
				$authStatus = true;
			}

			if($authStatus) {
				$this->session->set_userdata(array(
					'sessionID' => random_string('alnum', 16),
					'username' => $uname
				));

				redirect('dash');
			} else {
				redirect('dash/login');
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('dash/login');
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

					$post['templateName'] = strtolower($post['templateName']);
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

			} elseif ($templateID == 'delete') {
				$view = 0;
				//echo "<pre>";
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

	public function pages($pageName = 0) {
		$this->load->model('templatesModel');
		$this->load->model('pagesModel');

		$post = $this->input->post();
		$data['thisPage'] = 'pages';

		$activeView = '';
		if(!$pageName) {
			// No page specified, so list all the current pages
			$activeView = 'dashboard/pages/listPages';

			// Check if any deletions need to be processed before loading the pages list
			if($post && isset($post['deletePages']) && sizeof($post['pageDeletions'])) {
				// delete pages with ids found in $post['pageDeletions']
			}

			$templates = $this->templatesModel->getTemplates();
			// echo "<pre>";
			// print_r($templates);
			$pages = array();
			foreach ($templates as $template) {
				# code...
				$data['templates'][$template['id']] = $template['templateName'];
				if($ps = $this->pagesModel->getPages($template['tableName'], $template['tableName'])){
					// $ps['template'] = $template['templateName'];
					$pages = array_merge($pages, $ps);
				}
			}
			// echo "<pre>";
			// print_r($pages);
			$data['pages'] = $pages;

		} else if(isset($post['newPage'])) {
				// They're trying to create a new page
				
				$template = $this->templatesModel->getTemplate($templateId);
				$templateFolder = $template['tableName'];
				$activeView = "templates/$templateFolder/" . $template['cmsView'];

				$data['pageHeading'] = 'New Page';
				$currentTemplate = $post['pageTemplate'];
		} else {
				// They're editing a pre-existing page

				$data['pageHeading'] = 'Edit Page';
				$res = $this->pagesModel->getPage($pageName);
				// echo "<pre>";
				// print_r($res);
				$activeView = "templates/" . $res['templateName'] . "/" . $res['cmsView'];
				$data['templateId'] = $res['templateId'];
				$data['pageName'] = $res['pageName'];
				$data['pageHeading'] = $res['pageHeading'];
				$data['pageTitle'] = $res['pageTitle'];
				$data['pageGroup'] = $res['pageGroup'];
				$data['navOrder'] = $res['navOrder'];
				$data['pageContent'] = $res['pageContent'];
				//$pageName
		}
			/*
			 * This means a new page is being created, or a page is being edited
			 * Since the view for each template is different, set $activeView to the 
			 * CMS View corresponding to the template used by the selected page.
			 */
			
			

			
		

		$this->load->view('dashboard/header');
		$this->load->view('dashboard/sidebar', $data);
		$this->load->view($activeView, $data);
		$this->load->view('dashboard/footer');
	}

	public function newPageCMS(){
		# code...

		$this->load->model('templatesModel');
		$this->load->model('pagesModel');
		//Make sure there is no input with name 'pageTemplate' in the cms view
		if($templateId = $this->input->post('pageTemplate')) {
			$data['thisPage'] = 'pages';
			$template = $this->templatesModel->getTemplate($templateId);
			$templateFolder = $template['tableName'];
			$data['templateId'] = $templateId;
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

			$this->load->view('dashboard/header');
			$this->load->view('dashboard/sidebar', $data);
			$this->load->view("templates/$templateFolder/" . $template['cmsView'], $data);
			$this->load->view('dashboard/footer');
		} else {
			if($post = $this->input->post()) {
				$templateId = $post['templateId'];
				unset($post['templateId']);

				$this->pagesModel->createPage($post, $templateId);
				redirect('dash/pages?n=' . 'Page created successfully.');
			} else {
				redirect('dash/pages?n=' . 'Please select a template.');
			}
		}
	}

	public function editPage($pageName){
		# code...
	}

	
}

?>
