<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Updatestock extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Updatestock_model');
        $this->load->library('form_validation');        
		$this->load->library('datatables');
    }

    public function index()
    {        
        $this->template->load('template','updatestock/tbl_menu_list');
    }
    
    // function simpan_setting(){
    //     $value = $this->input->post('tampil_menu');
    //     $this->db->where('id_masuk',1);
    //     $this->db->update('tbl_komponen_masuk',array('value'=>$value));
    //     redirect('barangmasuk');
    // }
    
    // public function json() {
    //     header('Content-Type: application/json');
    //     echo $this->Updatestock_model->json();
    // }

    public function read($id) 
    {
        $row = $this->Updatestock_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_komponen'    => $row->id_komponen,
		'jenis_komponen' => $row->jenis_komponen,
		'jml_komponen'   => $row->jml_komponen,
		'id_suplier' 	 => $row->id_suplier,
		'keterangan' 	 => $row->keterangan,		
	    );
            $this->template->load('template','updatestock/tbl_menu_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('updatestock'));
        }
    }

    public function create() 
    {
        $data = array(
            'button'  => 'Create',
            'action'  => site_url('updatestock/create_action'),
	    'id_komponen'     => set_value('id_komponen'),
        'jenis_komponen'  => set_value('jenis_komponen'),
	    'jml_komponen'    => set_value('jml_komponen'),
	    'id_suplier'      => set_value('id_suplier'),
        'keterangan'      => set_value('keterangan'),
	    
        //Kiri value form  => Field di database (Keterangan)
	);
        $this->template->load('template','updatestock/tbl_menu_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'jenis_komponen'  => $this->input->post('jenis_komponen',TRUE),
        'jml_komponen'    => $this->input->post('jml_komponen',TRUE),
        'id_suplier' 	  => $this->input->post('id_suplier',TRUE),
		'keterangan' 	  => $this->input->post('keterangan',TRUE),		
	    );

            $this->Updatestock_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('updatestock'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Updatestock_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('updatestock/update_action'),
		'id_komponen' 	 => set_value('id_komponen', $row->id_komponen),
		'jenis_komponen' => set_value('jenis_komponen', $row->jenis_komponen),
		'jml_komponen' 	 => set_value('jml_komponen', $row->jml_komponen),
		'id_suplier' 	 => set_value('id_suplier', $row->id_suplier),
		'keterangan' 	 => set_value('keterangan', $row->keterangan),		
	    );
            $this->template->load('template','updatestock/tbl_menu_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('updatestock'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_komponen', TRUE));
        } else {
            $data = array(
		'jenis_komponen' => $this->input->post('jenis_komponen',TRUE),
		'jml_komponen'   => $this->input->post('jml_komponen',TRUE),
		'id_suplier'     => $this->input->post('id_suplier',TRUE),
		'keterangan'     => $this->input->post('keterangan',TRUE),		
	    );

            $this->Updatestock_model->update($this->input->post('id_komponen', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('updatestock'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Updatestock_model->get_by_id($id);

        if ($row) {
            $this->Updatestock_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('updatestock'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('updatestock'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('jenis_komponen', 'jenis komponen', 'trim|required');
	$this->form_validation->set_rules('jml_komponen', 'jumlah komponen', 'trim|required');
	$this->form_validation->set_rules('id_suplier', 'id suplier', 'trim|required');
	$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');	

	$this->form_validation->set_rules('id_komponen', 'id_komponen', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "tbl_stok.xls";
        $judul = "tbl_stok";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nama Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Jenis Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Komponen");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");

	foreach ($this->Updatestock_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->id_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_komponen);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jml_komponen);
	    xlsWriteNumber($tablebody, $kolombody++, $data->tanggal);

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
            'tbl_menu_data' => $this->Updatestock_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('updatestock/tbl_menu_doc',$data);
    }

    public function getsuplier(){
        $data = $this->Updatestock_model->getsuplier();
        $html = "<option value=''>SELECT</option>";
        foreach($data as $key => $value){
                $html.='<option value="'.$value->id_suplier.'">'.$value->id_suplier.' - '.$value->nama_suplier.'</option>';
        }
        
        echo $html;
    }

    public function getkomponen(){
        $data = $this->Updatestock_model->getkomponen();
        $html = "<option value=''>SELECT</option>";
        foreach($data as $key => $value){
            $html.='<option value="'.$value->jenis_komponen.'">'.$value->nama_kategori.'</option>';
        }
        echo $html;
    }

    public function detailkomponen(){
     $id   = $this->input->post('ctg');
     $data = $this->Updatestock_model->detailkomponen($id);
     $html = "<option value=''>SELECT</option>";
     foreach($data as $key => $value){
        $html.='<option value="'.$value->id_komponen.'">'.$value->id_komponen.' - '.$value->nama_komponen.'</option>';
        }
        echo $html;
    }


    public function insertstok(){
        //echo json_encode($this->input->post());exit();

        $id_komponen    =$this->input->post('komponen');
        $jenis_komponen =$this->input->post('jenis_komponen');
        $jml_komponen   =$this->input->post('jml_komponen');
        $id_suplier     =$this->input->post('id_suplier');
        $nota_beli      =$this->input->post('nota_beli');
        //echo $tgl;exit();

        $keterangan=$this->input->post('keterangan');
       
        foreach ($id_komponen as $key => $value) {

            $this->Updatestock_model->insertstok($id_komponen[$key],$jenis_komponen[$key],$jml_komponen[$key],$id_suplier,$nota_beli,$keterangan);
                       
           
            
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