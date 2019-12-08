<?php
class Model_pendaftar extends CI_Model{

    public function input_pendaftar($data, $table){
        $this->db->insert($table, $data);
    }

    public function view_pendaftar($where){
        $this->db->select('*');
        $this->db->from('tb_pendaftar');
        $this->db->join('tb_mahasiswa', 'tb_mahasiswa.npm = tb_pendaftar.id_pendaftar');
        return $this->db->limit(1)
        ->where('register_id', $where)->get()->row();
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

    public function project_terdaftar($where){
        $sql = "select COUNT(id_pendaftar) as jumlah FROM tb_pendaftar WHERE id_pendaftar= ?";
        $query = $this->db->query($sql, array($where));
        return $query->row();
    }

    public function project_dijalankan($where){
        $sql = "select COUNT(id_pendaftar) as jumlah FROM tb_pendaftar WHERE id_pendaftar= ? and status_pendaftar='Diterima'";
        $query = $this->db->query($sql, array($where));
        return $query->row();
    }
    public function sendNotif($where){
        $sql = "SELECT email from tb_mahasiswa where npm = ?";
        $query = $this->db->query($sql, array($where));
        return $query->row();

    }
    public function cv_mahasiswa($where){
        $this->db->select('cv');
        $this->db->from('tb_pendaftar');
        return $this->db->where('id_pendaftar',$where)->get();
    }
}