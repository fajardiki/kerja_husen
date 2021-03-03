<style>
    .col-lg-6 {
        width: 150px;
    }

    .table-header {
        margin-bottom: 20px;
    }

    .table-deatail {
        background-color: black;
    }
</style>
<div class="row">
    <div class="col-lg-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                <?php echo $title;?>
            </div>
            <div class="panel-body">
                <table class="table-header">
                    <tr>
                        <td><label class="col-lg-6">ID Transaksi</label></td>
                        <td> : <?php echo $pinjam['id_transaksi'];?></td>
                    </tr>
                    <tr>
                        <td><label class="col-lg-6">Tanggal Pinjam</label></td>
                        <td> : <?php echo $pinjam['tanggal_pinjam'];?></td>
                    </tr>
                    <tr>
                        <td><label class="col-lg-6">Nama Unit</label></td>
                        <td> : <?php echo $pinjam['id_unit'];?></td>
                    </tr>
                    <tr>
                        <td><label class="col-lg-6">Status</label></td>
                        <td> : <?php echo $pinjam['status_pinjam'];?></td>
                    </tr>
                </table>

                <!-- Koding Di bawah ketika di print berantakan, karena halaman ini tidak menggunakan bootsrap -->
                <!-- <div class="col-md-7">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <label class="col-lg-6">ID Transaksi</label>
                            : <?php echo $pinjam['id_transaksi'];?>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6">Tanggal Pinjam</label>
                            : <?php echo $pinjam['tanggal_pinjam'];?>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-lg-6">Nama Unit</label>
                            : <?php echo $pinjam['id_unit'];?>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-6">Status</label>
                            : <?php echo $pinjam['status_pinjam'];?>
                        </div>
                    </div>
                </div> -->

                <table class="table table-striped table-bordered" id="table-deatail">
                    <thead>
                        <tr>
                            <td>No RM</td>
                            <td>Nama Pasien</td>
                            <td>Alamat</td>
                        </tr>
                    </thead>
                    <?php foreach($detailpinjam as $row):?>
                    <tr>
                        <td><?php echo $row->norm;?></td>
                        <td><?php echo $row->nama;?></td>
                        <td><?php echo $row->alamat;?></td>
                    </tr>
                    <?php endforeach;?>
                </table>

                <!-- <p class="text-right">
                <a href="" ><button  class="btn btn-primary"> Kembali</button></a></p> -->
            </div> <!-- end panel body -->
        
        </div><!-- end panel -->

    </div> <!-- end lg -->
</div> <!-- end row -->



<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>



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

    //alert('');

    //load datatable
    $('#dataTables-example').DataTable({
        responsive: true
    });


   


    
    

}); //end document
</script>



