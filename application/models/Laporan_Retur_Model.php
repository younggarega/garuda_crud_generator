<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_Retur_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        }
    function getall()
    {
        	$sql = $this->db->query("SELECT tbl_aktivitas.id_aktivitas, tbl_master_suplier.nama_suplier, tbl_kategori_komponen.nama_kategori, tbl_aktivitas.id_komponen, tbl_master_komponen.nama_komponen, tbl_aktivitas.komponen_keluar AS jumlah_unit FROM  `tbl_aktivitas` JOIN tbl_master_suplier ON tbl_aktivitas.id_suplier = tbl_master_suplier.id_suplier JOIN tbl_kategori_komponen ON tbl_aktivitas.jenis_komponen = tbl_kategori_komponen.jenis_komponen JOIN tbl_master_komponen ON tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen WHERE tbl_aktivitas.status =  'R'");
             // $sql = $this->db->get();
    	return $sql->result();
    }
    
    function delete($id){
        $sql = $this->db->query("DELETE FROM tbl_retur_stok WHERE id_transaksi = ".$id." ");
        return $sql;
    }
    function toExcelAll() {
         $getData =    $this->db->query("SELECT tbl_aktivitas.id_aktivitas, tbl_master_suplier.nama_suplier, tbl_kategori_komponen.nama_kategori, tbl_aktivitas.id_komponen, tbl_master_komponen.nama_komponen, tbl_aktivitas.komponen_keluar AS jumlah_unit FROM  `tbl_aktivitas` JOIN tbl_master_suplier ON tbl_aktivitas.id_suplier = tbl_master_suplier.id_suplier JOIN tbl_kategori_komponen ON tbl_aktivitas.jenis_komponen = tbl_kategori_komponen.jenis_komponen JOIN tbl_master_komponen ON tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen WHERE tbl_aktivitas.status =  'R'");
            
            if($getData->num_rows() > 0)
            return $getData->result_array();
            else
            return null;
    }

}
?>