<?php

class Model_user extends CI_Model{

    public function cek_dosen($id){

        $result = $this->db->where('nip',$id)
                        ->limit(1)
                        ->get('tb_dosen');
        if($result->num_rows() > 0){
                return $result->row();
            } else{
                return array();
            }                    

    }

    public function cek_mahasiswa($id){

        $result = $this->db->where('npm',$id)
                        ->limit(1)
                        ->get('tb_mahasiswa');
        if($result->num_rows() > 0){
                return $result->row();
            } else{
                return array();
            }                    

    }

    public function input_dosen($data){
        $this->db->insert('tb_dosen', $data);
    }

    public function input_mahasiswa($data){
        $this->db->insert('tb_mahasiswa', $data);
    }

    public function photo_dosen($where){
        $this->db->select('photo');
        $this->db->from('tb_dosen');
        return $this->db->where('nip',$where)->get();
    }

    public function photo_mahasiswa($where){
        $this->db->select('photo');
        $this->db->from('tb_mahasiswa');
        return $this->db->where('npm',$where)->get();
    }

    public function update_mahasiswa($where, $data){
        $this->db->where($where);
        $this->db->update('tb_mahasiswa', $data);
    }

}