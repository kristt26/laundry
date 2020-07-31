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
        // $data = $this->TransaksiModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/transaksi');
        $this->load->view('admin/template/footer');
    }
    public function gettransaksi()
    {
        $data = $this->TransaksiModel->select();
        echo json_encode($data);
    }
    
    function simpan()
    {
        $data = json_decode($this->security->xss_clean($this->input->raw_input_stream), true);
        if(!isset($data['kd_transaksi'])){
            $result = $this->TransaksiModel->insert($data);
            if($result){
                $message = $this->TransaksiModel->select();
                echo json_encode($message);
            }
        }else{
            $result = $this->TransaksiModel->update($data);
            if($result){
                $message = $this->TransaksiModel->select();
                echo json_encode($message);
            }
        }
    }
    function ubah()
    {
        $data = $this->input->post();
        $result = $this->TransaksiModel->update($data);
        if($result)
            $this->session->set_flashdata('pesan', 'Transaksi berhasil di diubah, success');
        else
            $this->session->set_flashdata('pesan', 'Transaksi gagal diubah, error');
        redirect('admin/transaksi');
    }
    function hapus()
    {
        $data = $this->input->post();
        $result = $this->TransaksiModel->delete($data);
        if($result)
            $this->session->set_flashdata('pesan', 'Transaksi berhasil dihapus, success');
        else
            $this->session->set_flashdata('pesan', 'Transaksi gagal dihapus, error');
        redirect('admin/transaksi');
    }
}

