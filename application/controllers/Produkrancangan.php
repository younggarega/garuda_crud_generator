<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class produkrancangan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_Rancangan_Model');
        $this->load->library('form_validation');        
	    //$this->load->library('datatables');
    }

    public function index()
    {
        $produkrancangan = $this->Produk_Rancangan_Model->get_all();

        $data = array(
            'produkrancangan_data' => $produkrancangan
        );

        $this->template->load('template','produkrancangan/tbl_menu_list',$data);
    }
    public function read($id) 
    {
        $row = $this->Produk_Rancangan_Model->get_by_id($id);
        if ($row) {
            $data = array(
        'id_produk' => $row->id_produk,
		'id_komponen' => $row->id_komponen,
		'nama_produk' => $row->nama_produk,
		'jml_komponen' => $row->jml_komponen,
	    );
            $this->template->load('template','produkrancangan/tbl_menu_read', $data);
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
        $this->template->load('template','produkrancangan/tbl_menu_form', $data);
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

            $this->Produk_Rancangan_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('produkrancangan'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Produk_Rancangan_Model->get_by_id($id);

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

            $this->Produk_Rancangan_Model->update($this->input->post('id_produk', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('produkrancangan'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Produk_Rancangan_Model->get_by_id($id);

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
            'tbl_menu_data' => $this->Menu_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barangkeluar/tbl_menu_doc',$data);
    }

}

/* End of file Kelolamenu.php */
/* Location: ./application/controllers/Kelolamenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */