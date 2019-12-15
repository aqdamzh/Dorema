<?php
class Auth extends CI_Controller {

    public function index(){
        redirect('auth/login');
    }

    public function login(){
        if(SSO\SSO::check()){
            SSO\SSO::authenticate();
            $user = SSO\SSO::getUser();
            switch($user->role){
                case 'staff' :
                    redirect('dosen/dashboard');
                break;
                case 'mahasiswa' :
                    redirect('mahasiswa/list');
                break;
                default: break;
            }
        }else{
            $this->load->view('form_login');
        }
    }

    public function logout_mahasiswa(){
        SSO\SSO::logout('https://dorema.azurewebsites.net/');
    }

    public function logout_dosen(){
        SSO\SSO::logout('https://dorema.azurewebsites.net/');
    }
}