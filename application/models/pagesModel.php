<?php


class PagesModel extends CI_Model{

	public function getPages($templateTableName, $templateName){
		$res = $this->db->get($templateTableName);
		if($res->num_rows() > 0){
			$pages = $res->result_array();
			$temp = array();
			foreach ($pages as $page) {
				# code.	..
				$page['templateName'] = $templateName;
				$temp[] = $page;
			}
			return $temp;
		}
		return FALSE;
	}

	public function createPage($post, $templateId){
		# code...
		$res = $this->db->get_where('templates', array('id' => $templateId));
		$template = $res->row_array();
		// print_r($template);
		$table = $template['tableName'];
		$templateName = $template['templateName'];

		foreach($post as $i => $field) {
			$post[$i] = htmlentities($post[$i]);
		}

		$page['pageName '] = $post['pageName'];
		$page['pageTitle'] = $post['pageTitle'];
		$page['pageGroup'] = $post['pageGroup'];
		$page['templateName'] = $templateName;
		$page['navOrder'] = $post['navOrder'];

		unset($post['pageGroup']);
		unset($post['navOrder']);
		$this->db->insert('pages', $page);
		$this->db->insert($table, $post);
	}

	public function getPage($pageName){
		# code...
		$res = $this->db->get_where('pages', array('pageName' => $pageName));
		if($res->num_rows > 0){
			$res = $res->row_array();
			$pageGroup = $res['pageGroup'];
			$navOrder = $res['navOrder'];
			$templateName = $res['templateName'];
			$this->db->select('id, tableName, cmsView');
			$res = $this->db->get_where('templates', array('templateName' => $templateName));
			if($res->num_rows() >0){
				$res = $res->row_array();
				$cms = $res['cmsView'];
				$templateId = $res['id'];
				$table = $res['tableName'];
				$res = $this->db->get_where($table, array('pageName' => $pageName));
				if($res->num_rows() > 0){
					$res = $res->row_array();
					$res['templateName'] = $templateName;
					$res['cmsView'] = $cms;
					$res['templateId'] = $templateId;
					$res['pageGroup'] = $pageGroup;
					$res['navOrder'] = $navOrder;
					
					return $res;
				}
			}
		}
		return FALSE;
	}

	public function editPage($post){
		# code...
		foreach($post as $i => $field) {
			$post[$i] = htmlentities($post[$i]);
		}
		
		$pageName = $post['pageName'];
		$page['pageTitle'] = $post['pageTitle'];
		$page['pageGroup'] = $post['pageGroup'];
		$page['navOrder'] = $post['navOrder'];

		$templateId = $post['templateId'];
		$template['pageTitle'] = $post['pageTitle'];
		$template['pageHeading'] = $post['pageHeading'];
		$template['pageContent'] = $post['pageContent'];

		$this->db->where('pageName', $pageName);
		$this->db->update('pages', $page);

		$this->db->select('tableName');
		$res = $this->db->get_where('templates', array('id'=>$templateId))->row_array();
		$table = $res['tableName'];

		$this->db->where('pageName', $pageName);
		$this->db->update($table, $template);
	}

	public function insertCaptcha($par){
		# code...
		$data = array(
		    'captcha_time'	=> $par['time'],
		    'ip_address'	=> $par['ip'],
		    'word'	 => $par['word']
		    );

		$query = $this->db->insert_string('captcha', $data);
		return $this->db->query($query);
	}

	public function deleteCaptchas(){
		# code...
		// First, delete old captchas
		$expiration = time()-7200; // Two hour limit
		return $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	
	}

	public function checkCaptcha($word, $ip){
		# code...
		$expiration = time()-7200;
		$this->db->select('count(*) as count');
		$query = $this->db->get_where('captcha', array('word' => $word, 'ip_address' => $ip, 'captcha_time >' => $expiration));
		$row = $query->row();

		if ($row->count == 0)
			return FALSE;
		return TRUE;
	}
}