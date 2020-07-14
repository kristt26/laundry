<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('member/Pemesanan_model', 'PemesananModel');
    }

    public function index()
    {
        $title['title'] = ['header' => 'Pemesanan', 'dash' => 'Pemesanan'];
        $data = $this->PemesananModel->select();
        $this->load->view('member/template/header', $title);
        $this->load->view('member/pemesanan', $data);
        $this->load->view('member/template/footer');
    }

    public function simpan()
    {
        $data = $this->input->post();
        $result = $this->PemesananModel->insert($data);
        if ($result) {
            $this->session->set_flashdata('pesan', 'Data berhasil di simpan, success');
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal di simpan, error');
        }

        redirect('member/pemesanan');
    }
    public function ubah()
    {

    }
    public function hapus($kd_pemesanan)
    {
        if ($this->PemesananModel->delete($kd_pemesanan)) {
            $this->session->set_flashdata('pesan', 'Data berhasil di hapus, success');
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal di hapus, error');
        }

        redirect('member/pemesanan');
    }
}

