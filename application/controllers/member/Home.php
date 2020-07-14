<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model', 'ProfileModel');
    }
    
    public function index()
    {
        $title['title'] = ['header'=>'Home', 'dash'=>'Home'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('member/template/header', $title);
        $this->load->view('admin/home', $data);
        $this->load->view('member/template/footer');
    }

}

/* End of file Home.php */
