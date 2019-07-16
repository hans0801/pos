<?php
class M_satuan extends CI_Model{

	function hapus_satuan($kode){
		$hsl=$this->db->query("DELETE FROM tbl_satuan where satuan_id='$kode'");
		return $hsl;
	}

	function update_satuan($kode,$sat){
		$hsl=$this->db->query("UPDATE tbl_satuan set satuan_nama='$sat' where satuan_id='$kode'");
		return $hsl;
	}

	function tampil_satuan(){
		$hsl=$this->db->query("SELECT * from tbl_satuan order by satuan_id desc");
		return $hsl;
	}

	function simpan_satuan($sat){
		$hsl=$this->db->query("INSERT INTO tbl_satuan(satuan_nama) VALUES ('$sat')");
		return $hsl;
	}

	function list_satuan(){
		$hasil=$this->db->query("SELECT * FROM tbl_satuan ORDER BY satuan_nama ASC");
		return $hasil;
	}
}