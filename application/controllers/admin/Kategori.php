<?php
class Kategori extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$data['data']=$this->m_kategori->tampil_kategori();
		$this->load->view('admin/v_kategori',$data);
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function tambah_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kat=$this->input->post('kategori');
		$this->m_kategori->simpan_kategori($kat);
		redirect('admin/kategori');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function edit_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$kat=$this->input->post('kategori');
		$this->m_kategori->update_kategori($kode,$kat);
		redirect('admin/kategori');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
	function hapus_kategori(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_kategori->hapus_kategori($kode);
		redirect('admin/kategori');
	}else{
		$url=base_url('administrator');
		redirect($url);
    }
	}
}