<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}

	function tampil_barang(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama FROM tbl_barang ORDER BY barang_id");
		#$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang JOIN tbl_kategori ON barang_kategori_id=kategori_id");
		// $hsl=$this->db->query("SELECT tb.barang_id,tb.barang_nama,tb.barang_stok,tb.barang_min_stok,tbs.satuan_nama,tbd.harga_jual
		// FROM tbl_barang tb
		// JOIN tbl_barang_detail tbd ON tb.barang_id = tbd.barang_id
		// JOIN tbl_satuan tbs ON tbs.satuan_id=tbd.satuan_id
		// ORDER BY barang_id");
		return $hsl;
	}

	function tampil_satuan_by_id($id){
		$hsl=$this->db->query("SELECT tbd.barang_detail_id,tbd.barang_id,tbd.harga_jual,tbd.satuan_id 
		FROM tbl_barang_detail tbd JOIN tbl_satuan ts on ts.satuan_id=tbd.satuan_id 
		WHERE tbd.barang_id=$id");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id')");
		return $hsl;
	}


	function get_barang($kobar){
		$hsl=$this->db->query("SELECT * FROM tbl_barang where barang_id='$kobar'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT MAX(RIGHT(barang_id,6)) AS kd_max FROM tbl_barang");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

}