<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporan_Stok_Model extends CI_Model
{
    public $table = 'tbl_master_komponen';
    public $id = 'id_komponen';
    public $order = 'DESC';
    function __construct()
    {
        parent::__construct();

        }
    function getall()
    {
        $sql = $this->db->query("SELECT tbl_master_komponen.id_komponen,tbl_master_komponen.nama_komponen,tbl_kategori_komponen.nama_kategori, SUM( komponen_masuk ) - SUM( komponen_keluar ) AS jumlah_komponen
                FROM  `tbl_master_komponen` LEFT JOIN tbl_aktivitas ON tbl_master_komponen.id_komponen = tbl_aktivitas.id_komponen LEFT JOIN tbl_kategori_komponen ON tbl_master_komponen.jenis_komponen = tbl_kategori_komponen.jenis_komponen 
                GROUP BY id_komponen");
             //$this->db->join('kategori_barang', 'master_gudang.jenis_produk = kategori_barang.jenis_produk', 'inner');
            
            //$this->db->order_by($this->id, $this->order);
                return $sql->result();//$this->db->get($this->table)->result();

    }
    function get_by_id($id){

        $this->db->join('tbl_kategori_komponen', 'tbl_master_komponen.jenis_komponen = tbl_kategori_komponen.jenis_komponen', 'inner');  
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    function total_rows($q = NULL) {
        $this->db->like('nama_kategori', $q);
    $this->db->or_like('id_komponen', $q);
    $this->db->or_like('nama_komponen', $q);
    $this->db->or_like('jumlah_komponen', $q);
    $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('nama_kategori', $q);
        $this->db->or_like('id_komponen', $q);
        $this->db->or_like('nama_komponen', $q);
        $this->db->or_like('jumlah_komponen', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
    function getexcel(){
        $sql = $this->db->query("SELECT tbl_master_komponen.id_komponen,tbl_master_komponen.nama_komponen,tbl_kategori_komponen.nama_kategori, SUM( komponen_masuk ) - SUM( komponen_keluar ) AS jumlah_komponen
                FROM  `tbl_master_komponen` LEFT JOIN tbl_aktivitas ON tbl_master_komponen.id_komponen = tbl_aktivitas.id_komponen LEFT JOIN tbl_kategori_komponen ON tbl_master_komponen.jenis_komponen = tbl_kategori_komponen.jenis_komponen
                GROUP BY id_komponen");
        
        if($sql->num_rows() > 0)
            return $sql->result_array();
            else
            return null;
    }
    }
?>