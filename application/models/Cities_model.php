<?php

class Cities_model extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        define("TABLE_NAME", "cities");
        define("TABLE_ID", "city_id");
        define("TABLE_2", "countries");
        define("TABLE_2_ID", "country_id");
    }

    public function add($data){
        //print_r($data); die();
        $prep_data = array(
            'country_name' => $data['country_name'],
            'country_code' => $data['country_code'],
            'status' => $data['status']
        );
        $this->db->insert(TABLE_2,$prep_data);
        $country_id = $this->db->insert_id();
        
        $prep_data = array(
            'city_name' => $data['city_name'],
            'country_id' => $country_id
        );
        $this->db->insert(TABLE_NAME,$prep_data);
        return $this->db->insert_id();
    }

    public function edit($id, $data){
        //print_r($data); die();
        $city_name = $data['city_name'];
        $country_name = $data['country_name'];
        $country_code = $data['country_code'];
        $status = $data['status'];
        
        $sql = "UPDATE cities
                INNER JOIN countries ON countries.country_id = cities.country_id
                SET cities.city_name = '$city_name',
                    countries.country_name = '$country_name',
                    countries.country_code = '$country_code',
                    countries.status = $status
                WHERE cities.city_id = $id";
        
        $this->db->query($sql);

        return true;
    }

    public function delete($id){
        
        $sql = "DELETE cities, countries FROM cities
                INNER JOIN countries ON countries.country_id = cities.country_id
                WHERE cities.city_id = $id";
        //echo $sql; die();
        return $this->db->query($sql);
    }

    public function view($id)
    {
        $sql = "SELECT * FROM ". TABLE_NAME ."
                INNER JOIN countries ON countries.country_id = cities.country_id 
                WHERE cities.city_id = $id";
        
        $result = $this->db->query($sql);
        
        if($result->num_rows() > 0)
        {
            return $result->row_array();
        }else{
            return false;
        }
    }

    public function getData()
    {
        //$result = $this->db->get(TABLE_NAME);
        $this->db->select('*');
        $this->db->from(TABLE_NAME);
        $this->db->join(TABLE_2, TABLE_2.'.country_id ='.TABLE_NAME.'.country_id');
        $result = $this->db->get();

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

     public function get_countries(){
        $result = $this->db->select('country_id, country_name, country_code')
                           ->from('countries')
                           ->order_by('country_id', 'ASC')
                           ->get();

         return $result->result();
    }


}