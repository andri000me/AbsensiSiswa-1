<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<?php
	
	$konek = mysqli_connect("localhost","root","","tb_absensis");
	
	$tmp1 = "SELECT * FROM siswa";
	$mpt2 = "SELECT * FROM mapel";
	
	
	$hasil2 = mysqli_query($konek,$tmp1);
	$hasil1 = mysqli_query($konek,$mpt2);
	
	$data = mysqli_fetch_array($hasil2);
	$data1 = mysqli_fetch_array($hasil1)
		
	?>
	
	<form method="get" action="prosesabsen.php">
	
	<table border="1">
		<th>Nama</th>
		<th>Mapel</th>
		<th>Keterangan</th>
		
		<tr>
			<td><input type="hidden" name="nm" value="<?php echo $data['nisn']; ?>"><?php echo $data['nama_sis']; ?></td>
			<td><input type="hidden" name="mp" value="<?php echo $data1['id_mapel']; ?>"><?php echo $data1['nama_mapel']; ?></td>
			<td><input type="radio" name="k" value="sakit"> sakit <br>
				<input type="radio" name="k" value="izin"> izin
			<br>
				<input type="radio" name="k" value="hadir"> hadir
			<br>
				<input type="radio" name="k" value="dispen">dispen
			</td>
		</tr>
		
	</table>
	
	</form>
	
</body>
</html>