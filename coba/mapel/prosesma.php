<?php
//koneksi
$konek = mysqli_connect("localhost", "root", "", "tb_absensis");

$na = $_GET['nama'];

$in = "INSERT INTO mapel(nama_mapel) VALUES ('$na')";

$hasil = mysqli_query($konek,$in);

if($hasil){
	echo "ber";
}else{
	echo "ga";
}

?>