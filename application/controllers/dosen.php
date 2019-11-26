<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function dashboard()
	{
		if($this->session->userdata('role_id')==1){
			$this->load->view('header');
			$this->load->view('dosen/dashboard_dosen');
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
		
	}

	public function add()
	{
		if($this->session->userdata('role_id')==1){
			$this->load->view('header');
			$this->load->view('dosen/tambah_project');
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
		
	}
}