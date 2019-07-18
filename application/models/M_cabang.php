<?php
class M_cabang extends CI_Model{

	function hapus_cabang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_cabangtoko where cabang_id='$kode'");
		return $hsl;
	}

	function update_cabang($kode,$cabnama,$cabpusat){
		$hsl=$this->db->query("UPDATE tbl_cabangtoko set cabang_nama='$cabnama' where cabang_id='$kode'");
		return $hsl;
	}

	function tampil_cabang(){
		$hsl=$this->db->query("select * from tbl_cabangtoko order by cabang_id asc");
		return $hsl;
	}

	function simpan_cabang($cabnama,$cabpusat){
		$hsl=$this->db->query("INSERT INTO tbl_cabang(cabang_nama) VALUES ('$cabnama')");
		return $hsl;
	}

}