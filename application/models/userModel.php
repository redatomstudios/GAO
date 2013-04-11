<?php


class UserModel extends CI_Model{
	public function addUser($post){
		# code...
		$this->db->insert('user', $post);
	}


}