<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function index(){
        SSO\SSO::authenticate();
        $user = SSO\SSO::getUser();

        switch($user->role){
            case 'staff' : 
                
            break;
            case 'mahasiswa' :
                $npm = $user->npm;
                $name = $user->name;
                $faculty = $user->faculty;
                $study_program = $user->study_program;
                $educational_program = $user->educational_program;
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

    function __construct(){
        parent::__construct();
    }
}