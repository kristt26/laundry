<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Transaksi_model', 'TransaksiModel');
    }

    public function index()
    {
        $title['title'] = ['header' => 'Transaksi', 'dash' => 'Transaksi'];
        $data = $this->TransaksiModel->select();
        $this->load->view('member/template/header', $title);
        $this->load->view('member/transaksi', $data);
        $this->load->view('member/template/footer');
    }
    function insert()
    {
        $data = $this->input->post();
        $result = $this->TransaksiModel->insert($data);
        if($result)
            $this->session->set_flashdata('pesan', 'Status berhasil di ubah, success');
        else
            
    }
}

/* End of file Controllername.php */
