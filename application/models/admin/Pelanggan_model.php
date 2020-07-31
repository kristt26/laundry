<?php

class Pelanggan_model extends CI_Model {
    function select()
    {
        $result = $this->db->get('pelanggan');
        if($result->num_rows()>0)
            return $result->result();
        else
            return $result->result();
    }
    function insert($data)
    {
        $user= [
            'username'=>$data['username'],
            'password'=>md5($data['password']),
            'jenis' => 'Member'
        ];
        $item = [
            'nama'=>$data['nama'],
            'alamat'=>$data['alamat'],
            'no_hp'=>$data['no_hp'],
            'jk'=>$data['jk']
        ];
        $this->db->trans_begin();
        $this->db->insert('user', $user);
        $item['iduser'] = $this->db->insert_id();
        $this->db->insert('pelanggan', $item);

        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
            
    }
    function update($data)
    {
        $item = [
            'nama'=>$data['nama'],
            'alamat'=>$data['alamat'],
            'no_hp'=>$data['no_hp'],
            'jk'=>$data['jk']
        ];
        $this->db->where('kd_pelanggan', $data['kd_pelanggan']);
        if($this->db->update('pelanggan', $item))
            return true;
        else
            return false;
    }
    function delete($kd_pelanggan)
    {
        $this->db->where('kd_pelanggan', $kd_pelanggan);
        if($this->db->delete('pelanggan'))
            return true;
        else
            return false;
    }    
}

/* End of file ModelName.php */
