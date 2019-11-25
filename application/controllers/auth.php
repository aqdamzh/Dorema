<?php
class Auth extends CI_Controller {

    public function login(){
        $this->form_validation->set_rules('username','
        username','required');
        $this->form_validation->set_rules('password','
        password','required');
        if ($this->form_validation->run()==FALSE){
            
            $this->load->view('form_login');

        } else{
            $auth = $this->model_auth->cek_login();

            if($auth == FALSE){
                $this->session->set_flashdata('pesan', '<div 
                class="alert alert-danger 
                alert-dismissible fade show" 
                role="alert">
                Username atau Password Anda Salah!
                <button type="button" class="close" 
                data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth
                ->username);
                $this->session->set_userdata('role_id', $auth
                ->role_id);

                switch($auth->role_id){
                    case 1 : redirect('dosen');
                    break;
                    case 2 : redirect('mahasiswa');
                    default: break;

                }
            }
        }
    }
}