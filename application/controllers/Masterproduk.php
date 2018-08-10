<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Masterproduk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Master_Produk_Model');
        $this->load->library('form_validation');        
	    //$this->load->library('datatables');
    }

    public function index()
    {

        $this->template->load('template','masterproduk/tbl_menu_list');
    }

    public function read($id) 
    {
        $row = $this->Master_Produk_Model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_produk' => $row->id_produk,
		'id_komponen' => $row->id_komponen,
		'nama_produk' => $row->nama_produk,
		'jml_komponen' => $row->jml_komponen,
	    );
            $this->template->load('template','masterproduk/tbl_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkrancangan'));
        }
    }

    public function create() 
    {
        $data = array(
        'button' => 'Create',
        'action' => site_url('produkrancangan/create_action'),
        'id_produk' => set_value('id_produk'),
        'nama_produk' => set_value('nama_produk'),
        'id_komponen' => set_value('id_komponen'),
	    'jml_komponen' => set_value('jml_komponen'),
	);
        $this->template->load('template','masterproduk/tbl_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        'id_produk' => $this->input->post('id_produk',TRUE),
        'nama_produk' => $this->input->post('nama_produk',TRUE),
        'id_komponen' => $this->input->post('id_komponen',TRUE),
		'jml_komponen' => $this->input->post('jml_kompoonen',TRUE),
	    );

            $this->Master_Produk_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produkrancangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Master_Produk_Model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('produkrancangan/update_action'),
		'id_produk' => set_value('id_produk', $row->id_produk),
        'nama_produk' => set_value('nama_produk', $row->nama_produk),
        'id_komponen' => set_value('id_komponen', $row->id_komponen),
        'jml_komponen' => set_value('jml_komponen', $row->jml_komponen),
	    );
            $this->template->load('template','produkrancangan/tbl_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkrancangan'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_produk', TRUE));
        } else {
            $data = array(
        'id_produk' => $this->input->post('id_produk',TRUE),
		'id_komponen' => $this->input->post('id_komponen',TRUE),
		'nama_produk' => $this->input->post('nama_produk',TRUE),
		'jml_komponen' => $this->input->post('jml_komponen',TRUE),
	    );

            $this->Master_Produk_Model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produkrancangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Master_Produk_Model->get_by_id($id);

        if ($row) {
            $this->Produk_Rancangan_Model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('produkrancangan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('produkrancangan'));
        }
    }

    public function _rules() 
    {
    $this->form_validation->set_rules('id_produk', 'ID Produk', 'trim|required');
	$this->form_validation->set_rules('id_komponen', 'ID Komponen', 'trim|required');
    $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
    $this->form_validation->set_rules('jml_komponen', 'Jml Komponen', 'trim|required');
	
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_menu.xls";
        $judul = "tbl_menu";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Title");
	xlsWriteLabel($tablehead, $kolomhead++, "Url");
	xlsWriteLabel($tablehead, $kolomhead++, "Icon");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Main Menu");
	xlsWriteLabel($tablehead, $kolomhead++, "Is Aktif");

	foreach ($this->Menu_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->title);
	    xlsWriteLabel($tablebody, $kolombody++, $data->url);
	    xlsWriteLabel($tablebody, $kolombody++, $data->icon);
	    xlsWriteNumber($tablebody, $kolombody++, $data->is_main_menu);
	    xlsWriteLabel($tablebody, $kolombody++, $data->is_aktif);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=tbl_menu.doc");

        $data = array(
            'tbl_menu_data' => $this->Master_Produk_Model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barangkeluar/tbl_menu_doc',$data);
    }

        public function getkomponen(){
        $data = $this->Master_Produk_Model->getkomponen();
        $html = "<option value=''>SELECT</option>";
        foreach($data as $key => $value){
            $html.='<option value="'.$value->jenis_komponen.'">'.$value->nama_kategori.'</option>';
        }
        echo $html;
    }

    public function detailkomponen(){
     $id   = $this->input->post('ctg');
     $data = $this->Master_Produk_Model->detailkomponen($id);
     $html = "<option value=''>SELECT</option>";
     foreach($data as $key => $value){
        $html.='<option value="'.$value->id_komponen.'">'.$value->id_komponen.' - '.$value->nama_komponen.'</option>';
        }
        echo $html;
    }

        public function insertstok(){        
        //echo json_encode($this->input->post());exit();

        $id_produk    =$this->input->post('id_produk');
        $nama_produk =$this->input->post('nama_produk');
        $id_komponen    =$this->input->post('id_komponen');
        $jml_komponen   =$this->input->post('jml_komponen');
        //echo $tgl;exit();

        //$keterangan=$this->input->post('keterangan');
       
        foreach ($id_komponen as $key => $value) {

            $this->Master_Produk_Model->insertstok($id_produk,$nama_produk,$id_komponen[$key],$jml_komponen[$key]);
                       
           
            
        }
        //echo '<pre>' . print_r($data2, TRUE) . '</pre>'; 
        //echo $data2; exit();
        echo json_encode(true);
    }

}

/* End of file Kelolamenu.php */
/* Location: ./application/controllers/Kelolamenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */