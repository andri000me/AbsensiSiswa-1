<?php
//koneksi
$konek = mysqli_connect("localhost", "root", "", "tb_absensis");

$ni = $_GET['nisn'];
$na = $_GET['nama'];
$jk = $_GET['ket'];

$in = "INSERT INTO siswa(nisn,nama_sis,jk) VALUES ('$ni','$na','$jk')";

$hasil = mysqli_query($konek,$in);

if($hasil){
	echo "ber";
}else{
	echo "ga";
}

?>