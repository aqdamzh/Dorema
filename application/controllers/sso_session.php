<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sso_session extends CI_Controller{
    public function index(){
        SSO\SSO::authenticate();
        $data['user'] = SSO\SSO::getUser();
        $this->load->view('test2', $data);
    }

    function __construct(){
        parent::__construct();
    }
}