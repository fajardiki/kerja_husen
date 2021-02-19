<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<table>
		<tr>
			<th>Norm</th>
			<th>Nama</th>
			<th>Alamat</th>
		</tr>

		<?php
		$no=1;
		foreach ($tmp as $mp): ?>

		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $mp->nama ?></td>
			<td><?php echo $mp->alamat ?></td>

		</tr>

		<?php $no++ endforeach; ?>

	</table>
	<script type="text/javascript">
		window.print();
	</script>

</body>
</html>