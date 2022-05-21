<div class="row">
    <div class="col-lg-12"><br />
        <ol class="breadcrumb">
            <li><a  href="<?php echo base_url('telat_pengembalian'); ?>">Transaksi</a></li>
            <li class="active">Telat Pengembalian</li>
        </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <?php echo $title;?>
      </div>
      <div class="panel-body">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
          <thead>
            <tr>
                <td>No.</td>
                <td>ID Transaksi</td>
                <td>Tanggal Pinjam</td>
                <td>Tanggal Pengembalian</td>
                <td>Tanggal Diingatkan</td>
                <!-- <td class="aksi">Aksi</td> -->
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($data as $row) {
            ?>
            <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $row['id_transaksi'];?></td>
                <td><?php echo $row['tanggal_pinjam'];?></td> 
                <td><?php echo $row['tanggal_kembali'];?></td>
                <td><?php echo $row['tanggal_diingatkan'];?></td>
                <!-- <td class="aksi text-center">
                  <?php //if ($row['is_telat'] == 1) : ?>
                    <button class="btn btn-success btn-xs" disabled>Ingatkan</button>
                  <?php //elseif ($row['is_telat'] == 0) : ?>
                    <a href="<?php //echo base_url('telat_pengembalian/ingatkan/'.$row['id_transaksi']) ?>"><input type="submit" class="edit btn btn-success btn-xs" name="Ingatkan" value="Ingatkan"></a>
                  <?php //endif; ?>
                </td> -->
            </tr>
            <?php $no++; } ?>    
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/js/bootstrap.min.js"></script>


<!-- DataTables JavaScript -->
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/backend/sbadmin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
  $(document).ready(function() {
      $('#dataTables-example').DataTable({
          responsive: true
      });
  });
</script>


