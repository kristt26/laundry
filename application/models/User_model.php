<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    function select($data)
    {
        $item = array('username'=>$data['username'], 'password'=>md5($data['password']));
        $result = $this->db->get_where('user', $item);
        if($result->num_rows()>0){
            $user = $result->result()[0];
            if($user->jenis=="Admin"){
                $datauser = $this->db->get_where('pegawai', array('iduser'=>$user->iduser))->result_array()[0];
                $datauser['jenis'] = $user->jenis;
                return $datauser;
            }else{
                $datauser = $this->db->get_where('pelanggan', array('iduser'=>$user->iduser))->result_array()[0];
                $datauser['jenis'] = $user->jenis;
                return $datauser;
            }
        }else
            return $result->result();
    }    
}

