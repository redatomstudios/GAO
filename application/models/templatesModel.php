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

	public function getTemplate($id){
		# code...
		$res = $this->db->get_where('templates', array('id' => $id));
		return $res->row_array();
	}

	public function createTemplate($data, $fields){
		# code...
		if($this->db->insert('templates', $data)){

			$query = 'CREATE TABLE '. $data['tableName'] . '( id int(11) primary key, ';
			foreach ($fields as $field) {
				$query .= $field['fieldName'] . ' ' . $field['fieldType'] ;
				$query .= ($field['fieldLength']!=''?'('.$field['fieldLength'].'), ':'(10), ');
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
		echo "</br>" . $templateId . "   " . $templateTableName . "Removing" ;
		$this->db->where('id', $templateId);
		$this->db->delete('templates'); 

		$this->db->query("drop table $templateTableName");

		
		
	}

}