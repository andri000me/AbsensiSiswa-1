<?php
session_start();

$konek = mysqli_connect("localhost","root","","absensi");

$ks = "SELECT * FROM tb_siswa WHERE kelas = '$_SESSION[kelas]'";

$ui = mysqli_query($konek,$ks);
$kaa = mysqli_num_rows($ui);

$jk = $kaa;
for($i=0;$i<$jk;$i++){
$ya = $_POST['nisn'.$i];
$yaa = $_POST['ket'.$i];
$aca = $_POST['dt'];
$da = $_POST['mapel'];
$xx = "INSERT INTO hadir(nisn,keterangan,tanggal,id_mapel) VALUES ('$ya' ,'$yaa','$aca','$da')";

$hasil = mysqli_query($konek,$xx);
}
if($hasil){
	echo "berhasil";
}else{
	echo "gagal";
}

?>