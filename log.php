<?php

session_start();

$us = $_POST['usr'];
$pw = $_POST['pw'];
$op = $_GET['op'];

if($op == "in"){
	
	$yu = mysqli_connect("localhost","root","","absensi");
	
	$ui = "SELECT * FROM tb_user WHERE username = '$us' AND password = '$pw'";
	
	$eks = mysqli_query($yu,$ui);
	$dt = mysqli_fetch_array($eks);
	$id = $dt[0];
	$ck = mysqli_num_rows($eks);
	
	if($ck > 0){
		$_SESSION['mapel'] = $dt['kelas_mapel'];
		$_SESSION['kelas'] = $dt['kelas'];
		$_SESSION['jurusan'] = $dt['jurusan'];
		$_SESSION['user'] = $dt['username'];
		$_SESSION['level'] = $dt['level'];
		$_SESSION['nama'] = $dt['nama_user'];
		if($dt['level'] == 'VFXNV'){ /*wakil*/
			$_SESSION['wakil'] = $id;
			header("location:prosesabsen");
		}else if($dt['level'] == 'WKUXQ'){ /*piket*/
			$_SESSION['piket'] = $id;
			header("location:_sekolah/piket");
		}else if($dt['level'] == 'FFUKZ'){ /*admin*/
			header("location:");
		}else if($dt['level'] == 'MMPUBPZDV'){ /*walikelas*/
			$_SESSION['walikelas'] = $id;
			header("location:_sekolah/walikelas");
		}
		
	}
	
}else if($op == "out"){
	
	unset($_SESSION['user']);
	unset($_SESSION['level']);
	header("location:/Absensi Siswa/loginuser.php");
}

?>