<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model extends CI_Model {
	/*Cek Login*/
	function cek_login($user,$pass){
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		$data = $this->db->get('user');
		return $data->result_array();
	}

	function get_all_jalan(){
		$data = $this->db->get('jalan');
		return $data;
	}
	function get_all_tps(){
		$data = $this->db->get('tps');
		return $data;	
	}
	function get_all_supir(){
		$data = $this->db->get('supir');
		return $data;
	}
	function get_all_angkutan(){
		$query = $this->db->get('angkutan');
		return $query;

	}

	function getAll($table){
		return $this->db->get($table);
	}

}

