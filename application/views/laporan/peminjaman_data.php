<style>
    div#loader {
        text-align: center;
        z-index: 9999;
    }
</style>
<div class="row">
    <div class="col-lg-12"><br />
       
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('laporan/peminjaman'); ?>">Laporan</a></li>
            <li class="active">Peminjaman</li>
        </ol>

    </div>
    <!-- /.col-lg-12 -->
</div>

<div class="row" id="reloadscope">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
               <br/>
               <div class="form-horizontal">
                    <div class="form-group">
                        <label class="col-lg-2">Tanggal Awal</label>
                        <div class="col-lg-5">
                            <input type="text" id="tanggal1" class="form-control">
                        </div>
                    </div> 

                    <div class="form-group">
                        <label class="col-lg-2">Tanggal Akhir</label>
                        <div class="col-lg-5">
                            <input type="text" id="tanggal2" class="form-control">
                        </div>
                        <div class="col-lg-4">
                            <button id="tampilkan" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Tampilkan</button>
                        </div>
                    </div>    
               
               </div><br />
               <div id="loader"></div>
               <div id="tampil"></div>

               <button class="btn btn-warning" onclick="cetak('tampil')">Cetak</button>
            </div> <!-- end panel body -->

            <div class="panel-footer">
                <p ><i class="tgl_sama text-danger"></i></p>
            </div>

        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->

<!-- Modal Cari Berkas -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div id="cetakscope">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><strong>Detail Peminjaman</strong></h4>
            </div>
            <div class="modal-body"><br />
                <!--<label class="col-lg-4 control-label">Cari Nama Nasabah</label>-->
                <div id="tampildetail"></div>
            </div>
        </div>
        <br /><br />
        <div class="modal-footer">
            <a href="#" id="cetak" class="btn btn-primary" onclick="cetak('cetakscope')">Cetak</a>
            <a href="#" id="closeModal" class="btn btn-danger" onclick="closeModal()">Close</a>
        <!--<button type="button" class="btn btn-primary" id="konfirmasi">Hapus</button>-->
        </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- End Modal Cari Berkas -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Datepicker -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/js/bootstrap-datepicker.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/dist/js/sb-admin-2.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>

$(document).ready(function() {
    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });


    //datepicker
    $("#tanggal1").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal2").datepicker({
        format:'yyyy-mm-dd'
    });
    
    $("#tanggal").datepicker({
        format:'yyyy-mm-dd'
    });

    //get data via ajax 
    $("#tampilkan").click( $tampilkan = function(){

        var tanggal1 = $("#tanggal1").val();
        var tanggal2 = $("#tanggal2").val();

        if(tanggal1 == "" && tanggal2 == "") {
            $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

            $.ajax({
                url:"<?php echo site_url('laporan/cari_pinjaman');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    // console.log(hasil);
                    $("#tampil").html(hasil);

                    $('#loader').html("").hide();
                }
            })
                    //  $('#loader').html("").hide();
        } else if(tanggal1 == "") {
            alert("Silahkan isi periode tanggal awal")
            $("#tanggal1").focus();
            return false;
        } else if (tanggal2 == "") {
            alert("Silahkan isi periode tanggal akhir")
            $("#tanggal2").focus();
            return false;
        } else {
            $('#loader').html('<img src="<?php echo base_url('assets/img/loader/loader1.gif') ?>"> ');

            $.ajax({
                url:"<?php echo site_url('laporan/cari_pinjaman');?>",
                type:"POST",
                data:"tanggal1="+tanggal1+"&tanggal2="+tanggal2,
                cache:false,
                success:function(hasil){
                    // console.log(hasil);
                    $("#tampil").html(hasil);

                    $('#loader').html("").hide();
                }
            })
        }
        
       
    })
    $tampilkan();


    //end #tampilkan
    

     $('body').on('click', '.show-modal', function(){
        
        var id_transaksi = $(this).attr("kode");
        //alert(id_transaksi);        
        // $("#myModal3").modal("show");
        $.ajax({
                url:"<?php echo site_url('laporan/detail_pinjam');?>",
                type:"POST",
                data:"id_transaksi="+id_transaksi,
                cache:false,
                success:function(hasil){
                    //console.log(hasil);
                    
                    $("#tampildetail").html(hasil);
                    $("#myModal3").modal("show");
                    //  $('#loader').html("").hide();
                }
        })
     
     });
    

}); //end document
</script>


<script>
    function cetak(el) {
        console.log(el)
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
        setTimeout(function() {
            location.reload();
        }, 1000);
    }

    function closeModal() {
        console.log('test')
        $("#myModal3").modal('hide')
    }
</script>


