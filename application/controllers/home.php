<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        SSO\SSO::authenticate();
        $data['user'] = SSO\SSO::getUser();
        $this->load->view('home', $data);
    }

    function __construct(){
        parent::__construct();
    }
}