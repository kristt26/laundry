<?php

class Pemesanan_model extends CI_Model {
    function select()
    {
        $data= ['data'=>array(), 'selesai'=>array()];
        $query = $this->db->query("SELECT
                `pemesanan`.`id`,
                `pemesanan`.`kd_pemesanan`,
                `pemesanan`.`tgl_pemesanan`,
                `pemesanan`.`kd_pelanggan`,
                `pemesanan`.`status`,
                `pelanggan`.`nama`,
                `pelanggan`.`alamat`,
                `pelanggan`.`no_hp`,
                `pelanggan`.`jk`
            FROM
                `pelanggan`
                LEFT JOIN `pemesanan` ON `pemesanan`.`kd_pelanggan` =
                `pelanggan`.`kd_pelanggan`
            WHERE
                status NOT IN ('Selesai', 'Batal') ORDER BY kd_pemesanan DESC");
        $data['data'] = $query->result();
        $query = $this->db->query("SELECT
                `pemesanan`.`id`,
                `pemesanan`.`kd_pemesanan`,
                `pemesanan`.`tgl_pemesanan`,
                `pemesanan`.`kd_pelanggan`,
                `pemesanan`.`status`,
                `pelanggan`.`nama`,
                `pelanggan`.`alamat`,
                `pelanggan`.`no_hp`,
                `pelanggan`.`jk`
            FROM
                `pelanggan`
                LEFT JOIN `pemesanan` ON `pemesanan`.`kd_pelanggan` =
                `pelanggan`.`kd_pelanggan`
            WHERE status  = 'Selesai' ORDER BY kd_pemesanan DESC");
        $data['selesai'] = $query->result();
        $query = $this->db->query("SELECT
                `pemesanan`.`id`,
                `pemesanan`.`kd_pemesanan`,
                `pemesanan`.`tgl_pemesanan`,
                `pemesanan`.`kd_pelanggan`,
                `pemesanan`.`status`,
                `pelanggan`.`nama`,
                `pelanggan`.`alamat`,
                `pelanggan`.`no_hp`,
                `pelanggan`.`jk`
            FROM
                `pelanggan`
                LEFT JOIN `pemesanan` ON `pemesanan`.`kd_pelanggan` =
                `pelanggan`.`kd_pelanggan`
            WHERE status  = 'Batal' ORDER BY kd_pemesanan DESC");
        $data['batal'] = $query->result();
        return $data;
    }
    
    function update($data)
    {
        $item = [
            'status'=>$data['status']
        ];
        $this->db->where('kd_pemesanan', $data['kd_pemesanan']);
        if($this->db->update('pemesanan', $item))
            return true;
        else
            return false;
    }
    function delete($kd_pemesanan)
    {
        $item = [
            'status'=>'Batal'
        ];
        $this->db->where('kd_pemesanan', $data['kd_pemesanan']);
        if($this->db->update('pemesanan', $item))
            return true;
        else
            return false;
    }    
}