<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('model');
    }
	
	public function index(){
		$data = array('judul' => "Login Sistem",
	);
		$this->load->view('login', $data);
	}


	public function cek()
	{
		$user 	= $this->input->post('username');
		$pass 	= $this->input->post('password');
		$where 	= array(
			'username' => $user,
			'pwd' => $pass, ); 
		$cek = $this->model->cek_login($user,$pass);
		//	$cek2 = $this->m_login->aksi_login2($user,$pass);
		if($cek)
			{
			$data_session = array(
				'username' 	=> $user,
				'pwd'		=> $pass,
				'status' 	=> "admin",
				'siapa' 	=> $cek['nama_A']);
			$this->session->set_userdata($data_session);
				redirect('master-data');
			}
		else
			{
			echo "<script> alert('gagal login silahkan cek username dan password');history.go(-1);</script>";
			}
		}

	function logout(){

		$this->session->sess_destroy();
		redirect('user');
	}

}
