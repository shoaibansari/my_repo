<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends Global_Controller {

    function __construct()
    {
        parent::__construct();
        //Load models here
        $this->load->model("subjects_model");

    }
    //Show listing
    public function index()
    {
         $data = array(
            "title" => "Subjetcs Listing",
            "description" => "Manage Subjetcs from here !",
            "pmKey" => "subject_id"
        );

        //Set columns for grid
        $data['cols'] = array(
            "title" => "Subject",
            "created_at" => "Time",
            "status" => "Status",
        );

        //fetch data from database
        $data['items'] = $this->subjects_model->getData();
        $this->template("subjects/listing", $data);
    }


    // Add & Submit form
    public function add()
    {
        $cats = $this->subjects_model->cate();
        //print_r($cats); die();
        $data = array(
            "title" => "Add Subjects",
            "description" => "Manage subjects from here !"
        );


        // check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            $item = array(
                    "subject_name" => $this->input->post("subject_name"),
                    "category_id" => $this->input->post("category_id"),
                    "created_at" => date("Y-m-d H:i:s"),
                    "status" => $this->input->post("status")
              );
            if($this->subjects_model->add($item)>0)
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">Subjects Saved successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        }
        $data['cats'] = $cats;
        $this->template("subjects/add", $data);
    }

    // View & update form
    public function edit($id=0)
    {  
        $cats = $this->subjects_model->cate();
        $data = array(
            "title" => "Edit Subjects",
            "description" => "Manage Subjects from here !",
            "pmKey" => "subject_id"
        );

        //check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            
            $item = array(
                    "subject_name" => $this->input->post("subject_name"),
                    "category_id" => $this->input->post("category_id"),
                    "created_at" => date("Y-m-d H:i:s"),
                    "status" => $this->input->post("status")
              ); 


            if($this->subjects_model->edit($id, $item))
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">Subjects Edit Successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        
        }

        //Get data by id
        $data['cats'] = $cats;
        $data['item'] = $this->subjects_model->view($id);
        $this->template("subjects/edit", $data);
    }

    // Delete  Record
    public function delete($id=0)
    {
        $this->subjects_model->delete($id);
        $this->session->set_flashdata("msg",'<div class="alert alert-success">Subjects deleted successfully!</div>');
        redirect("subjects/");
    }

}