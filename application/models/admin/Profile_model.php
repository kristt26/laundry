<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {
    function select()
    {
        $result = $this->db->get('profile');
        if($result->num_rows()>0)
            return $result->result()[0];
        else
            return $result->result();
    }    
    function insert($data)
    {
        $item = [
            'nama_laundry'=>$data['nama_laundry'],
            'alamat_laundry'=>$data['alamat_laundry'],
            'no_tlp'=>$data['no_tlp']
        ];
        if($data['kd_profile']==''){
            $result = $this->db->insert('profile', $item);
            if($result){
                $message=[
                    'message'=>"Data berhasil di simpan, success",
                    'status'=>$result
                ];
                return $message;
            }else{
                $message=[
                    'message'=>"Data gagal di simpan, error",
                    'status'=>$result
                ];
                return $message;
            }
        }else{
            $this->db->where('kd_profile', $data['kd_profile']);
            $result = $this->db->update('profile', $item);
            if($result){
                $message=[
                    'message'=>"Data berhasil di ubah, success",
                    'status'=>$result
                ];
                return $message;
            }else{
                $message=[
                    'message'=>"Data gagal di ubah, error",
                    'status'=>$result
                ];
                return $message;
            }
        }
    }

}

/* End of file ModelName.php */
