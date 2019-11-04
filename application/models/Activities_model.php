<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Activities_model extends BD_Model {
    function __construct()
    {
        parent::__construct();
        $this->table_name = "activities";
    }

    function get_all($keyword){
        $this->db->like('activity_name', $keyword);
        $result = $this->db->get($this->table_name);
        return $result->result();
    }

    function all_count()
    {   
        $query = $this->db->get($this->table_name);
        return $query->num_rows();  
                                                                                                                                                                                                
    }
    
    function all($limit,$start,$col,$dir)
    {   
       $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)->get($this->table_name);
        
        if($query->num_rows()>0){
            return $query->result(); 
        }else{
            return null;
        }
        
    }
    
    function search($limit,$start,$search,$col,$dir)
    {
        $this->db->like('activity_name',$search);

        $query = $this->db->limit($limit,$start)
                ->order_by($col,$dir)
                ->get($this->table_name);
        
        if($query->num_rows()>0){
            return $query->result();  
        }else{
            return null;
        }
    }

    function search_count($search){
        $query = $this->db->like('activity_name',$search)
                ->get($this->table_name);
    
        return $query->num_rows();
    } 

}