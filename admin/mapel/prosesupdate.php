<?php

$konek = mysqli_connect("localhost","root","","absensi");

$nis = $_POST['nis'];
$ax = $_POST['mapel'];
$j = $_POST['kelas'];
$guru = $_POST['guru'];
$jur = $_POST['jurusan'];

$oa = "UPDATE tb_mapel SET nama_pel = '$ax', kelas = '$j' , jurusan = '$jur' , guru = '$guru' WHERE id_mapel= '$nis'";

$ha = mysqli_query($konek,$oa);

if($ha){
	header("location:input.php");
}else{
	echo "GAGAL";
}

?>