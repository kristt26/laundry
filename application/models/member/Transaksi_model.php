<?php

class Transaksi_model extends CI_Model {
    function select()
    {
        $kd_pelanggan = $this->session->userdata('kd_pelanggan');
        $data= ['data'=>array(), 'selesai'=>array()];
        $query = $this->db->query("SELECT
            *
        FROM
            `transaksi`
            LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan`
            LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` =
            `pemesanan`.`kd_pelanggan`
        WHERE pelanggan.kd_pelanggan='$kd_pelanggan'");
        return $query->result();
    }
}