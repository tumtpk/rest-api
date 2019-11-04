<?php
class BD_Model extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->tableName = null;
    }
    
    function getBy($condition){
        $this->db->where($condition);
        $query = $this->db->get($this->tableName);
        return $query->row();
    }

    function getAll($condition=[]){
        if(!empty($condition)){
            $this->db->where($condition);
        }
        $query = $this->db->get($this->tableName);
        return $query->result();
    }

    public function insert($data){
        $result = $this->db->insert($this->table_name, $data);
        return $result;
    }

    public function update($condition,$data){
        $this->db->where($condition);
        $result = $this->db->update($this->table_name, $data);
        return $result;
    }

    public function delete($condition){
        $result = $this->db->delete($this->table_name, $condition);
        return $result;
    }
}