<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aktivitas_Model extends CI_Model
{

    public $table = 'tbl_aktivitas';
    public $id = 'id_suplier';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    //function get_all(){
      //  $this->db->join('tbl_kategori_komponen','tbl_aktivitas.jenis_komponen = tbl_kategori_komponen.jenis_komponen','left');
        //$this->db->join('tbl_master_komponen','tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen','left');
        //$this->db->join('tbl_produk_rancangan','tbl_aktivitas.id_produk = tbl_produk_rancangan.id_produk','left');
         //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result();

        //$sql = $this->db->query("SELECT tbl_aktivitas.id_aktivitas, tbl_kategori_komponen.jenis_komponen, tbl_master_komponen.id_komponenen, tbl_aktivitas.komponen_keluar, tbl_aktivitas.komponen_masuk, tbl_produk_rancangan.id_produk, tbl_aktivitas.tgl_aktivitas, tbl_aktivitas.status, tbl_ aktivitas.keterangan FROM 'tbl_aktivitas' WHERE JOIN tbl_kategori_komponen ON tbl_aktivitas.jenis_komponen = tbl_kategori_komponen.jenis_komponen JOIN tbl_master_komponen ON tbl_aktivitas.id_komponen = tbl_master_komponen.id_komponen JOIN tbl_produk_rancangan ON tbl_aktivitas.id_produk = tbl_produk_rancangan.id_produk");
       // return $sql->result();
   // }
    function get_aktivitas(){
        $query = $this->db->get('tbl_aktivitas');
    	return $query->result();
    }

    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_suplier', $q);
	$this->db->or_like('jenis_komponen', $q);
	$this->db->or_like('id_komponen', $q);

	$this->db->or_like('komponen_keluar', $q);
	$this->db->or_like('komponen_masuk', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('tgl_aktivitas', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_suplier', $q);
	$this->db->or_like('jenis_komponen', $q);
	$this->db->or_like('id_komponen', $q);

	$this->db->or_like('komponen_keluar', $q);
	$this->db->or_like('komponen_masuk', $q);
	$this->db->or_like('id_produk', $q);
	$this->db->or_like('tgl_aktivitas', $q);
	$this->db->or_like('status', $q);
	$this->db->or_like('keterangan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function getsuplier($id=''){
        if($id)
            {
                $this->db->where('id_suplier',$id);
            }      
             $sql= $this->db->get("tbl_master_suplier");
        return $sql->result();
    }
    function getjeniskomponen(){
        $sql = $this->db->get("jenis_komponen");
        return $sql->result();
    }
   function detailkomponen($id='')
   {
      if($id){
          $this->db->where('id_komponen',$id);
      }
      $sql = $this->db->get('tbl_master_komponen');
      return $sql->result();
    }
    function detailproduk($id='')
      {
         if($id){
             $this->db->where('id_produk',$id);
         }
         $sql = $this->db->get('tbl_produk_rancangan');
         return $sql->result();
   }
  
   function insertaktivitas($id_suplier,$jenis_komponen,$id_komponen,$komponen_keluar,$komponen_masuk,$id_produk,$tgl_aktivitas,$status,$keterangan){
      
    $sql = $this->db->query("INSERT INTO `tbl_aktivitas`( `id_suplier`, `jenis_komponen`, `id_komponen`, `komponen_keluar`, `komponen_masuk`,'id_produk', 'tgl_aktivitas', 'status', 'keterangan') VALUES('".$id_komponen."' ,NOW(),'".$jenis_komponen."' ,'".$id_komponen."' ,'".$komponen_keluar."','".$komponen_masuk."','".$id_produk."','".$tgl_aktivitas."','".$status."','".$keterangan."','U')"); 


   $sql =$this->db->query("INSERT INTO `tbl_aktivitas`( 
      `id_suplier`,
      `jenis_komponen`,
      `id_komponen`,
      `komponen_keluar`,
      `komponen_masuk`,
      'id_produk',
      'tgl_aktivitas',
      'status',
      'keterangan') 
      VALUES (
      '".$id_suplier."',
      '".$jenis_komponen."',
      '".$id_komponen."',
      '".$komponen_keluar."',
      '".$komponen_masuk."',
      '".$id_produk."',
      '".$tgl_aktivitas."',
      '".$status."',
      '".$keterangan."')") ;
    
  
        return $sql;
    }
}
