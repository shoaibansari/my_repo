<?php
class Users_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        define("TABLE_NAME","users");
        define("TABLE_USER","email");
    }

    public function checkExist($userName)
    {
        $result = $this->db->get_where(TABLE_NAME, array(TABLE_USER => $userName));
        if($result->num_rows() > 0)
        {
            return $result->first_row();
        }else{
            return false;
        }
    }

}