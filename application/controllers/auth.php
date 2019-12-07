<?php
class Auth extends CI_Controller {

    public function index(){
        $this->load->library('session');
        if($this->session->userdata('role')=='staff'){
            redirect('dosen/dashboard');
        }elseif ($this->session->userdata('role')=='mahasiswa'){
            redirect('mahasiswa/list');
        }else {
            redirect('auth/login');
        }
    }

    public function login(){
        $this->load->library('session');
        if($this->session->userdata('role')=='staff'){
            redirect('dosen/dashboard');
        }elseif ($this->session->userdata('role')=='mahasiswa'){
            redirect('mahasiswa/list');
        }else {
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
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('name', $auth->name);
                $this->session->set_userdata('role', $auth->role);
                $this->session->set_userdata('user_id', $auth->id);
                $this->session->set_userdata('faculty', $auth->faculty);
                $this->session->set_userdata('study_program', $auth->study_program);
                $this->session->set_userdata('educational_program', $auth->educational_program);

                switch($auth->role){
                    case 'staff' : 
                        $nip = $this->session->userdata('user_id');
                        $name = $this->session->userdata('name');
                        $data = array('nip' => $nip,'name' => $name,);

                        $auth_dosen = $this->model_user->cek_dosen($nip);
                        if($auth_dosen == FALSE){
                            $this->model_user->input_dosen($data);
                        }
                        redirect('dosen/dashboard');
                    break;
                    case 'mahasiswa' :
                        $npm = $this->session->userdata('user_id');
                        $name = $this->session->userdata('name');
                        $faculty = $this->session->userdata('faculty');
                        $study_program = $this->session->userdata('study_program');
                        $educational_program = $this->session->userdata('educational_program');
                        $data = array(
                            'npm' => $npm,
                            'name' => $name,
                            'faculty' => $faculty,
                            'study_program' => $study_program,
                            'educational_program' => $educational_program,);

                        $auth_dosen = $this->model_user->cek_mahasiswa($npm);
                        if($auth_dosen == FALSE){
                            $this->model_user->input_mahasiswa($data);
                        } 
                        redirect('mahasiswa/list');
                    break;
                    default: break;

                }
            }
        }
        }
    }

    public function logout_mahasiswa(){
        SSO\SSO::logout('https://sso123test.azurewebsites.net/');
    }

    public function logout_dosen(){
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}