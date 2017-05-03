<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Global_Controller {

    function __construct()
    {
        parent::__construct();
        //Load models here
        $this->load->model("Articles_model");
    }

    // Show listing
    public function index()
	{
        $data = array(
            "title" => "Articles Listing",
            "description" => "Manage articles from here !",
            "pmKey" => "article_id"
        );

        //Set columns for grid
        $data['cols'] = array(
            "title" => "Title",
            "description" => "Description",
            "path" => "File"
        );

        //fetch data from database
        $data['items'] = $this->Articles_model->getData();

        $this->template("article/listing", $data);
	}


	// Add & Submit form
	public function add()
    {
        $data = array(
            "title" => "Add Articles",
            "description" => "Manage articles from here !"
        );

        //check if form is submitted
        if($this->input->post("btn_submit")!==NULL){
            $folder = "uploads/articles/";
            $fileName = "article-".date("Y-m-d-his").".pdf";
            $uploadResponse = $this->do_upload($folder,$fileName);
            if($uploadResponse==1)
            {
                $item = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("desc"),
                    "path" => $folder.$fileName
                );
                $this->Articles_model->add($item);
                $this->session->set_flashdata("msg",'<div class="alert alert-success">Article Saved successfully!</div>');
            }else{
                $this->session->set_flashdata("msg",'<div class="alert alert-danger">Error occured! '.$uploadResponse.'</div>');
            }

        }
        $this->template("article/add", $data);
    }

    // View & update form
    public function edit($id=0)
    {
        $data = array(
            "title" => "Edit Article",
            "description" => "Manage articles from here !",
            "pmKey" => "article_id"
        );

        //check if form is submitted
        if($this->input->post("btn_submit")!==NULL){

            //if file selected else only update without file
            if(!empty($_FILES['resFile']['name'])) {

                //upload file
                $folder = "uploads/articles/";
                $fileName = "article-" . date("Y-m-d-his") . ".pdf";
                $uploadResponse = $this->do_upload($folder, $fileName);

                if ($uploadResponse == 1) {
                    $item = array(
                        "title" => $this->input->post("title"),
                        "description" => $this->input->post("desc"),
                        "path" => $folder . $fileName
                    );
                    $this->Articles_model->edit($item, $id);
                    $this->session->set_flashdata("msg", '<div class="alert alert-success">Article Saved successfully!</div>');
                } else {
                    $this->session->set_flashdata("msg", '<div class="alert alert-danger">Error occured! ' . $uploadResponse . '</div>');
                }
            }else{
                $item = array(
                    "title" => $this->input->post("title"),
                    "description" => $this->input->post("desc")
                );
                $this->Articles_model->edit($item, $id);
                $this->session->set_flashdata("msg", '<div class="alert alert-success">Article Saved successfully!</div>');
            }

        }

        //Get data by id
        $data['item'] = $this->Articles_model->view($id);
        $this->template("article/edit", $data);
    }

    // Delete  Record
    public function delete($id=0)
    {
        $this->Articles_model->delete($id);
        $this->session->set_flashdata("msg",'<div class="alert alert-success">Article deleted successfully!</div>');
        redirect("article/");
    }

}
