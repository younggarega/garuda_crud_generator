<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aktivitas_Model extends CI_Model
{

    public $table = 'tbl_aktivitas';
    public $id 	  = 'id_komponen';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    // function json() {
    //     $this->datatables->select('id_komponen,jenis_komponen,jml_komponen,id_suplier,keterangan');
    //     $this->datatables->from('tbl_stok');
    //     //$this->datatables->add_column('is_aktif', '$1', 'rename_string_is_aktif(is_aktif)');
    //     //add this line for join
    //     //$this->datatables->join('table2', 'tbl_menu.field = table2.field');
    //     //$this->datatables->join('tbl_master_komponen', 'tbl_stok.id_komponen stokkomp = tbl_master_komponen.id_komponen masterkomp');
    //     $this->datatables->add_column('action',anchor(site_url('updatestock/update/$1'),'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm'))." 
    //             ".anchor(site_url('updatestock/delete/$1'),'<i class="fa fa-trash-o" aria-hidden="true"></i>','class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_komponen');
    //     return $this->datatables->generate();
    // }
    
    function get_suplier(){
    	$query = $this->db->get('tbl_master_suplier');
    	return $query->result();
    }
    
    // get all
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
        $this->db->like('id_komponen', $q);
	$this->db->or_like('jenis_komponen', $q);
	$this->db->or_like('jml_komponen', $q);
	$this->db->or_like('id_suplier', $q);
    $this->db->or_like('nota', $q);
    $this->db->or_like('tgl_aktivitas', $q);
	$this->db->or_like('keterangan', $q);	
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_komponen', $q);
	$this->db->or_like('jenis_komponen', $q);
	$this->db->or_like('jml_komponen', $q);
	$this->db->or_like('id_suplier', $q);
    $this->db->or_like('nota', $q);
    $this->db->or_like('tgl_aktivitas', $q);
	$this->db->or_like('keterangan', $q);
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

    //fungsi suplier
    function getsuplier($id='')
    {
        if($id)
            {
                $this->db->where('id_suplier',$id);
            }      
             $sql= $this->db->get("tbl_master_suplier");
        return $sql->result();
    }

    //fungsi nama komponen / kategori
    function getkomponen(){
        $sql = $this->db->get("tbl_kategori_komponen");
        return $sql->result();
    }

    function detailkomponen($id='')
           {
              if($id){
                  $this->db->where('jenis_komponen',$id);
              }
              $sql = $this->db->get('tbl_master_komponen');
              return $sql->result();
           }

    function getproduk(){
        $sql = $this->db->query("SELECT DISTINCT tbl_produk_rancangan.id_produk, tbl_produk_rancangan.nama_produk FROM  `tbl_produk_rancangan` ");
        return $sql->result();
    }

    function detailproduk($id='')
           {
              if($id){
                  $this->db->where('id_produk',$id);
              }
              $sql = $this->db->query("SELECT tbl_produk_rancangan.nama_produk,tbl_produk_rancangan.id_komponen,tbl_master_komponen.nama_komponen,tbl_produk_rancangan.jml_komponen FROM  `tbl_produk_rancangan` JOIN tbl_master_komponen ON tbl_master_komponen.id_komponen = tbl_produk_rancangan.id_komponen ");
              return $sql->result();
           }

     function insertstok($jenis_komponen,$id_komponen,$jml_komponen,$id_suplier,$nota_beli,$tgl_aktivitas){
      
      $sql = $this->db->query("INSERT INTO `tbl_aktivitas`( 
        `jenis_komponen`,
        `id_komponen`,
        `id_suplier`,
        `komponen_keluar`,
        `komponen_masuk`,
        `tgl_aktivitas`,
        `nota`,
        `status`,
        `keterangan`) 
        VALUES (
        '".$jenis_komponen."',
        '".$id_komponen."',        
        '".$id_suplier."',
        '".'0'."',
        '".$jml_komponen."',
        '".$tgl_aktivitas."',
        '".$nota_beli."',
        '".'T'."',
        '".$tgl_aktivitas."')");

      $sql = $this->db->query("INSERT INTO `tbl_stok`( 
        `id_komponen`,
        `jenis_komponen`,
        `jml_komponen`,
        `id_suplier`,
        `tanggal`,
        `nota_beli`)
        VALUES('".$id_komponen."' ,
        '".$jenis_komponen."' ,
        '".$jml_komponen."' ,
        '".$id_suplier."',
        '".$tgl_aktivitas."',
        '".$nota_beli."')");
             

      return $sql;

    } 

}//END

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */