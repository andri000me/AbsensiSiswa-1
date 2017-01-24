<?php

$konek = mysqli_connect("localhost","root","","absensi");

$nis = $_POST['nis'];
$ax = $_POST['nama'];
$as = $_POST['alamat'];
$aa = $_POST['notelp'];
$ac = $_POST['jk'];
$j = $_POST['kelas'];

$oa = "UPDATE tb_siswa SET nama_sis = '$ax',alamat = '$as' , no_telp = '$aa' , jk = '$ac' , kelas = '$j' WHERE nisn = '$nis'";

$ha = mysqli_query($konek,$oa);

if($ha){
	header("location:inputsiswa.php");
}else{
	echo "GAGAL";
}

?>