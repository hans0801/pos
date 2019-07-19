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
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
            <table>
                <tr>
                    <th>Kode Barang</th>
                </tr>
                <tr>
                    <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>                     
                </tr>
                    <div id="detail_barang" style="position:absolute;">
                    </div>
            </table>
             </form>
             <script type="text/javascript">    
            
            function addRow(tableID) {

            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);

            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);

            var cell2 = row.insertCell(1);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
            cell2.appendChild(element3);


            var cell3 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.name = "txtbox[]";
            cell3.appendChild(element2);

            }



            function deleteRow(tableID) {
             try {
             var table = document.getElementById(tableID);
             var rowCount = table.rows.length;

             for(var i=0; i<rowCount; i++) {
             var row = table.rows[i];
             var chkbox = row.cells[0].childNodes[0];
             if(null != chkbox && true == chkbox.checked) {
             table.deleteRow(i);
             rowCount--;
             i--;
             }


             }
              }catch(e) {
              alert(e);
             }
            }

            </script>

            <input onclick="addRow('dataTable')" type="button" value="Tambah" />

            <input onclick="deleteRow('dataTable')" type="button" value="Hapus" />

            <div style="padding: 20px 0px 0px 0px;">
            <table id="dataTable" style="border-bottom: 1px solid #F00; border-left: 1px solid #F00; border-right: 1px solid #F00; border-top: 1px solid #F00; width: 350pxpx;">
            <tr>
            <td><input name="chk" type="checkbox" /></td>
           <td> <input type="text" /> </td>
        <td> <input type="text" /> </td>
            </tr>
        </table>
</div>

            <!-- <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;" id="TabOrder">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Diskon(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     <td>
                     <input type="text" name="TxtNo" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtBarangId" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtBarangNama" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtSatuan" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtHarga" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtDiskon" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtQty" class="form-control" />
                     </td>
                     <td>
                     <input type="text" name="TxtSubTotal" class="form-control" />
                     </td>
                     <button class="btn" data-dismiss="modal" aria-hidden="true">Hapus</button>
                    </tr>

                    <!-- <?php $i = 1; ?>
                    <?php foreach ($this->cart->contents() as $items): ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <tr>
                         <td><?=$items['id'];?></td>
                         <td><?=$items['name'];?></td>
                         <td style="text-align:center;"><?=$items['satuan'];?></td>
                         <td style="text-align:right;"><?php echo number_format($items['amount']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['disc']);?></td>
                         <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                         <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                        
                         <td style="text-align:center;"><a href="<?php echo base_url().'admin/penjualan/remove/'.$items['rowid'];?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?> -->
                </tbody>
            </table> -->
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
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <!-- <th style="width:120px;">Kode Barang</th> -->
                            <th style="width:240px;">Nama Barang</th>
                            <th style="width:120px;">Harga Jual Barang / Satuan </th>
                            <th style="width:60px;">Qty </th>
                            <!-- <th>Satuan</th>
                            <th style="width:100px;">Harga (Eceran)</th>
                            <th>Stok</th> -->
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data->result_array() as $a):
                            $no++;
                            // $id=$a['barang_id'];
                            $nm=$a['barang_nama'];
                            $sat1=$a['barang_sat1'];
                            $sat2=$a['barang_sat2'];
                            $sat3=$a['barang_sat3'];
                            $har1=$a['barang_harga1'];
                            $har2=$a['barang_harga2'];
                            $har3=$a['barang_harga3'];
                            // $satuan=$a['barang_satuan'];
                            // $harpok=$a['barang_harpok'];
                            // $harjul=$a['barang_harjul'];
                            // $harjul_grosir=$a['barang_harjul_grosir'];
                            // $stok=$a['barang_stok'];
                            // $min_stok=$a['barang_min_stok'];
                            // $kat_id=$a['barang_kategori_id'];
                            // $kat_nama=$a['kategori_nama'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <!-- <td><?php echo $id;?></td> -->
                            <td><?php echo $nm;?></td>
                            <td>
                            <select name="HarSat" id="HarSat" class="form-control">
                                <option value="0">-PILIH-</option>
                                <option value="<?php echo number_format($har1);?>"><?php echo 'Rp' .number_format($har1); echo '/'; echo $sat1;?></option>
                                <option value="<?php echo number_format($har2);?>"><?php echo 'Rp' .number_format($har2); echo '/'; echo $sat2;?></option>
                                <option value="<?php echo number_format($har3);?>"><?php echo 'Rp' .number_format($har3); echo '/'; echo $sat3;?></option>
                            </select>
                            </td>
                            <td><input name="TxtQty" id="TxtQty" class="form-control" type="text" style="width:60px;text-align:center;" placeholder="0" required>
                            </td>
                            <!-- <td style="text-align:center;"><?php echo $satuan;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                            <td style="text-align:center;"><?php echo $stok;?></td> -->
                            <td style="text-align:center;">
                            <form action="<?php echo base_url().'admin/penjualan/add_to_cart'?>" method="post">
                            <!-- <input type="hidden" name="kode_brg" value="<?php echo $id?>">
                            <input type="hidden" name="nabar" value="<?php echo $nm;?>">
                            <input type="hidden" name="satuan" value="<?php echo $satuan;?>">
                            <input type="hidden" name="stok" value="<?php echo $stok;?>">
                            <input type="hidden" name="harjul" value="<?php echo number_format($harjul);?>">
                            <input type="hidden" name="diskon" value="0">
                            <input type="hidden" name="qty" value="1" required> -->
                                <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                            </form>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>

        

        <!-- ============ MODAL HAPUS =============== -->
        

        <!--END MODAL-->

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
        function SelectedData()
        {

        }

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
        } );
    </script>
    <script type="text/javascript">
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
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/penjualan/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>
    
    
</body>

</html>
