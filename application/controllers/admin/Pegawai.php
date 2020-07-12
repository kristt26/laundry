<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Pegawai_model', 'PegawaiModel');
    }

    public function index()
    {
        $title['title'] = ['header'=>'Pegawai', 'dash'=>'Pegawai'];
        $data['data'] = $this->PegawaiModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/pegawai', $data);
        $this->load->view('admin/template/footer');
    }

    function simpan()
    {
        $data = $this->input->post();
        if($data['kd_pegawai']==""){
            $result = $this->PegawaiModel->insert($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal di simpan, error');
            redirect('admin/pegawai');
        }else{
            $data = $this->input->post();
            $result = $this->PegawaiModel->update($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal di simpan, error');
            redirect('admin/pegawai');
        }
    }
    function ubah()
    {
        
    }
    function hapus($kd_pegawai)
    {
        if($this->PegawaiModel->delete($kd_pegawai))
            $this->session->set_flashdata('pesan', 'Data berhasil di hapus, success');
        else
            $this->session->set_flashdata('pesan', 'Data gagal di hapus, error');
        redirect('admin/pegawai');
    }
}

/* End of file Controllername.php */
