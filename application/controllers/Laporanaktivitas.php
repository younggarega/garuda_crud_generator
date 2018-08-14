<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laporanaktivitas extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('Laporan_Aktivitas_Model');
		$this->load->library('form_validation');
		$this->load->library('pdf');
	}
	public function index()
	{
		$laporanaktivitas = $this->Laporan_Aktivitas_Model->getall();
        
        $data = array('laporanaktivitas_data'=> $laporanaktivitas);

		$this->template->load('template','laporanaktivitas/laporan_aktivitas_list',$data);
	}
	public function getall()
	{
		$data['all']= $this->Laporan_Aktivitas_Model->getall();
		echo json_encode($data['all']);
	}
	public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=LaporanAktivitas.doc");

        $data = array(
            'data' => $this->Laporan_Aktivitas_Model->getall(),
            'start' => 0
        );
        
        $this->load->view('laporanaktivitas/laporan_aktivitas_doc',$data);
    }
    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_laporan_aktivitas.xls";
        $judul = "laporanaktivitas";
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
        xlsWriteLabel($tablehead, $kolomhead++, "ID Aktivitas");
        xlsWriteLabel($tablehead, $kolomhead++, "Jenis Komponen");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Suplier");
        xlsWriteLabel($tablehead, $kolomhead++, "Komponen Keluar");
        xlsWriteLabel($tablehead, $kolomhead++, "Komponen Masuk");
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
        xlsWriteLabel($tablehead, $kolomhead++, "Tanggal Aktivitas");
        xlsWriteLabel($tablehead, $kolomhead++, "Nota Beli");
        xlsWriteLabel($tablehead, $kolomhead++, "Status");
        xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

    //xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

    foreach ($this->Laporan_Aktivitas_Model->getall() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_aktivitas);
        xlsWriteLabel($tablebody, $kolombody++, $data->jenis_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_suplier);
        xlsWriteLabel($tablebody, $kolombody++, $data->komponen_keluar);
        xlsWriteLabel($tablebody, $kolombody++, $data->komponen_masuk);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_produk);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_aktivitas);
        xlsWriteLabel($tablebody, $kolombody++, $data->nota);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);
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
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(25,6,'ID Aktivitas',1,0,'C');
        $pdf->Cell(30,6,'Jenis Komponen',1,0,'C');
        $pdf->Cell(35,6,'Nama Komponen',1,0,'C');
        $pdf->Cell(35,6,'Nama Suplier',1,0,'C');
        $pdf->Cell(35,6,'Komponen Keluar',1,0,'C');
        $pdf->Cell(35,6,'Komponen Masuk',1,0,'C');
        $pdf->Cell(30,6,'Nama Produk',1,0,'C');
        $pdf->Cell(20,6,'Tanggal ',1,0,'C');
        $pdf->Cell(15,6,'Nota',1,0,'C');
        $pdf->Cell(15,6,'Status',1,1,'C');
       
        $pdf->SetFont('Arial','',10);
        $data = $this->Laporan_Aktivitas_Model->getall();
        $no = 1;
        foreach ($data as $row){
            
            $pdf->Cell(10,6, $no++,1,0);
            $pdf->Cell(25,6,$row->id_aktivitas,1,0);
            $pdf->Cell(30,6,$row->jenis_komponen,1,0); 
            $pdf->Cell(35,6,$row->nama_komponen,1,0);
            $pdf->Cell(35,6,$row->nama_suplier,1,0);
            $pdf->Cell(35,6,$row->komponen_keluar,1,0); 
            $pdf->Cell(35,6,$row->komponen_masuk,1,0);
            $pdf->Cell(30,6,$row->nama_produk,1,0);
            $pdf->Cell(20,6,$row->tgl_aktivitas,1,0); 
            $pdf->Cell(15,6,$row->nota,1,0);
            $pdf->Cell(15,6,$row->status,1,1); 
 
            
        }
        $pdf->Output();
    }
}

?>