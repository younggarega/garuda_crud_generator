<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporanupdatestok extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Laporan_Update_Model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}
	public function index()
	{
		$laporan_update = $this->Laporan_Update_Model->getall();
        
        $data = array('laporan_update_data'=> $laporan_update);

		$this->template->load('template','laporanupdatestok/laporan_update_list',$data);
	}
	public function getall()
	{
		$data['all']= $this->Laporan_Update_Model->getall();
		echo json_encode($data['all']);
	}
	public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=LaporanStok.doc");

        $data = array(
            'data' => $this->Laporan_Update_Model->getall(),
            'start' => 0
        );
        
        $this->load->view('laporanupdatestok/laporan_update_doc',$data);
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_laporan_update_stok.xls";
        $judul = "Laporan Update";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;

        xlsWriteLabel($tablehead, $kolomhead++, "ID Aktivitas");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Suplier");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
    xlsWriteLabel($tablehead, $kolomhead++, "Nota Beli");
    xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
    //xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

    foreach ($this->Laporan_Update_Model->getall() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteLabel($tablebody, $kolombody++, $data->id_aktivitas);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_suplier);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->jml_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
        xlsWriteLabel($tablebody, $kolombody++, $data->nota_beli);
        xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
        //xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

     public function pdf(){
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'Laporan Stok',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        //$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'ID Aktivitas',1,0,'C');
        $pdf->Cell(25,6,'Nama Suplier',1,0,'C');
        $pdf->Cell(35,6,'Nama Kategori',1,0,'C');
        $pdf->Cell(30,6,'Nama Komponen',1,0,'C');
        $pdf->Cell(35,6,'Jumlah Komponen',1,0,'C');
        $pdf->Cell(35,6,'Tanggal',1,0,'C');
        $pdf->Cell(35,6,'Nota Beli',1,0,'C');
        $pdf->Cell(30,6,'Keterangan',1,1,'C');
       
        $pdf->SetFont('Arial','',10);
        $data = $this->Laporan_Update_Model->getall();
        $no = 1;
        foreach ($data as $row){
            
            $pdf->Cell(20,6,$row->id_aktivitas,1,0);
            $pdf->Cell(25,6,$row->nama_suplier,1,0); 
            $pdf->Cell(35,6,$row->nama_kategori,1,0); 
            $pdf->Cell(30,6,$row->nama_komponen,1,0);
            $pdf->Cell(35,6,$row->jml_komponen,1,0);
            $pdf->Cell(35,6,$row->tanggal,1,0); 
            $pdf->Cell(35,6,$row->nota_beli,1,0); 
            $pdf->Cell(30,6,$row->keterangan,1,1);
 
            
        }
        $pdf->Output();
    }
}

?>