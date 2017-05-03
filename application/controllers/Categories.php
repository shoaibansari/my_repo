<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends Global_Controller {

    function __construct()
    {
        parent::__construct();
        //Load models here
        $this->load->model("categories_model");

    }
    //Show listing
    public function index()
    {
         $data = array(
            "title" => "Categories Listing",
            "description" => "Manage Categories from here !",
            "pmKey" => "category_id"
        );

        //Set columns for grid
        $data['cols'] = array(
            "title" => "Name",
            "parent" => "Parent",
            "meta_tag_title" => "Meta tag title",
            "meta_tag_desc" => "Meta tag Description",
            "meta_keywords" => "Meta_keywords",
            "created_at" => "Time",
            "status" => "Status",
        );

        

        //fetch data from database
        $data['items'] = $this->categories_model->getData();
        $this->template("categories/listing", $data);
    }


    // Add & Submit form
    public function add()
    {
        $parent = $this->categories_model->cate();
        $data = array(
            "title" => "Add Categories",
            "description" => "Manage categories from here !"
        );


        // check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            $item = array(
                    "category_name" => $this->input->post("category_name"),
                    "is_parent" => $this->input->post("is_parent"),
                    "created_at" => date("Y-m-d H:i:s"),
                    "meta_tag_title" => $this->input->post("meta_tag_title"),
                    "meta_tag_description" => $this->input->post("meta_tag_description"),
                    "meta_keywords" => $this->input->post("meta_keywords"),
                    "status" => $this->input->post("status")
              );
            if($this->categories_model->add($item)>0)
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">category Saved successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        }
        $data['parent'] = $parent;
        $this->template("categories/add", $data);
    }

    // View & update form
    public function edit($id=0)
    {  
        $parent = $this->categories_model->cate();
        $data = array(
            "title" => "Edit Category",
            "description" => "Manage Category from here !",
            "pmKey" => "category_id"
        );

        //check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            
            $item = array(
                    "category_name" => $this->input->post("category_name"),
                    "is_parent" => $this->input->post("is_parent"),
                    "created_at" => date("Y-m-d H:i:s"),
                    "meta_tag_title" => $this->input->post("meta_tag_title"),
                    "meta_tag_description" => $this->input->post("meta_tag_description"),
                    "meta_keywords" => $this->input->post("meta_keywords"),
                    "status" => $this->input->post("status")
              ); 


            if($this->categories_model->edit($id, $item))
            {    
                $this->session->set_flashdata("msg",'<div class="alert alert-success">Category Edit Successfully!</div>');
            }
            else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured!</div>');
            }

        
        }

        //Get data by id
        $data['parent'] = $parent;
        $data['item'] = $this->categories_model->view($id);
        $this->template("categories/edit", $data);
    }

    // Delete  Record
    public function delete($id=0)
    {
        $this->categories_model->delete($id);
        $this->session->set_flashdata("msg",'<div class="alert alert-success">Category deleted successfully!</div>');
        redirect("categories/");
    }

}