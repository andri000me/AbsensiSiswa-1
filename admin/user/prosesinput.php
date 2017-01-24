<?php

$konek = mysqli_connect("localhost","root","","absensi");

$a = $_GET['nama'];
$b = $_GET['user'];
$c = $_GET['password'];
$d = $_GET['kelas1'];
$e = $_GET['kelas'];
$f = $_GET['jurusan'];
$g = $_GET['level'];

$input = "INSERT INTO tb_user(nama_user , username , password , kelas , kelas_mapel , jurusan , level) VALUES ('$a' , '$b' ,'$c' , '$d' , '$e' , '$f' , '$g')";

$hasil = mysqli_query($konek,$input);

if($hasil){
	header("location:inputuser.php");
}else{
	echo "GAGAL";
}


?>