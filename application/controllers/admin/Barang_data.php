<?php
class Barang_data extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_barang_data');
    }
    function index(){
        $this->load->view('admin/v_data_barang');
    }

    function data_barang(){
        $data=$this->m_barang_data->barang_list();
        echo json_encode($data);
    }
 
    function get_barang(){
        $kobar=$this->input->get('id');
        $data=$this->m_barang_data->get_barang_by_id($kobar);
        echo json_encode($data);
    }

    function get_barang_detail(){
        $kobar=$this->input->get('id');
        $data=$this->m_barang_detail->tampil_barang_detail($kobar);
        echo json_encode($data);
    }
 
    function simpan_barang(){
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $data=$this->m_barang_data->simpan_barang($kobar,$nabar,$harga);
        echo json_encode($data);
    }
 
    function update_barang(){
        $kobar=$this->input->post('kobar');
        $nabar=$this->input->post('nabar');
        $harga=$this->input->post('harga');
        $data=$this->m_barang_data->update_barang($kobar,$nabar,$harga);
        echo json_encode($data);
    }
 
    function hapus_barang(){
        $kobar=$this->input->post('kode');
        $data=$this->m_barang_data->hapus_barang($kobar);
        echo json_encode($data);
    }


 
    // function data_barang_old(){
    //     $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    //     $limit = $_POST['length']; // Ambil data limit per page
    //     $start = $_POST['start']; // Ambil data start
    //     $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    //     $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    //     $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

        
    //      $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"

    //      $sql_total = $this->m_barang_data->count_all(); // Panggil fungsi count_all pada SiswaModel
    //      $sql_data = $this->m_barang_data->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada SiswaModel
    //      $sql_filter = $this->m_barang_data->count_filter($search); // Panggil fungsi count_filter pada SiswaModel
    //      $callback = array(
    //     'draw'=>$_POST['draw'], // Ini dari datatablenya
    //     'recordsTotal'=>$sql_total,
    //     'recordsFiltered'=>$sql_filter,
    //     'data'=>$sql_data
    //       );
    // header('Content-Type: application/json');
    // echo json_encode($callback); // Convert array $callback ke json

    //     // $data=$this->m_barang_data-> barang_list();
    //     // echo json_encode($data);
    // }
}