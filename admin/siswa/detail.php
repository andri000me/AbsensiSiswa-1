<?php
$no = $_GET['no'];

$konek = mysqli_connect("localhost","root","","absensi");

$work = "SELECT * FROM tb_siswa WHERE nisn = '$no'";

$hasil = mysqli_query($konek,$work);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto'];

if($foto == NULL){
	$foto = "user.png";
}else{
	$foto = $data['foto'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<table>
		<tr>
			<td><?php echo $data['nisn']; ?></td>
			<td><?php echo $data['nama_sis']; ?></td>
			<td><?php echo "<img src ='img/$foto' width=100 height=100>" ?></td>
			<td><?php echo $data['alamat'];?></td>
			<td><?php echo $data['no_telp'];?></td>
			<td><?php echo $data['jk'];?></td>
		</tr>
	</table>
	
</body>
</html>