<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function dashboard()
	{
		$this->load->library('session');
		if($this->session->userdata('role')=='staff'){
			$id = $this->session->userdata('user_id');
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['project'] = $this->model_project->view_mydata()->result();
			$data['user'] = $this->model_user->cek_dosen($id);
			$this->load->view('dosen/header',$data);
			$this->load->view('dosen/dashboard_dosen', $data);
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
		
	}

	public function add()
	{
		$this->load->library('session');
		if($this->session->userdata('role')=='staff'){

			$id = $this->session->userdata('user_id');
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['user'] = $this->model_user->cek_dosen($id);
			$this->load->view('dosen/header',$data);
			$this->load->view('dosen/tambah_project');
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
	}

	public function tambah_project(){
		$this->load->library('session');
		$namaProject				= $this->input->post('namaProject');
		$deskripsi					= $this->input->post('deskripsi');
		$prasyarat					= $this->input->post('prasyarat');
		$batasPendaftaran			= $this->input->post('batasPendaftaran');
		$kuota						= $this->input->post('kuota');
		$pengampu					= $this->session->userdata('name');
		$id_pengampu				= $this->session->userdata('user_id');

		$data = array(
			'nama_project'			=> $namaProject,
			'deskripsi'				=> $deskripsi,
			'prasyarat'				=> $prasyarat,
			'batas_pendaftaran'		=> $batasPendaftaran,
			'kuota'					=> $kuota,
			'pengampu'				=> $pengampu,
			'id_pengampu' 			=> $id_pengampu,
		);
		$this->model_project->input_data($data, 'tb_project');
		redirect('dosen/dashboard');
	}

	public function delete($project_id){
		$where = array ('project_id' => $project_id);
		$this->model_project->delete_data($where, 'tb_project');
		redirect('dosen/dashboard');
	}

	public function edit($project_id){
		$this->load->library('session');
		if($this->session->userdata('role')=='staff'){
			$id = $this->session->userdata('user_id');
			$where = array('project_id' => $project_id);
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['project'] = $this->model_project->edit_data($where, 'tb_project')->result();
			$data['user'] = $this->model_user->cek_dosen($id);
			$this->load->view('dosen/header',$data);
			$this->load->view('dosen/edit', $data);
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
	}

	public function update(){
		$this->load->library('session');
		$id = $this->input->post('project_id');
		$prasyarat = $this->input->post('prasyarat');
		$batas_pendaftaran = $this->input->post('batas_pendaftaran');
		$kuota = $this->input->post('kuota');
		$data = array(
			'prasyarat' => $prasyarat,
			'batas_pendaftaran' => $batas_pendaftaran,
			'kuota' => $kuota,
		);
	
		$where = array(
			'project_id' => $id
		);
	
		$this->model_project->update_data($where, $data, 'tb_project');
		redirect('dosen/dashboard');
	}

	public function detail($project_id){
		$this->load->library('session');
		$id = $this->session->userdata('user_id');
		$data['detail'] = $this->model_project->detail_data($project_id);
		$data['pendaftar'] = $this->model_pendaftar->pendaftar_project($project_id)->result();
		$arr_gambar = $this->model_user->photo_dosen($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['user'] = $this->model_user->cek_dosen($id);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/project_detail', $data);
		$this->load->view('footer');

	}

	public function terima($register_id){
		$this->load->library('session');
		$where = array( 'register_id' => $register_id );
		$update = array( 'status_pendaftar' => "Diterima");

		$data = $this->model_pendaftar->view_pendaftar($register_id);

		$this->model_project->update_data($where, $update, 'tb_pendaftar');
		redirect('dosen/detail/'.$data->id_project);
	}

	public function download_cv($cv){
		force_download('./assets/files/'.$cv,NULL);
		
	}

	public function detail_pendaftar($reg_id){
		$this->load->library('session');
		$id = $this->session->userdata('user_id');
		$arr_gambar = $this->model_user->photo_dosen($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['user'] = $this->model_user->cek_dosen($id);
		$data['pendaftar'] = $this->model_pendaftar->view_pendaftar($reg_id);
		$data['terdaftar'] = $this->model_pendaftar->project_terdaftar($data['pendaftar']->id_pendaftar);
		$data['dijalankan'] = $this->model_pendaftar->project_dijalankan($data['pendaftar']->id_pendaftar);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/detail_pendaftar', $data);
		$this->load->view('footer');
	}

	public function profil(){
		$this->load->library('session');
		$id = $this->session->userdata('user_id');
		$arr_gambar = $this->model_user->photo_dosen($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['user'] = $this->model_user->cek_dosen($id);
		$this->load->view('dosen/header',$data);
		$this->load->view('dosen/profil_dosen',$data);
		$this->load->view('footer');
	}

	public function update_profile(){
		$id = $this->input->post('nip');
		$phone_number = $this->input->post('phone');
		$address = $this->input->post('office');
		$email = $this->input->post('email');
		$picture = $_FILES['photo'];

		if($picture=''){}else{
			$conf_pic['upload_path']	= './assets/adminLTE/dist/img/';
			$conf_pic['allowed_types'] = 'jpg|png|gif';
		}

		$this->load->library('upload', $conf_pic);
		if(!$this->upload->do_upload('photo')){
			echo "Upload Gagal!"; die();
		}else{
			$picture = $this->upload->data('file_name');
		}

		$data = array(
			'email' => $email,
			'phone_number' => $phone_number,
			'office' => $office,
			'photo' => $picture,
		);
	
		$where = array(
			'nip' => $id
		);
	
		$this->model_user->update_dosen($where, $data);
		redirect('dosen/profil');
	}


}