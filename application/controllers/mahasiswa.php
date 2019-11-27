<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function list()
	{
		if($this->session->userdata('role_id')==2){
			$data['project'] = $this->model_project->view_data()->result();
			$this->load->view('header');
			$this->load->view('mahasiswa/project_list', $data);
			$this->load->view('footer');
		}else {
			redirect('auth/login');
		}
		
	}
	public function dashboard(){
		if($this->session->userdata('role_id')==2){
			$this->load->view('header');
			$this->load->view('mahasiswa/dashboard_mahasiswa');
			$this->load->view('footer');
		}else {
			redirect('auth/login');
		}
	}
	
}
