<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sso extends CI_Controller{

    public function index(){
        if(SSO\SSO::check()){
            redirect('home');
        }else{
            SSO\SSO::authenticate();
            redirect('home');
        }
    }


    public function logout(){
        SSO\SSO::logout();
    }

    function __construct(){
        parent::__construct();
    }
}