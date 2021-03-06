<?php


class TemplatesModel extends CI_Model{

	public function getTemplates(){
		# code...
		$res = $this->db->get('templates');
		if($res->num_rows() > 0){
			$templates = $res->result_array();
			foreach ($templates as $template) {
				# code...
				$details = $this->db->get($template['tableName']);
				$template['pageDetails'] = (($details->num_rows() > 0) ? $details->result_array() : array());
				$t[] = $template;
			}
			return $t;
		}
		return array();
	}

	public function getFundraiserTemplates(){
		$res = $this->db->get_where('templates', array('fundraiserTemplate' => 1));
		return ($res->num_rows() > 0) ? $res->result_array() : array();
	}


	public function getTemplate($id){
		# code...
		$res = $this->db->get_where('templates', array('id' => $id));
		$template = $res->row_array();
		$res = $this->db->query('SHOW COLUMNS FROM ' . $template['tableName']);
		$template['fields'] = $res->result_array();
		return $template;
	}

	public function createTemplate($data, $fields){
		# code...
		if($this->db->insert('templates', $data)){

			$query = 'CREATE TABLE '. $data['tableName'] . '( id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
				pageTitle varchar(50),
				pageName varchar(50) NOT NULL UNIQUE KEY,
				pageHeading varchar(50),
				`timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, ';
			foreach ($fields as $field) {
				$query .= $field['fieldName'] . ' ' . $field['fieldType'] ;
				$query .= ( $field['fieldLength'] != '' ? '('.$field['fieldLength'].'), ' : ( $field['fieldType'] == 'TEXT' ? '(1000), ' : '(10), ' ) );
				if($field['fieldDefault']!=''){
					$query = substr($query, 0, strlen($query)-2);
					$query .= ' default \'' . $field['fieldDefault'].'\', ';
				}
			}
			// echo $query;
			$query = substr($query, 0, strlen($query)-2);

			$query .= ')';
			// echo "</br>".$query;
		}

		$this->db->query($query);
	}

	public function deleteTemplate($templateId, $templateTableName){
		# code...
		//echo "</br>" . $templateId . "   " . $templateTableName . "Removing" ;
		$this->db->where('id', $templateId);
		$this->db->delete('templates');

		// Remove pages associated with this template from the PAGES table
		$this->db->where('templateName', $templateTableName);
		$this->db->delete('pages');

		$this->db->query("drop table $templateTableName");
	}

	public function insertTemplate($templateTableName, $data){

		$this->db->insert($templateTableName, $data);
	}

}