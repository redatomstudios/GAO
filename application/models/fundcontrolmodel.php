<?php


class FundcontrolModel extends CI_Model{

	public function createFund($data){
		$this->db>insert('fundcontrol', $data);
	}