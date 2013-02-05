<?php


class PagesModel extends CI_Model{

	public function getPages($templateTableName){
		$res = $this->db->get($templateTableName);
		if($res->num_rows() > 0)
			return $res->result_array();
		return FALSE;
	}
}