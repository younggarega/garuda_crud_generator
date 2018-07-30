<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Aktivitas extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Aktivitas_Model');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        $aktivitas = $this->Aktivitas_Model->get_all();

        $data = array(
            'aktivitas_data' => $aktivitas
        );

        $this->template->load('template','aktivitas/aktivitas_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Aktivitas_Model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_aktivitas' => $row->id_aktivitas,
		'jenis_komponen' => $row->jenis_komponen,
		'id_komponen' => $row->id_komponen,
		'komponen_keluar' =>$row->komponen_keluar,
		'Komponen_masuk' => $row->komponen_masuk,
        'id_produk' => $row->id_produk,
		'tgl_aktivitas' => $row->tgl_aktivitas,
		'status' => $row->status,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','aktivitas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('aktivitas/create_action'),
	    'id_aktivitas' => set_value('id_aktivitas'),
	    'jenis_komponen' => set_value('jenis_komponen'),
	    'id_komponen' => set_value('id_komponen'),
	    'komponen_keluar' => set_value('komponen_keluar'),
	    'komponen_masuk' => set_value('komponen_masuk'),
	    'id_produk' => set_value('id_produk'),
	    'tgl_aktivitas' => set_value('tgl_aktivitas'),
	    'status' => set_value('status'),
	    'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','aktivitas_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'id_aktivitas' => $this->input->post('id_aktivitas',TRUE),
		'jenis_komponen' => $this->input->post('jenis_komponen',TRUE),
		
		'id_komponen' => $this->input->post('id_komponen',TRUE),
		'komponen_keluar' => $this->input->post('komponen_keluar',TRUE),
		'komponen_masuk' => $this->input->post('komponen_masuk',TRUE),
		'id_produk' => $this->input->post('id_produk',TRUE),
		'tgl_aktivitas' => $this->input->post('tgl_aktivitas',TRUE),
        'status' => $this->input->post('status',TRUE),
        'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Aktivitas_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Aktivitas_Model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi/update_action'),
		'id_aktivitas' => set_value('id_aktivitas', $row->id_aktivitas),
		'jenis_komponen' => set_value('jenins_komponen', $row->jenis_komponen),
		'id_komponen' => set_value('id_komponen', $row->id_komponen),
		
		'komponen_keluar' => set_value('komponen_keluar', $row->komponen_keluar),
		'komponen_masuk' => set_value('komponen_masuk', $row->komponen_masuk),
		'id_produk' => set_value('id_produk', $row->id_produk),
		'tgl_aktivitas' => set_value('tgl_aktivitas', $row->tgl_aktivitas),
		'status' => set_value('status', $row->status),
		'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','transaksi_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaksi', TRUE));
        } else {
            $data = array(
                'id_aktivitas' => $this->input->post('id_aktivitas',TRUE),
                'jenis_komponen' => $this->input->post('jenis_komponen',TRUE),
                
                'id_komponen' => $this->input->post('id_komponen',TRUE),
                'komponen_keluar' => $this->input->post('komponen_keluar',TRUE),
                'komponen_masuk' => $this->input->post('komponen_masuk',TRUE),
                'id_produk' => $this->input->post('id_produk',TRUE),
                'tgl_aktivitas' => $this->input->post('tgl_aktivitas',TRUE),
                'status' => $this->input->post('status',TRUE),
                'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Aktivitas_Model->update($this->input->post('id_aktivitas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('aktivitas'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('aktivitas'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('aktivitas'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_aktivitas', 'id aktivitas', 'trim|required');
	$this->form_validation->set_rules('jenis_komponen', 'jenis_komponen', 'trim|required');
	$this->form_validation->set_rules('id_komponen', 'id komponen', 'trim|required');
	$this->form_validation->set_rules('komponen_keluar', 'komponen keluar', 'trim|required');
    $this->form_validation->set_rules('komponen_masuk', 'komponen masuk', 'trim|required');
    $this->form_validation->set_rules('id_produk', 'id produk', 'trim|required');
	$this->form_validation->set_rules('tgl_aktivitas', 'tgl aktivitas', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

	$this->form_validation->set_rules('id_aktivitas', 'id_aktivitas', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "aktivitas.xls";
        $judul = "aktivitas";
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

        $kolomhead = 0;-
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Aktivitas");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Komponen Keluar");
    xlsWriteLabel($tablehead, $kolomhead++, "Komponen Masuk");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Produk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tgl Aktivitas");
	xlsWriteLabel($tablehead, $kolomhead++, 'Status');
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");
	//xlsWriteLabel($tablehead, $kolomhead++, "Id Toko");
	//xlsWriteLabel($tablehead, $kolomhead++, "Id Member");

	foreach ($this->Transaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_aktivitas);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_komponen);

        xlsWriteLabel($tablebody, $kolombody++, $data->komponen_keluar);
        xlsWriteLabel($tablebody, $kolombody++, $data->komponen_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_produk);
        xlsWriteLabel($tablebody, $kolombody++, $data->tgl_aktivitas);
        xlsWriteLabel($tablebody, $kolombody++, $data->status);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);
	  //xlsWriteLabel($tablebody, $kolombody++, $data->lokasi);
       // xlsWriteLabel($tablebody, $kolombody++, $data->id_lokasi);
	   // xlsWriteLabel($tablebody, $kolombody++, $data->keterangan);


	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=aktivitas.doc");

        $data = array(
            'aktivitas_data' => $this->Aktivitas_Model->get_all(),
            'start' => 0
        );
        
        $this->load->view('aktivitas_doc',$data);
    }
    public function pdf(){
        $pdf = new FPDF('L','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'AKTIVITAS LIST',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        //$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(20,6,'Id Aktiitas',1,0);
        $pdf->Cell(20,6,'Jenis Komponen',1,0);
        $pdf->Cell(40,6,'Nama Komponen',1,0);

        $pdf->Cell(20,6,'Komponen Keluar',1,0);
        $pdf->Cell(20,6,'Komponen Masuk',1,0);
        $pdf->Cell(20,6,'Nama Produk',1,0);
        $pdf->Cell(20,6,'Tgl Aktivitas',1,0);
        $pdf->Cell(20,6,'Status',1,0);
        $pdf->Cell(20,6,'Keterangan',1,0);
        $data = $this->AKtivitas_Model->get_all();
        foreach ($data as $row){
            $pdf->Cell(20,6,$row->id_aktivitas,1,0);
            $pdf->Cell(20,6,$row->jenis_komponen,1,0);
            $pdf->Cell(40,6,$row->id_komponen,1,0);

            $pdf->Cell(20,6,$row->komponen_keluar,1,0); 
            $pdf->Cell(20,6,$row->komponen_masuk,1,0);
            $pdf->Cell(20,6,$row->id_produk,1,0);    
            $pdf->Cell(20,6,$row->tgl_aktivitas,1,0);
            $pdf->Cell(20,6,$row->status,1,0);
            $pdf->Cell(20,6,$row->keterangan,1,0);
        }
        $pdf->Output();
    }
    public function getjeniskomponen(){
        $data = $this->Aktivitas_Model->getjeniskomponen();
        $html ="<option></option>";
        foreach($data as $key => $value){
            $html.='<option value="'.$value->jenis_komponen.'">'.$value->jenis_komponen.'</option>';
        }
        echo $html;
    }
    
    public function detailkomponen(){
        $id = $this->input->post('ctg');
     $data = $this->Aktivitas_Model->detailkomponen($id);
     $html ="<option></option>";
     foreach($data as $key => $value){
        $html.='<option value="'.$value->id_komponen.'">'.$value->nama_komponen.'</option>';
    }
    echo $html;
    }
    public function getnama(){
        $id = $this->input->post('prdk');
     $data = $this->Aktivitas_Model->komponen($id);
     echo json_encode($data[0]);
    }
        public function getexcel()
        {
        $query['data1'] = $this->Aktivitas_Model->ToExcelAll(); 
        $this->load->view('aktivitas_excel',$query);
    }
}

/* End of file Transaksi.php */
/* Location: ./application/controllers/Transaksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-02-09 05:14:41 */
/* http://harviacode.com */