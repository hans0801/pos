<?php
class M_barang_data extends CI_Model{

	function barang_list(){
        $hasil=$this->db->query("SELECT barang_id,barang_nama,barang_sat1,barang_sat2,barang_sat3,
        FORMAT(barang_harga1,0) as barang_harga1,FORMAT(barang_harga2,0) as barang_harga2,FORMAT(barang_harga3,0) as barang_harga3  
        FROM tbl_barang");
        return $hasil->result();
        }

        function simpan_barang($kobar,$nabar){
                $hasil=$this->db->query("INSERT INTO tbl_barang (barang_id,barang_nama,barang_stok,barang_min_stok,barang_tgl_input,barang_tgl_last_update,barang_user_id)
                VALUES('$kobar','$nabar','99999999','99999999','','','1')");
                return $hasil;
            }
         
        function get_barang_by_id($kobar){
                $hsl=$this->db->query("SELECT barang_id,barang_nama,barang_sat1,barang_sat2,barang_sat3,barang_harga1,barang_harga2,barang_harga3 
                FROM tbl_barang WHERE barang_id='$kobar'");
                if($hsl->num_rows()>0){
                    foreach ($hsl->result() as $data) {
                        $hasil=array(
                            'barang_id' => $data->barang_id,
                            'barang_nama' => $data->barang_nama,
                            'barang_sat1' => $data->barang_sat1,
                            'barang_sat2' => $data->barang_sat2,
                            'barang_sat3' => $data->barang_sat3,
                            'barang_harga1' => $data->barang_harga1,
                            'barang_harga2' => $data->barang_harga2,
                            'barang_harga3' => $data->barang_harga3,
                            );
                    }
                }
                return $hasil;
            }
         
        function update_barang($kobar,$nabar){
                $hasil=$this->db->query("UPDATE tbl_barang SET barang_nama='$nabar' WHERE barang_id='$kobar'");
                return $hasil;
            }
         
        function hapus_barang($kobar){
                $hasil=$this->db->query("DELETE FROM tbl_barang WHERE barang_id='$kobar'");
                return $hasil;
            }




                public function filter($search, $limit, $start, $order_field, $order_ascdesc){
                $this->db->like('barang_id', $search); // Untuk menambahkan query where LIKE
                $this->db->or_like('barang_nama', $search); // Untuk menambahkan query where OR LIKE
                $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
                $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
                return $this->db->get('tbl_barang')->result_array(); // Eksekusi query sql sesuai kondisi diatas
              }
              public function count_all(){
                return $this->db->count_all('tbl_barang'); // Untuk menghitung semua data siswa
              }
              public function count_filter($search){
                $this->db->like('barang_id', $search); // Untuk menambahkan query where LIKE
                $this->db->or_like('barang_nama', $search); // Untuk menambahkan query where OR LIKE
                return $this->db->get('tbl_barang')->num_rows(); // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
              }
              


}
