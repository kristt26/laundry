<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pelanggan_model', 'PelangganModel');
    }

    public function index()
    {
        $title['title'] = ['header'=>'Pelanggan', 'dash'=>'Pelanggan'];
        $data['data'] = $this->PelangganModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('admin/template/footer');
    }

    function simpan()
    {
        $data = $this->input->post();
        if($data['kd_pelanggan']==""){
            $result = $this->PelangganModel->insert($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal disimpan, error');
            redirect('admin/pelanggan');
        }else{
            $data = $this->input->post();
            $result = $this->PelangganModel->update($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil diubah, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal diubah, error');
            redirect('admin/pelanggan');
        }
    }
    
    function hapus($kd_pelanggan)
    {
        if($this->PelangganModel->delete($kd_pelanggan))
            $this->session->set_flashdata('pesan', 'Data berhasil dihapus, success');
        else
            $this->session->set_flashdata('pesan', 'Data gagal dihapus, error');
        redirect('admin/pelanggan');
    }
}

/* End of file Controllername.php */
