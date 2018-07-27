<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporanretur extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_Retur_Model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
        // $this->load->library('session');
    }

    public function index()
    {
        
        $this->template->load('template','laporanretur/laporan_retur'); 
        // $data=$this->Master_stok_model->getall(); 
       
        // echo json_encode($data); 
    }

    public function getall(){
        $data['all']=$this->Laporan_Retur_Model->getall();
        echo json_encode($data['all']);
    }

    public function delete(){
        $id= $this->input->post('id');
        $data = $this->Laporan_Retur_Model->delete($id);
     
        echo json_encode($data);
    }
    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=TabelRetur.doc");

        $data = array(
            'data' => $this->Laporan_Retur_Model->getall(),
            'start' => 0
        );
        
        $this->load->view('laporanretur/laporan_retur_doc',$data);
    }

     public function pdf(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Data Retur',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        //$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(25,6,'Id Aktivitas',1,0,'C');
        $pdf->Cell(35,6,'Nama Suplier',1,0,'C');
        $pdf->Cell(35,6,'Nama Kategori',1,0,'C');
        $pdf->Cell(35,6,'Id Komponen',1,0,'C');
        $pdf->Cell(35,6,'Nama Komponen',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Komponen',1,1,'C');

       
        $pdf->SetFont('Arial','',10);
        $data = $this->Laporan_Retur_Model->getall();
        foreach ($data as $row){
            
            $pdf->Cell(25,6,$row->id_transaksi,1,0);
            $pdf->Cell(35,6,$row->nama_suplier,1,0);
            $pdf->Cell(35,6,$row->nama_kategori,1,0); 
            $pdf->Cell(35,6,$row->id_komponen,1,0); 
            $pdf->Cell(35,6,$row->nama_komoponen,1,0); 
            $pdf->Cell(30,6,$row->jumlah_komponen,1,1);

        }
        $pdf->Output();
    }
        public function excel()
        {
        $query['data1'] = $this->Laporan_Retur_Model->ToExcelAll(); 
        $this->load->view('laporanretur/laporan_retur_excel',$query);
    }
  //   public function read($id) 
  //   {
  //       $row = $this->masterstok_model->getall($id);
  //       if ($row) {
  //           $data = array(
		// 'id_barang' => $row->id_barang,
		// 'jenis_produk' => $row->jenis_produk,
		// 'jumlah_unit' => $row->jumlah_unit,
		// 'harga_beli' => $row->harga_beli,
		// 'id_suplier' => $row->id_suplier,
		// 'tanggal' => $row->tanggal,
		// 'no_invoice' => $row->no_invoice,
		// 'nota_beli' => $row->nota_beli,
		// 'keterangan' => $row->keterangan,
	 //    );
  //           $this->template->load('template','stok_read', $data);
  //       } else {
  //           $this->session->set_flashdata('message', 'Record Not Found');
  //           redirect(site_url('stok'));
  //       }
  //   }
 }