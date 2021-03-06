<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporanstok extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Laporan_Stok_Model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}
	public function index()
	{
		$laporan_stok = $this->Laporan_Stok_Model->getall();
        
        $data = array('laporan_stok_data'=> $laporan_stok);

		$this->template->load('template','laporanstok/laporan_stok_list',$data);
	}
	public function getall()
	{
		$data['all']= $this->Laporan_Stok_Model->getall();
		echo json_encode($data['all']);
	}
	public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=LaporanStok.doc");

        $data = array(
            'data' => $this->Laporan_Stok_Model->getall(),
            'start' => 0
        );
        
        $this->load->view('laporanstok/laporan_stok_doc',$data);
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_laporan_stok.xls";
        $judul = "laporanstok";
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
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
    xlsWriteLabel($tablehead, $kolomhead++, "ID Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Komponen");
    //xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

    foreach ($this->Laporan_Stok_Model->getall() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_kategori);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->jml_komponen);
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
        $pdf->Cell(25,6,'No',1,0,'C');
        $pdf->Cell(35,6,'Kategori',1,0,'C');
        $pdf->Cell(35,6,'Id Komponen',1,0,'C');
        $pdf->Cell(35,6,'Nama Komponen',1,0,'C');
        $pdf->Cell(30,6,'Jumlah Komponen',1,1,'C');
       
        $pdf->SetFont('Arial','',10);
        $data = $this->Laporan_Stok_Model->getall();
        $no = 1;
        foreach ($data as $row){
            
            $pdf->Cell(25,6, $no++,1,0);
            $pdf->Cell(35,6,$row->nama_kategori,1,0);
            $pdf->Cell(35,6,$row->id_komponen,1,0); 
            $pdf->Cell(35,6,$row->nama_komponen,1,0); 
            $pdf->Cell(30,6,$row->jml_komponen,1,1);
 
            
        }
        $pdf->Output();
    }
}

?>