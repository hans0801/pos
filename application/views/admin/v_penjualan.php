<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Product By Windy's Tech">
    <meta name="author" content="Windy's Tech">

    <title>Transaksi Penjualan</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
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
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan (Eceran)</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a>
                </h1> 
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
        <div class="form-group">
                        <label class="control-label col-xs-2" >Kode Barang</label>
                    <div class="col-xs-9">
                            <input name="kobar" id="kode_barang" class="form-control" type="text" placeholder="Kode Barang" style="width:285px;" disabled="true">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" id="nama_barang" class="form-control" type="text" placeholder="Nama Barang" style="width:285px;" disabled="true" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Harga & Satuan Barang</label>
                        <div class="col-xs-9">
                        <select id="mySelect" name="mySelect" style="width:285px;height:35px"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-2" >Qty Pembelian</label>
                        <div class="col-xs-9">
                            <div class="input-group">
                            <input name="qty_barang" id="qty_barang" class="form-control" type="text" placeholder="0" style="width:50px;" required>
                            <button type="submit" class="btn btn-success" style="width:235px" onclick="AddData();"> Tambahkan</button>
                            </div>
                        </div>
                    </div>
        </div>

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:12px;margin-top:10px;" id="TabOrder">
                <thead>
                    <tr>
                        <th style="text-align:center;width:130px">Kode Barang</th>
                        <th style="text-align:center;width:300px">Nama Barang</th>
                        <th style="text-align:center;width:200px">Harga Jual (Rp) / Satuan</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
        </table>
</div>
            <form action="<?php echo base_url().'admin/penjualan/simpan_penjualan'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Simpan</button></td>
                    <th style="width:140px;">Total Belanja(Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($this->cart->total());?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="total" name="total" value="<?php echo $this->cart->total();?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Data Barang</h4>
            </div>
                <div class="modal-body" style="height:690px;">
                <table class="table table-bordered table-condensed" style="font-size:12px;height:300px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Jual & Satuan</th>
                        <th style="width:120px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach ($data->result_array() as $a):
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $satbarang1=$a['barang_sat1'];
                        $satbarang2=$a['barang_sat2'];
                        $satbarang3=$a['barang_sat3'];
                        $harga1=$a['barang_harga1'];
                        $harga2=$a['barang_harga2'];
                        $harga3=$a['barang_harga3'];
                ?>
                    <tr>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td><i class="glyphicon glyphicon-check"><?php echo $harga1; echo "/";echo $satbarang1;?>
                            <br>
                            <i class="glyphicon glyphicon-check"><?php echo $harga2; echo "/";echo $satbarang2;?>
                            <br>
                            <i class="glyphicon glyphicon-check"><?php echo $harga3; echo "/";echo $satbarang3;?>
                        </td>
                        <td style="text-align:center;">
                            <button id="button1" class="btn btn-xs btn-success item_select" style="height:35px;width:70px;" data="<?php echo $id;?>"> Pilih</button>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
            </div>
        </div>
        <!-- ============ END MODAL ADD =============== -->

        <hr>

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

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
        function AddData(){
            var IdBarang = $("#kode_barang").val();
            var NmBarang = $("#nama_barang").val();
            var listsatuan=document.getElementById('mySelect');
            var result = listsatuan.options[listsatuan.selectedIndex].text;
            var HargaJual = $("#MySelect").val();
            var QtyOrder = $("#qty_barang").val();
            var RowTable = "<tr><td style='text-align:center'>" + IdBarang + "</td><td style='text-align:center'>" + NmBarang + "</td><td style='text-align:center'>" + result + "</td><td style='text-align:center'>" + QtyOrder + "</td><td style='text-align:center'><input type='text' style='width:150px' value='0'></input></td><td style='text-align:center'>0</td><td style='text-align:center'><button type='submit' class='btn btn-danger' onclick='RemoveData(this)'>Hapus</button></td></tr>";
            $("#TabOrder").append(RowTable);
            ClearForm();
        };

        function clearSelectList(list) {
        // when length is 0, the evaluation will return false.
        while (list.options.length) {
        // continue to remove the first option until no options remain.
        list.remove(0);
        }
         };

        function ClearForm(){
            var listsatuan=document.getElementById('mySelect');
            $("#kode_barang").val("");
            $("#nama_barang").val("");
            clearSelectList(listsatuan);
            $("#qty_barang").val("0");
        };

        function RemoveData(ctl){
            $(ctl).parents("tr").remove();
        };

        $('#mydata').on('click','.item_select',function(){
            var id=$(this).attr('data');
            $.ajax({
                type : "GET",
                url   : "<?php echo site_url('admin/barang_data/get_barang')?>",
                dataType : "json",
                data : {id:id},
                success: function(data){
                    $.each(data,function(barang_id, barang_nama, barang_sat1, barang_sat2, barang_sat3,barang_harga1,barang_harga2,barang_harga3){
                        $('[id="kode_barang"]').val(data.barang_id);
                        $('[id="nama_barang"]').val(data.barang_nama);
                        var listsatuan=document.getElementById('mySelect');
                        listsatuan.options[0]=new Option(data.barang_harga1 + '/' + data.barang_sat1,data.barang_harga1);
                        listsatuan.options[1]=new Option(data.barang_harga2 + '/' + data.barang_sat2,data.barang_harga2);
                        listsatuan.options[2]=new Option(data.barang_harga3 + '/' + data.barang_sat3,data.barang_harga3);
                        // PriceFormatForEdit();
                        $('#largeModal').modal('hide');
                    }); 
                }
            });
            return false;
        });

        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
            $('#mydata').DataTable();
        });

        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
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
    <script type="text/javascript">
            $("#kode_barang").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
    </script>  
</body>

</html>
