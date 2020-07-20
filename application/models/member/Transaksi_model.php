<?php

class Transaksi_model extends CI_Model {
    function select()
    {
        $kd_pelanggan = $this->session->userdata('kd_pelanggan');
        $query = $this->db->query("SELECT
            `pemesanan`.`kd_pemesanan`,
            `pemesanan`.`tgl_pemesanan`,
            `pemesanan`.`kd_pelanggan`,
            `pemesanan`.`status`,
            `transaksi`.`id_pemesanan`,
            `transaksi`.`kd_transaksi`,
            `transaksi`.`kd_pegawai`,
            `transaksi`.`tgl_ambil`,
            `transaksi`.`total`,
            `pelanggan`.`nama`,
            `pelanggan`.`kd_pelanggan` AS `kd_pelanggan1`,
            `pelanggan`.`alamat`,
            `pelanggan`.`no_hp`,
            `pelanggan`.`jk`,
            `pelanggan`.`iduser`
        FROM
            `transaksi`
            LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan`
            LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` =
            `pemesanan`.`kd_pelanggan`
        WHERE `pemesanan`.`kd_pelanggan` = $kd_pelanggan");
        $transaksi = $query->result();
        foreach ($transaksi as $key => $value) {
            $detail = $this->db->query("SELECT
                `detail`.*,
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`
            FROM
                `detail`
                LEFT JOIN `jenispakaian` ON `jenispakaian`.`idjenispakaian` =
                `detail`.`idjenispakaian` WHERE kd_transaksi = $value->kd_transaksi");
            $value->detail = $detail->result();
        }
        return $transaksi;
        // $kd_pelanggan = $this->session->userdata('kd_pelanggan');
        // $data= ['data'=>array(), 'selesai'=>array()];
        // $query = $this->db->query("SELECT
        //     *
        // FROM
        //     `transaksi`
        //     LEFT JOIN `pemesanan` ON `pemesanan`.`id` = `transaksi`.`id_pemesanan`
        //     LEFT JOIN `pelanggan` ON `pelanggan`.`kd_pelanggan` =
        //     `pemesanan`.`kd_pelanggan`
        // WHERE pelanggan.kd_pelanggan='$kd_pelanggan'");
        // return $query->result();
    }
}