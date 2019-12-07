<?php
class Model_pendaftar extends CI_Model{

    public function input_pendaftar($data, $table){
        $this->db->insert($table, $data);
    }

    public function view_pendaftar($where){
        return $this->db
        ->get_where('tb_pendaftar', array('register_id' => $where))->row();
    }

    public function view_myproject($id){
        $mahasiswa_id = $id;
        $this->db->select('*');
        $this->db->from('tb_pendaftar');
        $this->db->join('tb_project', 'tb_project.project_id = tb_pendaftar.id_project');
        return $this->db->where('id_pendaftar', $mahasiswa_id)->get();
    }

    public function pendaftar_project($where){
        $this->db->select('*');
        $this->db->from('tb_pendaftar');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.npm = tb_pendaftar.id_pendaftar');
        return $this->db->where('id_project', $where)->get();
    }

}