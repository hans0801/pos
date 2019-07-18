<?php
class Satuan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_satuan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_satuan->tampil_satuan();
		$this->load->view('admin/v_satuan',$data);
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function tambah_satuan(){
	if($this->session->userdata('akses')=='1'){
		$sat=$this->input->post('satuan');
		$this->m_satuan->simpan_satuan($sat);
		redirect('admin/satuan');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function edit_satuan(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$sat=$this->input->post('satuan');
		$this->m_satuan->update_satuan($kode,$sat);
		redirect('admin/satuan');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function hapus_satuan(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_satuan->hapus_satuan($kode);
		redirect('admin/satuan');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
}