<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member/Transaksi_model', 'TransaksiModel');
    }

    public function index()
    {
        $title['title'] = ['header' => 'Transaksi', 'dash' => 'Transaksi'];
        $this->load->view('member/template/header', $title);
        $this->load->view('member/transaksi');
        $this->load->view('member/template/footer');
    }

    public function gettransaksi()
    {
        $result = $this->TransaksiModel->select();
        echo json_encode($result);
    }
}

/* End of file Controllername.php */
