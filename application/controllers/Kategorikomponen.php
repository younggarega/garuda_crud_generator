<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategorikomponen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kategori_Komponen_Model');
        $this->load->library('form_validation');        
	    //$this->load->library('datatables');
    }

    public function index()
    {
        $kategorikomponen = $this->Kategori_Komponen_Model->get_all();

        $data = array(
            'kategorikomponen_data' => $kategorikomponen
        );
        $this->template->load('template','kategorikomponen/tbl_menu_list',$data);
    }
    

/*    public function json() {
        header('Content-Type: application/json');
        echo $this->Kategori_Komponen_Model->json();
    }*/

    public function read($id) 
    {
        $row = $this->Kategori_Komponen_Model->get_by_id($id);
        if ($row) {
            $data = array(
        'jenis_komponen' => $row->jenis_komponen,
		'nama_kategori' => $row->nama_kategori,
		'keterangan' => $row->keterangan,
	    );
            $this->template->load('template','kategorikomponen/tbl_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategorikomponen'));
        }
    }

    public function create() 
    {
        $data = array(
        //input---------database
        'button' => 'Create',
        'action' => site_url('kategorikomponen/create_action'),
        'jenis_komponen' => set_value('jenis_komponen'),
	    'nama_kategori' => set_value('nama_kategori'),
        'keterangan' => set_value('keterangan'),
	);
        $this->template->load('template','kategorikomponen/tbl_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

        $data['jenis_komponen'] = $this->input->post('jenis_komponen',TRUE);
		$data['nama_kategori'] = $this->input->post('nama_kategori',TRUE);
		$data['keterangan'] = $this->input->post('keterangan',TRUE);
		

            $this->Kategori_Komponen_Model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kategorikomponen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kategori_Komponen_Model->get_by_id($id);

        if ($row) {
            $data = array(
        'button' => 'Update',
        'action' => site_url('kategorikomponen/update_action'),
        'jenis_komponen' => set_value('jenis_komponen', $row->jenis_komponen),
		'nama_kategori' => set_value('nama_kategori', $row->nama_kategori),
        'keterangan' => set_value('keterangan', $row->keterangan),
	    );
            $this->template->load('template','kategorikomponen/tbl_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategorikomponen'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('jenis_komponen', TRUE));
        } else {
            $data = array(
        'jenis_komponen' => $this->input->post('jenis_komponen',TRUE),
		'nama_kategori' => $this->input->post('nama_kategori',TRUE),
		'keterangan' => $this->input->post('keterangan',TRUE),
	    );

            $this->Kategori_Komponen_Model->update($this->input->post('jenis_komponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kategorikomponen'));
        }
    }


    public function delete($id) 
    {
        $row = $this->Kategori_Komponen_Model->get_by_id($id);

        if ($row) {
            $this->Kategori_Komponen_Model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kategorikomponen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kategorikomponen'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
	$this->form_validation->set_rules('jenis_komponen', 'Jenis Komponen', 'trim');

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
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Komponen");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama Kategori");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterangan");

	foreach ($this->Kategori_Komponen_Model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
        xlsWriteNumber($tablehead, $kolomhead++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_komponen);
        xlsWriteLabel($tablebody, $kolombody++, $data->nama_komponen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->keterangan);

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
            'kategorikomponen_data' => $this->Kategori_Komponen_Model->get_all(),
            'start' => 0
        );
        
        $this->load->view('kategorikomponen/tbl_menu_doc',$data);
    }

}

/* End of file Kelolamenu.php */
/* Location: ./application/controllers/Kelolamenu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-10-04 10:50:27 */
/* http://harviacode.com */