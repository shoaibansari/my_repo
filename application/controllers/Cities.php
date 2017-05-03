<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends Global_Controller {

    function __construct()
    {
        parent::__construct();
        //Load models here
        $this->load->model("cities_model");

    }
    //Show listing
    public function index()
    {
         $data = array(
            "title" => "Cities Listing",
            "description" => "Manage Cities from here !",
            "pmKey" => "city_id"
        );

        //Set columns for grid
        $data['cols'] = array(
            "title" => "City Name",
            "country" => "Country Name",
            "country_code" => "Country Code",
            "status" => "Status",
        );   

        //fetch data from database
        $data['items'] = $this->cities_model->getData();
        //print_r($data['items']); die();
        $this->template("cities/listing", $data);
    }

    // Add & Submit form
    public function add()
    {
        $data = array(
            "title" => "Add City",
            "description" => "Manage cities from here !"
        );


        // check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            $item = array(
                    "city_name" => $this->input->post("city_name"),
                    "country_name" => $this->input->post("country_name"),
                    "country_code" => $this->input->post("country_code"),
                    "status" => $this->input->post("status")
              );
            if($this->cities_model->add($item)>0)
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">City saved successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        }

        $this->template("cities/add", $data);
    }

    // View & update form
    public function edit($id=0)
    {  
        $countries = $this->cities_model->get_countries();
        $data = array(
            "title" => "Edit City",
            "description" => "Manage City from here !",
            "pmKey" => "city_id"
        );

        //check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            
            $item = array(
                "city_name" => $this->input->post("city_name"),
                "country_name" => $this->input->post("country_name"),
                "country_code" => $this->input->post("country_code"),
                "status" => $this->input->post("status")
              ); 

            if($this->cities_model->edit($id, $item))
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">City Edit Successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        
        }

        //Get data by id
        $data['countries'] = $countries;
        $data['item'] = $this->cities_model->view($id);
        $this->template("cities/edit", $data);
    }

    // Delete  Record
    public function delete($id=0)
    {
        $this->cities_model->delete($id);
        $this->session->set_flashdata("msg",'<div class="alert alert-success">City deleted successfully!</div>');
        redirect("cities/");
    }

} 