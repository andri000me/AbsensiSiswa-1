<?php

$konek = mysqli_connect("localhost","root","","absensi");

$nis = $_POST['nis'];
$ax = $_POST['nama'];
$as = $_POST['alamat'];
$aa = $_POST['notelp'];
$ac = $_POST['jk'];
$j = $_POST['kelas'];

$foto = $_FILES['img']['name'];
$lcl = $_FILES['img']['tmp_name'];

$directory = "img/$foto";

$sini = move_uploaded_file($lcl,$directory);

$input = "INSERT INTO tb_siswa(nisn,nama_sis,no_telp,jk,alamat,foto,kelas) VALUES ('$nis','$ax','$aa','$ac','$as','$foto','$j')";

$hasil = mysqli_query($konek,$input);

if($hasil || $sini){
	header("location:inputsiswa.php");
}else{
	echo "GAGAL";
}


?>