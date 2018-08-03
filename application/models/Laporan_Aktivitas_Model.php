<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_Aktivitas_Model extends CI_Model
{
    public $table = 'tbl_aktivitas';
    public $id = 'id_aktivitas';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();

        }
    function getall()
    {
        $sql = $this->db->query("SELECT tbl_aktivitas.id_aktivitas,tbl_aktivitas.jenis_komponen,tbl_master_komponen.nama_komponen,tbl_master_suplier.nama_suplier,tbl_aktivitas.komponen_keluar,tbl_aktivitas.komponen_masuk,tbl_produk_rancangan.nama_produk,tbl_aktivitas.tgl_aktivitas,tbl_aktivitas.nota,tbl_aktivitas.status,tbl_aktivitas.keterangan 
                FROM  `tbl_aktivitas` LEFT JOIN tbl_master_komponen ON tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen LEFT JOIN tbl_produk_rancangan ON tbl_aktivitas.id_produk = tbl_produk_rancangan.id_produk LEFT JOIN tbl_master_suplier ON tbl_aktivitas.id_suplier = tbl_master_suplier.id_suplier 
                GROUP BY id_aktivitas");
             //$this->db->join('kategori_barang', 'master_gudang.jenis_produk = kategori_barang.jenis_produk', 'inner');
            
            //$this->db->order_by($this->id, $this->order);
                return $sql->result();//$this->db->get($this->table)->result();

    }
    function get_by_id($id){

        $this->db->join('tbl_master_komponen', 'tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen', 'inner');  
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function total_rows($q = NULL) {
        $this->db->like('id_aktivitas', $q);
    $this->db->or_like('jenis_komponen', $q);
    $this->db->or_like('nama_komponen', $q);
    $this->db->or_like('nama_suplier', $q);
    $this->db->or_like('komponen_keluar', $q);
    $this->db->or_like('komponen_masuk', $q);
    $this->db->or_like('nama_produk', $q);
    $this->db->or_like('tgl_aktivitas', $q);
    $this->db->or_like('nota', $q);
    $this->db->or_like('status', $q);
    $this->db->or_like('keterangan', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_aktivitas', $q);
        $this->db->or_like('jenis_komponen', $q);
        $this->db->or_like('nama_komponen', $q);
        $this->db->or_like('nama_suplier', $q);
        $this->db->or_like('komponen_keluar', $q);
        $this->db->or_like('komponen_masuk', $q);
        $this->db->or_like('nama_produk', $q);
        $this->db->or_like('tgl_aktivitas', $q);
        $this->db->or_like('nota', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('keterangan', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function getexcel(){
        $sql = $this->db->query("SELECT tbl_aktivitas.id_aktivitas,tbl_aktivitas.jenis_komponen,tbl_master_komponen.nama_komponen,tbl_master_suplier.nama_suplier,tbl_aktivitas.komponen_keluar,tbl_aktivitas.komponen_masuk,tbl_produk_rancangan.nama_produk,tbl_aktivitas.tgl_aktivitas,tbl_aktivitas.nota,tbl_aktivitas.status,tbl_aktivitas.keterangan 
        FROM  `tbl_aktivitas` LEFT JOIN tbl_master_komponen ON tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen LEFT JOIN tbl_produk_rancangan ON tbl_aktivitas.id_produk = tbl_produk_rancangan.id_produk LEFT JOIN tbl_master_suplier ON tbl_aktivitas.id_suplier = tbl_master_suplier.id_suplier 
        GROUP BY id_aktivitas");
        
        if($sql->num_rows() > 0)
            return $sql->result_array();
            else
            return null;
    }
    }
?>