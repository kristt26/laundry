<?php

class Pegawai_model extends CI_Model {
    function select()
    {
        $result = $this->db->get('pegawai');
        if($result->num_rows()>0)
            return $result->result();
        else
            return $result->result();
    }
    function insert($data)
    {
        $item = [
            'nama_pegawai'=>$data['nama_pegawai'],
            'bagian'=>$data['bagian']
        ];
        if($this->db->insert('pegawai', $item))
            return true;
        else
            return false;
    }
    function update($data)
    {
        $item = [
            'nama_pegawai'=>$data['nama_pegawai'],
            'bagian'=>$data['bagian']
        ];
        $this->db->where('kd_pegawai', $data['kd_pegawai']);
        if($this->db->update('pegawai', $item))
            return true;
        else
            return false;
    }
    function delete($kd_pegawai)
    {
        $this->db->where('kd_pegawai', $kd_pegawai);
        if($this->db->delete('pegawai'))
            return true;
        else
            return false;
    }    
}

/* End of file ModelName.php */
