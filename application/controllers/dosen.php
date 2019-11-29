<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function dashboard()
	{
		if($this->session->userdata('role_id')==1){
			$data['project'] = $this->model_project->view_mydata()->result();
			$this->load->view('header');
			$this->load->view('dosen/dashboard_dosen', $data);
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

	public function tambah_project(){
		$namaProject				= $this->input->post('namaProject');
		$deskripsi					= $this->input->post('deskripsi');
		$prasyarat					= $this->input->post('prasyarat');
		$batasPendaftaran			= $this->input->post('batasPendaftaran');
		$kuota						= $this->input->post('kuota');
		$pengampu					= $this->session->userdata('nama');

		$data = array(
			'nama_project'			=> $namaProject,
			'deskripsi'				=> $deskripsi,
			'prasyarat'				=> $prasyarat,
			'batas_pendaftaran'		=> $batasPendaftaran,
			'kuota'					=> $kuota,
			'pengampu'				=> $pengampu, 

		);
		$this->model_project->input_data($data, 'tb_project');
		redirect('dosen/dashboard');
	}

	public function delete($id){
		$where = array ('id' => $id);
		$this->model_project->delete_data($where, 'tb_project');
		redirect('dosen/dashboard');
	}

	public function edit($id){
		$where = array('id' => $id);
		$data['project'] = $this->model_project
							->edit_data($where, 'tb_project')->result();

		if($this->session->userdata('role_id')==1){
			$this->load->view('header');
			$this->load->view('dosen/edit', $data);
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
	}

	public function update(){
		$id = $this->input->post('id');
		$prasyarat = $this->input->post('prasyarat');
		$batas_pendaftaran = $this->input->post('batas_pendaftaran');
		$kuota = $this->input->post('kuota');
		$data = array(
			'prasyarat' => $prasyarat,
			'batas_pendaftaran' => $batas_pendaftaran,
			'kuota' => $kuota,
		);
	
		$where = array(
			'id' => $id
		);
	
		$this->model_project->update_data($where, $data, 'tb_project');
		redirect('dosen/dashboard');
	}

}