<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profile_model', 'ProfileModel');        
    }
    

    public function index()
    {
        $title['title'] = ['header'=>'Profile Laundry', 'dash'=>'Profile'];
        $data['data'] = $this->ProfileModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/profile', $data);
        $this->load->view('admin/template/footer', $title);
    }
    function simpan()
    {
        $data = $this->input->post();
        $result =  $this->ProfileModel->insert($data);
        if($result['status']){
            $this->session->set_flashdata('pesan', $result['message']);
			redirect('admin/profile');
        }else{
            $this->session->set_flashdata('pesan', $result['message']);
			redirect('profile');
        }
    }
    public function getprofile()
    {
        $data = $this->ProfileModel->select();
        echo json_encode($data);
    }

}

/* End of file Profile.php */

