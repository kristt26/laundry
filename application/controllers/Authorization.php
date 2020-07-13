<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Authorization extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model', 'UserModel');
    }

    public function index()
    {
        $title['title'] = ['header' => 'User Authorization', 'dash' => 'User_authorization'];
        $this->load->view('login', $title);
    }

    public function login()
    {
        $data = $this->input->post();
        $result = $this->UserModel->select($data);
        if (count($result)==0) {
            $this->session->set_flashdata('pesan', 'Gagal Login, error');
            redirect('authorization');
        } else {
            $this->session->set_userdata($result);
            if($result['jenis']=="Admin")
                redirect('admin/home');
            else
                redirect('member/home');
        }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('authorization');
    }
}

/* End of file Controllername.php */
