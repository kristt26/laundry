<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pemesanan_model', 'PemesananModel');
    }

    public function index()
    {
        $title['title'] = ['header' => 'Pemesanan', 'dash' => 'Pemesanan'];
        $data = $this->PemesananModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('admin/template/footer');
    }

    public function ubah()
    {
        $data = $this->input->post();
        $result = $this->PemesananModel->update($data);
        if ($result) {
            $this->session->set_flashdata('pesan', 'Status berhasil di ubah, success');
        } else {
            $this->session->set_flashdata('pesan', 'Status gagal di ubah, error');
        }

        redirect('admin/pemesanan');
    }

    
    public function hapus($kd_pemesanan)
    {
        if ($this->PemesananModel->delete($kd_pemesanan)) {
            $this->session->set_flashdata('pesan', 'Data berhasil di hapus, success');
        } else {
            $this->session->set_flashdata('pesan', 'Data gagal di hapus, error');
        }
        redirect('admin/pegawai');
    }
}
