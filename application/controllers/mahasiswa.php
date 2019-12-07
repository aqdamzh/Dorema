<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	public function list()
	{
		if(SSO\SSO::check()){
			SSO\SSO::authenticate();
			$user = SSO\SSO::getUser();
			if($user->role=='mahasiswa'){
				$id = $user->npm;
				$where = array('npm' => $id);
				$arr_gambar = $this->model_user->photo_mahasiswa($id)->result();
				$pendaftar = $this->model_pendaftar->view_myproject($id)->result();
				$data['project'] = $this->model_project->view_data()->result();
				$data['pendaftar'] = array();
				$data['gambar'] = $arr_gambar[0];
				$data['user'] = $this->model_user->cek_mahasiswa($id);
				foreach ($pendaftar as $pdr) :
					array_push($data['pendaftar'],$pdr->id_project);
				endforeach;
	
				$this->load->view('mahasiswa/header',$data);
				$this->load->view('mahasiswa/project_list', $data);
				$this->load->view('footer');
			}else {
				redirect('auth/login');
			}
		}else{
			redirect('auth/login');
		}
		
	}
	public function dashboard(){
		if(SSO\SSO::check()){
			SSO\SSO::authenticate();
			$user = SSO\SSO::getUser();
			if($user->role=='mahasiswa'){
				$id = $user->npm;
				$data['pendaftar'] = $this->model_pendaftar->view_myproject($id)->result();
				$arr_gambar = $this->model_user->photo_mahasiswa($id)->result();
				$data['gambar'] = $arr_gambar[0];
				$data['user'] = $this->model_user->cek_mahasiswa($id);
				$this->load->view('mahasiswa/header',$data);
				$this->load->view('mahasiswa/dashboard_mahasiswa', $data);
				$this->load->view('footer');
			}else {
				redirect('auth/login');
			}
		}else{
			redirect('auth/login');
		}
	}
	public function daftar(){
		SSO\SSO::authenticate();
		$user = SSO\SSO::getUser();



		$pdf = $_FILES['cv'];

		if($picture=''){}else{
			$conf_pdf['upload_path']	= './assets/files';
			$conf_pdf['allowed_types'] = 'pdf';
		}

		$this->load->library('upload', $conf_pdf);
		if(!$this->upload->do_upload('cv')){
			echo "Upload Gagal!"; die();
		}else{
			$pdf = $this->upload->data('file_name');
		}


		$project_id = $this->input->post('project_id');
		$data = array(
			'id_pendaftar'	=>	$user->npm ,
			'id_project'	=>	$project_id ,
			'status_pendaftar'	=> "Menunggu Konfirmasi",
			'cv' => $pdf,
		);
		$this->model_pendaftar->input_pendaftar($data, 'tb_pendaftar');
		redirect('mahasiswa/list');
	}

	public function test(){
		$data['pendaftar'] = $this->model_pendaftar->view_myproject()->result();
		$data2['pendaftar'] = $this->model_pendaftar->pendaftar_project("14")->result();
		$data4['pendaftar'] = $this->model_user->cek_mahasiswa($id);

		$this->load->view('test', $data4);

	}
	public function profil(){
		SSO\SSO::authenticate();
		$user = SSO\SSO::getUser();
		$id = $user->npm;
		$arr_gambar = $this->model_user->photo_mahasiswa($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['user'] = $this->model_user->cek_mahasiswa($id);
		$this->load->view('mahasiswa/header',$data);
		$this->load->view('mahasiswa/profil_mahasiswa',$data);
		$this->load->view('footer');
	}

	public function update_profile(){
		$id = $this->input->post('npm');
		$phone_number = $this->input->post('phone');
		$address = $this->input->post('address');
		$skill = $this->input->post('skill');
		$interest = $this->input->post('interest');
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
			'phone_number' => $phone_number,
			'address' => $address,
			'skill' => $skill,
			'interest' => $interest,
			'photo' => $picture,
		);
	
		$where = array(
			'npm' => $id
		);
	
		$this->model_user->update_mahasiswa($where, $data);
		redirect('mahasiswa/profil');
	}

	public function upload_cv($id_project){
		SSO\SSO::authenticate();
		$user = SSO\SSO::getUser();
		$id = $user->npm;
		$arr_gambar = $this->model_user->photo_mahasiswa($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['project'] = $id_project;
		$data['user'] = $this->model_user->cek_mahasiswa($id);
		$this->load->view('mahasiswa/header',$data);
		$this->load->view('mahasiswa/upload_cv', $data);
		$this->load->view('footer');
	}
	
}
