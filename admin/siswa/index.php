<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<a href="inputsiswa.php">INPUT</a>

<?php

$konek = mysqli_connect("localhost","root","","absensi");

$tampil = "SELECT * FROM tb_siswa";

$hasil = mysqli_query($konek,$tampil);
?>


<table border="1">
	<tr>
		<th>NISN</th>
		<th>NAMA</th>
		<th>FOTO</th>
		<th>NO TELPON</th>
		<th>JK</th>
		<th>Alamat</th>
		<th>Kelas</th>
		<th>ACTION</th>
	</tr>


<?php

	while($data=mysqli_fetch_array($hasil)){
		echo "
			<tr>
				<td>$data[nisn]</td>
				<td>$data[nama_sis]</td>
				<td><img src = 'img/".$data['foto']."' width=100px height=100px></td>
				<td>$data[no_telp]</td>
				<td>$data[jk]</td>
				<td>$data[alamat]</td>
				<td>$data[kelas]</td>
				<td><a href=\"delete.php?no=$data[nisn]\">DELETE</a> | <a href=\"update.php?no=$data[nisn]\">UPDATE</a> | <a href=\"detail.php?no=$data[nisn]\">DETAIL</a></td>
			</tr>
		
		";
	}
	
?>

</table>
	
</body>
</html>