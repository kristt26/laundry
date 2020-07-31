<?php

class Pemesanan_model extends CI_Model
{
    public function select()
    {
        $kd_pelanggan = $this->session->userdata('kd_pelanggan');
        $data = ['data' => array(), 'selesai' => array()];
        $query = $this->db->query("SELECT * FROM pemesanan WHERE kd_pelanggan='$kd_pelanggan' AND status NOT IN ('Selesai', 'Batal') ORDER BY kd_pemesanan DESC");
        $data['data'] = $query->result();
        foreach ($data['data'] as $key => $value) {
            $result = $this->db->query("SELECT
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`,
                `detailpemesanan`.`pemesanan_id`,
                `detailpemesanan`.`idjenispakaian` AS `idjenispakaian1`,
                `detailpemesanan`.`jumlah`
            FROM
                `jenispakaian`
                RIGHT JOIN `detailpemesanan` ON `jenispakaian`.`idjenispakaian` =
                `detailpemesanan`.`idjenispakaian`
            WHERE `detailpemesanan`.`pemesanan_id` = $value->id");
            $value->detail = $result->result();
        }
        $query = $this->db->query("SELECT * FROM pemesanan WHERE kd_pelanggan='$kd_pelanggan' AND status  = 'Selesai' ORDER BY kd_pemesanan DESC");
        $data['selesai'] = $query->result();
        foreach ($data['selesai'] as $key => $value) {
            $result = $this->db->query("SELECT
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`,
                `detailpemesanan`.`pemesanan_id`,
                `detailpemesanan`.`idjenispakaian` AS `idjenispakaian1`,
                `detailpemesanan`.`jumlah`
            FROM
                `jenispakaian`
                RIGHT JOIN `detailpemesanan` ON `jenispakaian`.`idjenispakaian` =
                `detailpemesanan`.`idjenispakaian`
            WHERE `detailpemesanan`.`pemesanan_id` = $value->id");
            $value->detail = $result->result();
        }
        $query = $this->db->query("SELECT * FROM pemesanan WHERE kd_pelanggan='$kd_pelanggan' AND status  = 'Batal' ORDER BY kd_pemesanan DESC");
        $data['batal'] = $query->result();
        foreach ($data['batal'] as $key => $value) {
            $result = $this->db->query("SELECT
                `jenispakaian`.`jenis`,
                `jenispakaian`.`harga`,
                `jenispakaian`.`statusbiaya`,
                `detailpemesanan`.`pemesanan_id`,
                `detailpemesanan`.`idjenispakaian` AS `idjenispakaian1`,
                `detailpemesanan`.`jumlah`
            FROM
                `jenispakaian`
                RIGHT JOIN `detailpemesanan` ON `jenispakaian`.`idjenispakaian` =
                `detailpemesanan`.`idjenispakaian`
            WHERE `detailpemesanan`.`pemesanan_id` = $value->id");
            $value->detail = $result->result();
        }
        return $data;
    }
    public function getkd()
    {
        $query = $this->db->query("SELECT * FROM pemesanan ORDER BY kd_pemesanan DESC LIMIT 1");
        $result = $query->result_array();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return null;
        }

    }
    public function insert($data)
    {
        $this->db->trans_begin();
        $kode = $this->getkd()[0];
        $session = $_SESSION;
        $item = [
            'tgl_pemesanan' => date('Y-m-d'),
            'kd_pelanggan' => $this->session->userdata('kd_pelanggan'),
            'status' => 'Boking',
        ];
        if (is_null($kode)) {
            $item['kd_pemesanan'] = 'LNY-00001';
        } else {
            $arraykode = explode('-', $kode['kd_pemesanan']);
            $num = strlen(((int) $arraykode[1]) + 1);
            if ($num == 1) {
                $item['kd_pemesanan'] = 'LNY-' . '0000' . (((int) $arraykode[1]) + 1);
            } else if ($num == 2) {
                $item['kd_pemesanan'] = 'LNY-' . '000' . (((int) $arraykode[1]) + 1);
            } else if ($num == 3) {
                $item['kd_pemesanan'] = 'LNY-' . '00' . (((int) $arraykode[1]) + 1);
            } else if ($num == 4) {
                $item['kd_pemesanan'] = 'LNY-' . '0' . (((int) $arraykode[1]) + 1);
            } else if ($num == 5) {
                $item['kd_pemesanan'] = 'LNY-' . (((int) $arraykode[1]) + 1);
            }
        }
        $this->db->insert('pemesanan', $item);
        $idpesanan = $this->db->insert_id();
        foreach ($data as $key => $value) {
            $item = [
                'pemesanan_id' => $idpesanan,
                'idjenispakaian' => $value['idjenispakaian'],
                'jumlah' => $value['jumlah'],
            ];
            $this->db->insert('detailpemesanan', $item);
        }
        if($this->db->trans_status()==true){
            $this->db->trans_commit();
            return true;
        }else{
            $this->db->trans_rollback();
            return false;
        }
    }
    public function update($data)
    {
        $item = [
            'status' => $data['status'],
        ];
        $this->db->where('kd_pemesanan', $data['kd_pemesanan']);
        if ($this->db->update('pemesanan', $item)) {
            return true;
        } else {
            return false;
        }

    }
    public function delete($kd_pemesanan)
    {
        $item = [
            'status' => 'Batal',
        ];
        $this->db->where('kd_pemesanan', $kd_pemesanan);
        if ($this->db->update('pemesanan', $item)) {
            return true;
        } else {
            return false;
        }

    }
}
