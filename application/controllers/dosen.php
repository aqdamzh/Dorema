<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function index()
	{
		$this->load->view('header');
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/dashboard_dosen');
		$this->load->view('footer');
	}

	public function add()
	{
		$this->load->view('header');
		$this->load->view('dosen/sidebar_dosen');
		$this->load->view('dosen/tambah_project');
		$this->load->view('footer');
	}
}
