<?php
class Cabang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_cabang');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_cabang->tampil_cabang();
		$this->load->view('admin/v_cabang',$data);
	}else{
        $url=base_url('administrator');
        redirect($url);
    }
	}
	function tambah_cabang(){
	if($this->session->userdata('akses')=='1'){
		$kat=$this->input->post('cabang');
		$this->m_cabang->simpan_cabang($kat);
		redirect('admin/cabang');
	}else{
		$url=base_url('administrator');
        redirect($url);
    }
	}
	function edit_cabang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('kategori');
		$this->m_cabang->update_cabang($kode,$kat);
		redirect('admin/cabang');
	}else{
		$url=base_url('administrator');
        redirect($url);
    }
	}
	function hapus_cabang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_cabang->hapus_cabang($kode);
		redirect('admin/cabang');
	}else{
		$url=base_url('administrator');
        redirect($url);
    }
	}
}