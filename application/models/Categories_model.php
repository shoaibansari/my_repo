<?php

class Categories_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        define("TABLE_NAME", "categories");
        define("TABLE_ID", "category_id");
    }

    public function add($data){
        $this->db->insert(TABLE_NAME,$data);
        return $this->db->insert_id();
    }

    public function edit($id, $data){
        $this->db->where(TABLE_ID, $id);
        $this->db->update(TABLE_NAME, $data);

        return true;
    }

    public function delete($id){
        return $this->db->delete(TABLE_NAME, array(TABLE_ID => $id));
    }

    public function view($id)
    {
        $result = $this->db->get_where(TABLE_NAME, array(TABLE_ID => $id));
        if($result->num_rows() > 0)
        {
            return $result->row_array();
        }else{
            return false;
        }
    }

    public function getData()
    {
        $result = $this->db->get(TABLE_NAME);
        if($result->num_rows() > 0)
        {
            return $result->result_array();
        }else{
            return false;
        }
    }

    public function cate()
    {
        $result = $this->db->select('category_id,category_name')
                           ->from(TABLE_NAME)
                           ->order_by(TABLE_ID, 'DESC')
                           ->get();

         return $result->result();
    }



}