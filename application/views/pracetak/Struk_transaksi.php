<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="<?php echo base_url(); ?>template/backend/sbadmin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="text-center">TRACER</h1>

    <?php foreach ($tmp as $val) {
      $no_rm = $val->norm;
      $nama = $val->nama;
      $poli_peminjaman = $val->unit;
      $tanggal_pinjam = $val->tanggal_pinjam;
    } ?>
    <table>
      <tbody>
        <tr>
          <td>No. RM</td>
          <td> : <?php echo $no_rm; ?></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td> : <?php echo $nama; ?></td>
        </tr>
        <tr>
          <td>Poli Peminjaman</td>
          <td> : <?php echo $poli_peminjaman; ?></td>
        </tr>
        <tr>
          <td>Tanggal Pinjam</td>
          <td> : <?php echo $tanggal_pinjam; ?></td>
        </tr>
      </tbody>
    </table>
    
</body>
</html>