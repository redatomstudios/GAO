<?php


class TestModel extends CI_Model{

	public function createUser($data){

		$salt = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 7);
		$pwd = sha1($data['username'] . $salt . $data['passcode']);
		$this->db->insert('usercontrol', array('username' => $data['username'], 'accesscode' => $pwd, 'salt' => $salt));

	}
	public function login($data){
		# code...
		$this->db->select('salt, accesscode');
		$res = $this->db->get_where('usercontrol', array('username' => $data['username']))->row();
		$salt = $res->salt;
		$dbpwd = $res->accesscode;
		$pwd = sha1($data['username'] . $salt . $data['passcode']);
		if($dbpwd == $pwd)
			return true;
		return false;
	}
}