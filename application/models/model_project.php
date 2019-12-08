<?php
class Model_project extends CI_Model{

    public function view_data(){
        return $this->db->get('tb_project');
    }
    public function view_mydata(){
        $pengampu = $this->session->userdata('user_id');
        return $this->db
        ->where('id_pengampu',$pengampu)
        ->get('tb_project');
    }
    public function input_data($data, $table){
        $this->db->insert($table, $data);
    }
    public function delete_data($where, $table){
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function detail_data($id = NULL){
        return $this->db
        ->get_where('tb_project', array('project_id' => $id))->row();
    }
    public function data_project($project_id){
        $result = $this->db->where('project_id',$project_id)
                        ->limit(1)
                        ->get('tb_project');
        if($result->num_rows() > 0){
                return $result->row();
            } else{
                return array();
            }                    
    }
}