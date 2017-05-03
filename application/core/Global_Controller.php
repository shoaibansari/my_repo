<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Global_Controller extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        //set default timezone
        date_default_timezone_set("Asia/Karachi");

        //load global helpers  and libaries
        $this->load->library('session');
        $this->load->helper('url');

        //check for login
        if(!$this->session->has_userdata('userID'))
        {
            redirect("/login/index");
        }
    }

    public function do_upload($folder,$fileName,$types = "pdf")
    {
        $config['upload_path'] = $folder;
        $config['file_name'] = $fileName;
        $config['allowed_types'] = $types;
        $config['max_size']     = '1024';

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('resFile'))
        {
            return $this->upload->display_errors();
        }
        else
        {
            return "1";
        }
    }

    public function template($page,$data = array())
    {
        $this->load->view("layout/header");
        $this->load->view($page, $data);
        $this->load->view("layout/footer");
    }
}
