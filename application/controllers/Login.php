<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_model");
        $this->load->helper("url");
        $this->load->library("session");
    }

    public function index($param = "")
	{
	    if($param=="logout")
        {
            $this->logout();
        }
		$this->load->view('login');
	}

	public function authenticate()
    {
        $user = $this->input->post("userName");
        $pwd  = md5($this->input->post("password"));
        $row = $this->Users_model->checkExist($user);
        if($row!=false)
        {

            if($row->password==$pwd)
            {
                $this->session->set_userdata('userID',$row->user_id);
                $this->session->set_userdata('username',$row->first_name);
                redirect("/dashboard/");
            }else{
                $this->session->set_flashdata('error', '<div class="alert alert-danger">User name or password incorrect!</div>');
                redirect("/login/");
            }
        }else{
                $this->session->set_flashdata('error', '<div class="alert alert-danger">User name or password incorrect!</div>');
            redirect("/login/");
        }
    }

    private function logout()
    {
        $this->session->unset_userdata('userID');
        $this->session->unset_userdata('username');
    }
}
