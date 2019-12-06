<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function dashboard()
	{
		if($this->session->userdata('role')=='staff'){
			$id = $this->session->userdata('user_id');
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['project'] = $this->model_project->view_mydata()->result();
			
			$this->load->view('header',$data);
			$this->load->view('dosen/dashboard_dosen', $data);
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
		
	}

	public function add()
	{
		if($this->session->userdata('role')=='staff'){

			$id = $this->session->userdata('user_id');
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];

			$this->load->view('header',$data);
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
		if($this->session->userdata('role')=='staff'){
			$id = $this->session->userdata('user_id');
			$where = array('project_id' => $project_id);
			$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
			$data['project'] = $this->model_project->edit_data($where, 'tb_project')->result();
			$this->load->view('header',$data);
			$this->load->view('dosen/edit', $data);
			$this->load->view('footer');
		}else{
			redirect('auth/login');
		}
	}

	public function update(){
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
		$id = $this->session->userdata('user_id');
		$data['detail'] = $this->model_project->detail_data($project_id);
		$data['pendaftar'] = $this->model_pendaftar->pendaftar_project($project_id)->result();
		$arr_gambar = $this->model_user->photo_dosen($id)->result();
			$data['gambar'] = $arr_gambar[0];
		$this->load->view('header',$data);
		$this->load->view('dosen/project_detail', $data);
		$this->load->view('footer');

	}

	public function terima($register_id){
		$where = array( 'register_id' => $register_id );
		$update = array( 'status_pendaftar' => "Diterima");

		$data = $this->model_pendaftar->view_pendaftar($register_id);

		$this->model_project->update_data($where, $update, 'tb_pendaftar');
		$config = [
			'protocol'  => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_user' => 'system.dorema@gmail.com',
			'smtp_pass' => 'h4FE::80m',
			'smtp_port' => 465,
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'newline'   => "\r\n"

		];
		$project = $this->model_project->data_project($data->id_project);
		$project_name = $project->nama_project;
		$this->load->library('email',$config);
		$sender = $this->session->userdata('name');
		$this->email->from('system.dorema@gmail.com',$sender);
		$this->email->to('jhonrie033@gmail.com');
		$this->email->subject($project_name);
		$this->email->message(
		'<center><b><h1>Congratulation</h1></b></center>'.
		'Selamat anda telah diterima pada proyek '. $project_name . '.<br><br>' .
		'Terima Kasih atas partisipasi dalam mengikuti seleksi pemilihan asisten untuk proyek '. 
		$project_name . '.<br>Untuk informasi lebih lanjut silakan hubungi dosen terkait di Sekretariat Departemen.'.
		'<br><br>Tertanda<br>'. $sender);
		if($this->email->send())
		{
			redirect('dosen/detail/'.$data->id_project);
			return true;
		}
		else
		{
			echo $this->email->print_debugger();
			die;
		}
		
		 
	}

	public function download_cv($cv){
		force_download('./assets/files/'.$cv,NULL);
		
	}

}