<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function list()
	{
		if($this->session->userdata('role_id')==2){
			$data['project'] = $this->model_project->view_data()->result();

			$pendaftar = $this->model_pendaftar->view_myproject()->result();
			$data['pendaftar'] = array();
			foreach ($pendaftar as $pdr) :
				array_push($data['pendaftar'],$pdr->id_project);
			endforeach;

			$this->load->view('header');
			$this->load->view('mahasiswa/project_list', $data);
			$this->load->view('footer');
		}else {
			redirect('auth/login');
		}
		
	}
	public function dashboard(){
		$data['pendaftar'] = $this->model_pendaftar->view_myproject()->result();
		if($this->session->userdata('role_id')==2){
			$this->load->view('header');
			$this->load->view('mahasiswa/dashboard_mahasiswa', $data);
			$this->load->view('footer');
		}else {
			redirect('auth/login');
		}
	}
	public function daftar($id){
		$data = array(
			'id_pendaftar'	=>	$this->session->userdata('user_id') ,
			'id_project'	=>	$id ,
			'status_pendaftar'	=> "Menunggu Konfirmasi",
		);
		$this->model_pendaftar->input_pendaftar($data, 'tb_pendaftar');
		redirect('mahasiswa/list');
	}

	public function test(){
		$data['pendaftar'] = $this->model_pendaftar->view_myproject()->result();
		$data2['pendaftar'] = $this->model_pendaftar->pendaftar_project("14")->result();
		$data3['pendaftar'] = $this->model_pendaftar->view_pendaftar("1");
		$this->load->view('test', $data3);

	}
	
}
