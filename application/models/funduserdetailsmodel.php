<?php

class FunduserdetailsModel extends CI_Model{

	public function createUser($data){
		$this->db->insert('funduserdetails', $data);
	}
}