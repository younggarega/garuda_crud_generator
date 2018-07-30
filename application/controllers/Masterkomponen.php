<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masterkomponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Komponen_Model');
        $this->load->library('form_validation');        
	    $this->load->library('pdf');
    }

    public function index()
    {
        $masterkomponen = $this->Master_Komponen_Model->get_all();

        $data = array(
            'masterkomponen_data' => $masterkomponen
        );

        $this->template->load('template','masterkomponen/tbl_menu_list',$data);
    }

/*    public function json() {
        header('Content-Type: application/json');
        echo $this->Master_Komponen_Model->json();
    }*/

     public function getkategori(){
        $data = $this->Master_Komponen_Model->get_kategori();
        $html ="<option> SELECT </option>";
        foreach($data as $key => $value){
            $html.='<option value="'.$value->jenis_produk.'" >'.$value->nama_kategori.'</option>';
        }
        echo $html;
    }

    public function read($id) 
    {
        $row = $this->Master_Komponen_Model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_komponen'     => $row->id_komponen,
        'jenis_komponen'  => $row->jenis_komponen,
		'nama_komponen'   => $row->nama_komponen,
        'gambar_komponen' => $row->gambar_komponen,
		'keterangan'      => $row->keterangan,
	    );
            $this->template->load('template','masterkomponen/tbl_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('masterkomponen'));
        }
    }

    public function create() 
    {
        $data = array(
        //input---------database
        'button' => 'Create',
        'action' => site_url('masterkomponen/create_action'),
	    'id_komponen' => set_value('id_komponen'),
        'jenis_komponen' => set_value('jenis_komponen'),
	    'nama_komponen' => set_value('nama_komponen'),
        'keterangan' => set_value('keterangan'),
	    'gambar_komponen' => set_value('gambar_komponen'),
        
	);
        $this->template->load('template','masterkomponen/tbl_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

		$data['id_komponen'] = $this->input->post('id_komponen',TRUE);
        $data['jenis_komponen'] = $this->input->post('jenis_komponen',TRUE);
		$data['nama_komponen'] = $this->input->post('nama_komponen',TRUE);
        $data['keterangan'] = $this->input->post('keterangan',TRUE);
        $data['gambar_komponen'] = $foto['file_name'];
		
		

            $this->Master_Komponen_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('masterkomponen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_Komponen_Model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('masterkomponen/update_action'),
		'id_komponen' => set_value('id_komponen', $row->id_komponen),
        'jenis_komponen' => set_value('jenis_komponen', $row->jenis_komponen),
		'nama_komponen' => set_value('nama_komponen', $row->nama_komponen),
		'gambar_komponen' => set_value('gambar_komponen', $row->gambar_komponen),
        'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','masterkomponen/tbl_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('masterkomponen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();
        $foto = $this->upload_foto();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komponen', TRUE));
        } else {
            $data = array(
		'id_komponen' => $this->input->post('id_komponen',TRUE),
        'jenis_komponen' => $this->input->post('jenis_komponen',TRUE),
		'nama_komponen' => $this->input->post('nama_komponen',TRUE),
        'gambar_komponen' => $foto['file_name'],
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Master_Komponen_Model->update($this->input->post('id_komponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('masterkomponen'));
        }
    }

    function upload_foto(){
        $config['upload_path']          = './assets/images';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['width'] = 100; //lebar setelah resize menjadi 100 px
        $config['height'] = 100; //lebar setelah resize menjadi 100 px
        //$config['max_size']             = '8024';
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('gambar_komponen');
        return $this->upload->data();
    }

    public function delete($id) 
    {
        $row = $this->Master_Komponen_Model->get_by_id($id);

        if ($row) {
            $this->Master_Komponen_Model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('masterkomponen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('masterkomponen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('id_komponen', 'ID Komponen', 'trim|required');
	$this->form_validation->set_rules('nama_komponen', 'Nama Komponen', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
	$this->form_validation->set_rules('jenis_komponen', 'Jenis Komponen', 'trim');

	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_master_komponen.xls";
        $judul = "masterkomponen";
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
        xlsWriteLabel($tablehead, $kolomhead++, "ID Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
	//xlsWriteLabel($tablehead, $kolomhead++, "Gambar Komponen");
	//xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Master_Komponen_Model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablebody, $kolombody++, $nourut);
        xlsWriteLabel($tablebody, $kolombody++, $data->id_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
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
        $pdf->Cell(35,6,'Id Komponen',1,0,'C');
        $pdf->Cell(35,6,'Jenis Komponen',1,0,'C');
        $pdf->Cell(30,6,'Nama Komponen',1,1,'C');
       
        $pdf->SetFont('Arial','',10);
        $data = $this->Master_Komponen_Model->get_all();
        $no = 1;
        foreach ($data as $row){
            
            $pdf->Cell(25,6, $no++,1,0);
            $pdf->Cell(35,6,$row->id_komponen,1,0); 
            $pdf->Cell(35,6,$row->jenis_komponen,1,0); 
            $pdf->Cell(30,6,$row->nama_komponen,1,1);
 
            
        }

        $pdf->Output();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_master_komponen.doc");

        $data = array(
            'masterkomponen_data' => $this->Master_Komponen_Model->get_all(),
            'start' => 0
        );
        
        $this->load->view('masterkomponen/tbl_menu_doc',$data);
    }

}

/* End of file Kelolamenu.php */
/* Location: ./application/controllers/Kelolamenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */