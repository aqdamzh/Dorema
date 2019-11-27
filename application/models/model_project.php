<?php
class Model_project extends CI_Model{

    public function view_data(){
        return $this->db->get('tb_project');
    }
    public function view_mydata(){
        $pengampu = $this->session->userdata('nama');
        return $this->db
        ->where('pengampu',$pengampu)
        ->get('tb_project');
    }
    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }
}