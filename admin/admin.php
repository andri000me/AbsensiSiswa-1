<?php
	session_start();
	if(@$_SESSION['level'] == 'FFUKZ'){

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../asset/css/materialize.min.css">

</head>
<body style="background:url(../asset/img/admin.jpg);">
		
		<h3 class="center black-text" style="margin-top:100px;">SELAMAT DATANG ADMIN</h3><a href="../asset/log.php?op=out" style="float:right;width:20%;"><img src="../asset/img/logout.png" width="35px" height="30px" alt=""></a>
		
		<div class="row">
		<div class="container" style="margin-top:150px;">
			<div class="col s4">
				<img onclick="location.href='siswa/inputsiswa.php'" src="../asset/img/reading.png" alt="" width="250px">
				<h5 class="white-text center" style="background:black;width:60%;padding:5px 0px;margin:0px 40px;border-radius:5px;">Tambah Siswa</h5>
			</div>
			<div class="col s4">
				<img onclick="location.href='mapel/input.php'" src="../asset/img/notebook.png" width="250px" alt="">
				<h5 class="white-text center" style="background:black;width:94%;padding:5px 0px;margin:0px 5px;border-radius:5px;">Tambah Mata Pelajaran</h5>
			</div><div class="col s4">
				<img onclick="location.href='user/inputuser.php'" src="../asset/img/jadi.png" alt="" width="250px">
				<h5 class="white-text center" style="background:black;width:60%;padding:5px 0px;margin:0px 40px;border-radius:5px;">Tambah User</h5>
			</div>
		</div>
		</div>

	<script src="../asset/js/jquery-1.9.1.min.js"></script>
	<script src="../asset/js/materialize.min.js"></script>
</body>
</html>
<?php
}else{
		header("location:/Absensi Siswa/loginuser.php");
	}
?>