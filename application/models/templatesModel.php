<?php


class TemplatesModel extends CI_Model{

	public function getTemplates(){
		# code...
		$res = $this->db->get('templates');
		if($res->num_rows() > 0){
			return $res->result_array();
		}
		return FALSE;
	}

	public function createTemplate($data, $fields){
		# code...
		if($this->db->insert('templates', $data)){

			$query = 'CREATE TABLE '. $data['templateName'] . '( id int(11) primary key, ';
			foreach ($fields as $field) {
				$query .= $field['fieldName'] . ' ' . $field['fieldType'] ;
				$query .= ($field['fieldLength']!=''?'('.$field['fieldLength'].'), ':'');
				if($field['fieldDefault']!=''){
					$query = substr($query, 0, strlen($query)-2);
					$query .= ' default \'' . $field['fieldDefault'].'\', ';
				}
			}
			echo $query;
			$query = substr($query, 0, strlen($query)-2);

			$query .= ')';
			echo "</br>".$query;
		}

		// $this->db->query($query);
	}

}