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
}