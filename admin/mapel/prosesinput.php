<?php

$konek = mysqli_connect("localhost","root","","absensi");

$ax = $_GET['mapel'];
$as = $_GET['kelas'];
$aa = $_GET['jurusan'];
$ac = $_GET['guru'];

$input = "INSERT INTO tb_mapel(nama_pel,kelas,jurusan,guru) VALUES ('$ax','$as','$aa','$ac')";

$hasil = mysqli_query($konek,$input);

if($hasil){
	header("location:input.php");
}else{
	echo "GAGAL";
}


?>