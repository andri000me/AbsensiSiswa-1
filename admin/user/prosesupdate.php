<?php

$konek = mysqli_connect("localhost","root","","absensi");

$op = $_POST['id_user'];
$a = $_POST['nama'];
$c = $_POST['password'];

$oa = "UPDATE tb_user SET nama_user = '$a' , password = '$c' WHERE id_mapel= '$op'";

$ha = mysqli_query($konek,$oa);

if($ha){
	header("location:inputuser.php");
}else{
	echo "GAGAL";
}

?>