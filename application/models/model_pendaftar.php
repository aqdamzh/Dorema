<?php
class Model_pendaftar extends CI_Model{

    public function input_pendaftar($data, $table){
        $this->db->insert($table, $data);
    }

    public function view_myproject(){
        $mahasiswa_id = $this->session->userdata('user_id');
        $this->db->select('*');
        $this->db->from('tb_pendaftar');
        $this->db->join('tb_project', 'tb_project.id = tb_pendaftar.id_project');
        return $this->db->where('id_pendaftar', $mahasiswa_id)->get();
    }

}