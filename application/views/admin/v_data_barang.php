<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Product By Windy's Tech">
    <meta name="author" content="Windy's Tech">

    <title>Management data barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>Barang</small>
                    <div class="pull-right"><a href="#" data-target="#ModalaAdd" class="btn btn-sm btn-success" data-toggle="modal" ><span class="fa fa-plus"></span> Tambah Barang</a></div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:13px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Jual & Satuan</th>
                        <th style="width:180px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2019';?> by Windy's Tech</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>
    </div>
    <!-- /.container -->



        <!-- MODAL ADD -->
        <div class="modal fade" name="ModalaAdd" id="ModalaAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <!-- <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar_add" id="kode_barang_add" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" required>
                        </div>
                    </div> -->
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nama_barang_add" id="nama_barang_add" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>
 
                    <div class="form-group">
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:13px;width:500px" id="mydataSatuan">
                <thead>
                    <tr>
                        <th style="text-align:center;width:200px;">Satuan Barang</th>
                        <th style="text-align:center;width:300px;">Harga Jual</th>
                    </tr>
                </thead>
                <tbody id="show_data_satuan">
                <tr>
                <td>
                <li>
                        <select name="Satuan_Add1" id="Satuan_Add1" class="form-control">
                        <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                            <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                        <select name="Satuan_Add2" id="Satuan_Add2" class="Satuan2 form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                </li>
                        <select name="Satuan_Add3" id="Satuan_Add3" class="Satuan3 form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                </td>
                <td>
                <li>
                <input type="text" name="TxtHarga_Add1" id="TxtHarga_Add1" style="height:35px;width:290px">
                </li>
                <li>
                <input type="text" name="TxtHarga_Add2" id="TxtHarga_Add2" style="height:35px;width:290px">
                </li>
                <li>
                <input type="text" name="TxtHarga_Add3" id="TxtHarga_Add3" style="height:35px;width:290px">
                </li>
                </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_simpan">Simpan</button>
                </div>
                </div>

            </form>
            </div>
            </div>
        </div>
        <!--END MODAL ADD-->
 
        <!-- MODAL EDIT -->
        <div class="modal fade" id="ModalaEdit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
            </div>
            <form class="form-horizontal">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar_edit" id="kobar_edit" class="form-control" type="text" placeholder="Kode Barang" style="width:335px;" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar_edit" id="nabar_edit" class="form-control" type="text" placeholder="Nama Barang" style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:13px;width:500px" id="mydataSatuan">
                <thead>
                    <tr>
                        <th style="text-align:center;width:200px;">Satuan Barang</th>
                        <th style="text-align:center;width:300px;">Harga Jual</th>
                    </tr>
                </thead>
                <tbody id="show_data_satuan">
                <tr>
                <td>
                <li>
                        <select name="Satuan_Edit1" id="Satuan_Edit1" class="form-control">
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                        <select name="Satuan_Edit2" id="Satuan_Edit2" class="Satuan2 form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                </li>
                        <select name="Satuan_Edit3" id="Satuan_Edit3" class="Satuan3 form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach($data->result() as $row):?>
                                <option value="<?php echo $row->satuan_nama;?>"><?php echo $row->satuan_nama;?></option>
                            <?php endforeach;?>
                        </select>
                </li>
                </td>
                <td>
                <li>
                <input type="text" name="Harga_Edit1" id="Harga_Edit1" style="height:35px;width:290px">
                </li>
                <li>
                <input type="text" name="Harga_Edit2" id="Harga_Edit2" style="height:35px;width:290px">
                </li>
                <li>
                <input type="text" name="Harga_Edit3" id="Harga_Edit3" style="height:35px;width:290px">
                </li>
                </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
                    </div>
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" id="btn_update">Update</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--END MODAL EDIT-->
 
        <!--MODAL HAPUS-->
        <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <h4 class="modal-title" id="myModalLabel">Hapus Barang</h4>
                    </div>
                    <form class="form-horizontal">
                    <div class="modal-body">
                                           
                            <input type="hidden" name="kode" id="textkode" value="">
                            <div class="alert alert-warning"><p>Apakah Anda yakin mau menghapus barang ini?</p></div>
                                         
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button class="btn_hapus btn btn-danger" id="btn_hapus">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--END MODAL HAPUS-->


 
    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>

    <script type="text/javascript">

    </script>

    <script type="text/javascript">
    $(document).ready(function(){
        tampil_data_barang();   //pemanggilan fungsi tampil barang.
         
        $('#mydata').dataTable();

        //Show Modal For Add
        function ShowAddModal(){
        $('#ModalaAdd').modal('show');
        };

        //Price Format
        function PriceFormatForEdit(){
            $('#TxtHarga1').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#TxtHarga2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#TxtHarga3').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        };
          
        //fungsi tampil barang
        function tampil_data_barang(){
            $.ajax({
                type  : "ajax",
                url   : "<?php echo site_url('admin/barang_data/data_barang')?>",
                async : false,
                dataType : "json",
                success : function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        var val_barangharga1=data[i].barang_harga1;
                        var val_barangharga2=data[i].barang_harga2;
                        var val_barangharga3=data[i].barang_harga3;
                        var val_barangsat1=data[i].barang_sat1;
                        var val_barangsat2=data[i].barang_sat2;
                        var val_barangsat3=data[i].barang_sat3;
                        html += '<tr>'+
                                '<td>'+data[i].barang_id+'</td>'+
                                '<td>'+data[i].barang_nama+'</td>'+
                                '<td><i class="glyphicon glyphicon-check">'
                                + val_barangharga1 +'/'+val_barangsat1+
                                '<br><i class="glyphicon glyphicon-check">'
                                +val_barangharga2+'/'+val_barangsat2+
                                '<br><i class="glyphicon glyphicon-check">'
                                +val_barangharga3+'/'+val_barangsat3+
                                '</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-warning btn-xs item_edit" data="'+data[i].barang_id+'" style="width:90px">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-xs item_hapus" data="'+data[i].barang_id+'" style="width:90px">Hapus</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                }
            });
        }

        //Refresh Data From Cache
        function RefreshCacheData(){
            location.reload(false);
        };

        //GET UPDATE
        $('#show_data').on('click','.item_edit',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url   : "<?php echo site_url('admin/barang_data/get_barang')?>",
                dataType : "json",
                data : {id:id},
                success: function(data){
                    $.each(data,function(barang_id, barang_nama, barang_sat1, barang_sat2, barang_sat3,barang_harga1,barang_harga2,barang_harga3){
                        $('[name="kobar_edit"]').val(data.barang_id);
                        $('[name="nabar_edit"]').val(data.barang_nama);
                        $('[name="Satuan_Edit1"]').val(data.barang_sat1);
                        $('[name="Satuan_Edit2"]').val(data.barang_sat2);
                        $('[name="Satuan_Edit3"]').val(data.barang_sat3);
                        $('[name="Harga_Edit1"]').val(data.barang_harga1);
                        $('[name="Harga_Edit2"]').val(data.barang_harga2);
                        $('[name="Harga_Edit3"]').val(data.barang_harga3);
                        PriceFormatForEdit();
                        $('#ModalaEdit').modal('show');
                    });
                    
                }
                
            });
            return false;
        });
 
        //GET HAPUS
        $('#show_data').on('click','.item_hapus',function(){
            var id=$(this).attr('data');
            $('#ModalHapus').modal('show');
            $('[name="kode"]').val(id);
        });
 
        //Simpan Barang
        $('#btn_simpan').on('click',function(){
            // var kobar=$('#kode_barang').val();
            var nabar=$('#nama_barang_add').val();
            var barang_sat1=$('#Satuan_Add1').val();
            var barang_sat2=$('#Satuan_Add2').val();
            var barang_sat3=$('#Satuan_Add3').val();
            var barang_harga1=$('#TxtHarga_Add1').val();
            var barang_harga2=$('#TxtHarga_Add2').val();
            var barang_harga3=$('#TxtHarga_Add3').val();
            var barang_cabangtoko='9999';
            var barang_user_id=<?php session_start(); echo $_SESSION["S_Userid"];?>;
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'admin/barang_data/simpan_barang';?>",
                dataType : "json",
                data : {nabar:nabar, barang_sat1:barang_sat1,barang_sat2:barang_sat2,barang_sat3:barang_sat3,barang_harga1:barang_harga1,barang_harga2:barang_harga2,barang_harga3:barang_harga3,barang_cabangtoko:barang_cabangtoko,barang_user_id:barang_user_id},
                success: function(data){
                    $('[name="nama_barang_add"]').val("");
                    $('[name="Satuan_Add1"]').val("");
                    $('[name="Satuan_Add2"]').val("");
                    $('[name="Satuan_Add3"]').val("");
                    $('[name="TxtHarga_Add1"]').val("");
                    $('[name="TxtHarga_Add2"]').val("");
                    $('[name="TxtHarga_Add3"]').val("");
                    $('#ModalaAdd').modal('hide');
                    alert('Data Berhasil Disimpan.');
                    RefreshCacheData();
                },
                error: function(data)
                {
                    alert('Opps...!!! Terjadi kesalahan,data tidak dapat disimpan.');
                }
            });
            return false;
        });
 
        //Update Barang
        $('#btn_update').on('click',function(){
            var kobar=$('#kobar_edit').val();
            var nabar=$('#nabar_edit').val();
            var barang_sat1=$('#Satuan_Edit1').val();
            var barang_sat2=$('#Satuan_Edit2').val();
            var barang_sat3=$('#Satuan_Edit3').val();
            var barang_harga1=$('#Harga_Edit1').val();
            var barang_harga2=$('#Harga_Edit2').val();
            var barang_harga3=$('#Harga_Edit3').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url().'admin/barang_data/update_barang';?>",
                dataType : "json",
                data : {kobar:kobar , nabar:nabar, barang_sat1:barang_sat1,barang_sat2:barang_sat2,barang_sat3:barang_sat3,barang_harga1:barang_harga1,barang_harga2:barang_harga2,barang_harga3:barang_harga3},
                success: function(data){
                    $('[name="kobar_edit"]').val("");
                    $('[name="nabar_edit"]').val("");
                    $('[name="Satuan_Edit1"]').val("");
                    $('[name="Satuan_Edit2"]').val("");
                    $('[name="Satuan_Edit3"]').val("");
                    $('[name="Harga_Edit1"]').val("");
                    $('[name="Harga_Edit2"]').val("");
                    $('[name="Harga_Edit3"]').val("");
                    $('#ModalaEdit').modal('hide');
                    alert('Data Berhasil Diubah.');
                    RefreshCacheData();
                },
                error: function(data)
                {
                    alert('Opps...!!! Terjadi kesalahan,data tidak dapat diubah.');
                }
            });
            return false;
        });
 
        //Hapus Barang
        $('#btn_hapus').on('click',function(){
            var kode=$('#textkode').val();
            $.ajax({
            type : "POST",
            url  : "<?php echo base_url().'admin/barang_data/hapus_barang';?>",
            dataType : "json",
                    data : {kode: kode},
                    success: function(data){
                            $('#ModalHapus').modal('hide');
                            RefreshCacheData();
                    }
                });
                return false;
            });
 
    });
 
</script>


<!-- </script> -->
    <!-- <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });
    </script>
     -->
</body>


</html>