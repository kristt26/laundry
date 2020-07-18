<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Jenis_model', 'JenisModel');
    }

    public function index()
    {
        $title['title'] = ['header'=>'Pegawai', 'dash'=>'Pegawai'];
        $data['data'] = $this->JenisModel->select();
        $this->load->view('admin/template/header', $title);
        $this->load->view('admin/jenis', $data);
        $this->load->view('admin/template/footer');
    }

    function simpan()
    {
        $data = $this->input->post();
        if($data['idjenispakaian']==""){
            $result = $this->JenisModel->insert($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal di simpan, error');
            redirect('admin/jenis');
        }else{
            $data = $this->input->post();
            $result = $this->JenisModel->update($data);
            if($result)
                $this->session->set_flashdata('pesan', 'Data berhasil di simpan, success');
            else
                $this->session->set_flashdata('pesan', 'Data gagal di simpan, error');
            redirect('admin/jenis');
        }
    }
    function ubah()
    {
        
    }
    function hapus($kd_pegawai)
    {
        if($this->JenisModel->delete($kd_pegawai))
            $this->session->set_flashdata('pesan', 'Data berhasil di hapus, success');
        else
            $this->session->set_flashdata('pesan', 'Data gagal di hapus, error');
        redirect('admin/pegawai');
    }
}

/* End of file Controllername.php */
