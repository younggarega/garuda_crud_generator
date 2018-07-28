<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mastersuplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Suplier_Model');
        $this->load->library('form_validation');        
	    $this->load->library('pdf');
    }

    public function index()
    {
        $mastersuplier = $this->Master_Suplier_Model->get_all();

        $data = array(
            'mastersuplier_data' => $mastersuplier
        );

        $this->template->load('template','mastersuplier/tbl_menu_list',$data);
    }
    

/*    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_Suplier_Model->json();
    }*/

    public function read($id) 
    {
        $row = $this->Master_Suplier_Model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_suplier'     => $row->id_suplier,
        'nama_suplier'  => $row->nama_suplier,
		'alamat'   => $row->alamat,
	    );
            $this->template->load('template','mastersuplier/tbl_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersuplier'));
        }
    }

    public function create() 
    {
        $data = array(
        //input---------database
        'button' => 'Create',
        'action' => site_url('mastersuplier/create_action'),
	    'id_suplier' => set_value('id_suplier'),
        'nama_suplier' => set_value('nama_suplier'),
	    'alamat' => set_value('alamat'),
	);
        $this->template->load('template','mastersuplier/tbl_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

		$data['id_suplier'] = $this->input->post('id_suplier',TRUE);
        $data['nama_suplier'] = $this->input->post('nama_suplier',TRUE);
		$data['alamat'] = $this->input->post('alamat',TRUE);
		

            $this->Master_Suplier_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('mastersuplier'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_Suplier_Model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('mastersuplier/update_action'),
		'id_suplier' => set_value('id_suplier', $row->id_suplier),
        'nama_suplier' => set_value('nama_suplier', $row->nama_suplier),
		'alamat' => set_value('alamat', $row->alamat),
	    );
            $this->template->load('template','mastersuplier/tbl_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersuplier'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_suplier', TRUE));
        } else {
            $data = array(
		'id_suplier' => $this->input->post('id_suplier',TRUE),
        'nama_suplier' => $this->input->post('nama_suplier',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
	    );

            $this->Master_Suplier_Model->update($this->input->post('id_suplier', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mastersuplier'));
        }
    }


    public function delete($id) 
    {
        $row = $this->Master_Suplier_Model->get_by_id($id);

        if ($row) {
            $this->Master_Suplier_Model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mastersuplier'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mastersuplier'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_suplier', 'ID Suplier', 'trim|required');
	$this->form_validation->set_rules('nama_suplier', 'Nama Suplier', 'trim|required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_master_suplier.xls";
        $judul = "mastersuplier";
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
        xlsWriteLabel($tablehead, $kolomhead++, "ID Suplier");
	    xlsWriteLabel($tablehead, $kolomhead++, "Nama Suplier");
	    xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
	//xlsWriteLabel($tablehead, $kolomhead++, "Gambar Komponen");
	//xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Master_Suplier_Model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_suplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_suplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    //xlsWriteLabel($tablebody, $kolombody++, $data->gambar_komponen);
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
        $pdf->Cell(190,7,'Master Komponen',0,1,'C');

        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        //$pdf->Cell(10,6,'No',1,0,'C');
        $pdf->Cell(25,6,'No',1,0,'C');
        $pdf->Cell(35,6,'Id Suplier',1,0,'C');
        $pdf->Cell(35,6,'Nama Suplier',1,0,'C');
        $pdf->Cell(30,6,'Alamat',1,1,'C');
       
        $pdf->SetFont('Arial','',10);
        $data = $this->Master_Suplier_Model->get_all();
        $no = 1;
        foreach ($data as $row){
            
            $pdf->Cell(25,6, $no++,1,0);
            $pdf->Cell(35,6,$row->id_suplier,1,0); 
            $pdf->Cell(35,6,$row->nama_suplier,1,0); 
            $pdf->Cell(30,6,$row->alamat,1,1);
 
            
        }

        $pdf->Output();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_menu.doc");

        $data = array(
            'tbl_master_suplier' => $this->Master_Suplier_Model->get_all(),
            'start' => 0
        );
        
        $this->load->view('mastersuplier/tbl_menu_doc',$data);
    }

}

/* End of file Kelolamenu.php */
/* Location: ./application/controllers/Kelolamenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */