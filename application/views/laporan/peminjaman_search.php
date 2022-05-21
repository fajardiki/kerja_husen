<style>
  .print-header {
    display: none;
  }

  @media print {
    .print-header {
      display: block;
    }
  }
</style>

<?php if($hasil_search->num_rows() > 0) { ?>
<table  id="myTable" class="table table-striped table-bordered">
    <h3 class="text-center print-header">LAPORAN PEMINJAMAN</h3>
    <br class="prin-header">
    <thead>
        <tr>
            <td>No.</td>
            <td>ID Transaksi</td>
            <td>Tanggal Pinjam</td>
            <td>Jatuh Tempo Pengembalian</td>
            <td>Tanggal Dikembalikan</td>
            <td>Status Pinjam</td>
            <td>Status Kembali</td>
            <td>Id Poli</td>
        </tr>
    </thead>
    <?php $no=0; foreach($hasil_search->result() as $row): $no++;?>
    <tr>
        <td><?php echo $no;?></td>
        <td><a class="show-modal" kode="<?php echo $row->id_transaksi ?>" href="#"><?php echo $row->id_transaksi;?></a></td>
        <td><?php echo $row->tanggal_pinjam;?></td>
        <td><?php echo $row->tanggal_kembali;?></td>
        <td><?php echo $row->tgl_pengembalian;?></td>
        <td><?php echo $row->status_pinjam; ?></td>
        <td id="col_kembali"><?php echo $row->status_pengembalian; ?></td>
        <td><?php echo $row->id_unit;?></td>
    </tr>
    <?php endforeach;?>
</table>

<?php }else{ ?>
<p class="text-center"><strong> ~ Maaf Data Belum Tersedia ~ </strong></p>
<?php } ?>

<script>
  var table = document.getElementById('myTable')
  
  for (var row of table.rows) {
    if(row.cells[6].textContent == "Tepat Waktu") {
      row.cells[6].style.backgroundColor = "#009900"
      row.cells[6].style.color = "white"
    } else if (row.cells[6].textContent == "Telat") {
      row.cells[6].style.backgroundColor = "#ff1a1a"
      row.cells[6].style.color = "white"
    }
  } 
</script>