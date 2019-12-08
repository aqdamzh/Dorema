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
				$config['base_url'] = site_url('mahasiswa/list'); //site url
				$config['total_rows'] = $this->model_project->row(); //total row
				$config['per_page'] = 2;  //show record per halaman
				$config["uri_segment"] = 3;  // uri parameter
				$choice = $config["total_rows"] / $config["per_page"];
				$config["num_links"] = floor($choice);
				$config['first_link']       = 'First';
				$config['last_link']        = 'Last';
				$config['next_link']        = 'Next';
				$config['prev_link']        = 'Prev';
				$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
				$config['full_tag_close']   = '</ul></nav></div>';
				$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
				$config['num_tag_close']    = '</span></li>';
				$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
				$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
				$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
				$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['prev_tagl_close']  = '</span>Next</li>';
				$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
				$config['first_tagl_close'] = '</span></li>';
				$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
				$config['last_tagl_close']  = '</span></li>';
				
				$this->pagination->initialize($config);
				$data['page'] = $this->uri->segment(3);		
				$data['project'] = $this->model_project->view_data($config["per_page"], $data['page'])->result();;           
				$data['pagination'] = $this->pagination->create_links();

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
		$id = $user->npm;

		$pdf = $_FILES['cv'];

		if($picture=''){}else{
			$conf_pdf['upload_path']	= './assets/files';
			$conf_pdf['allowed_types'] = 'pdf';
		}

		$this->load->library('upload', $conf_pdf);
		if(!$this->upload->do_upload('cv')){
			$pdf=$this->model_pendaftar->cv_mahasiswa($id)->row()->cv;
			$id_project = $this->input->post('project_id');
			redirect('mahasiswa/upload_cv/'.$id_project); die();
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
		$data4['pendaftar'] = $this->model_pendaftar->view_pendaftar("35");
		$data5['pendaftar'] = $this->model_pendaftar->project_dijalankan('1706043191');

		$this->load->view('test', $data5);

	}
	public function profil(){
		SSO\SSO::authenticate();
		$user = SSO\SSO::getUser();
		$id = $user->npm;
		$arr_gambar = $this->model_user->photo_mahasiswa($id)->result();
		$data['gambar'] = $arr_gambar[0];
		$data['user'] = $this->model_user->cek_mahasiswa($id);
		$data['terdaftar'] = $this->model_pendaftar->project_terdaftar($id);
		$data['dijalankan'] = $this->model_pendaftar->project_dijalankan($id);
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
		$email = $this->input->post('email');
		$picture = $_FILES['photo'];

		if($picture=''){}else{
			$conf_pic['upload_path']	= './assets/adminLTE/dist/img/';
			$conf_pic['allowed_types'] = 'jpg|png|gif';
		}

		$this->load->library('upload', $conf_pic);
		if(!$this->upload->do_upload('photo')){
			$picture = $this->model_user->photo_mahasiswa($id)->result();
			redirect('mahasiswa/profil'); die();
		}else{
			$picture = $this->upload->data('file_name');
		}

		$data = array(
			'email' => $email,
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
