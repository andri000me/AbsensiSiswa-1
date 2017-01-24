<?php
	session_start();
	if($_SESSION['wakil'] && @$_SESSION['level'] == 'VFXNV'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
	</style>
</head>
<body>
	<?php
	
	$konek = mysqli_connect("localhost","root","","absensi");
		
	$work = "SELECT * FROM pesan WHERE kelas = '$_SESSION[kelas]'";
	
	$hasil = mysqli_query($konek,$work);
	?>
				<?php
				
				while($jk = mysqli_fetch_array($hasil)){
					echo "
					$jk[nama_pengirim]
					$jk[isi]
					";
				}
				
				?>
	
	
	
</body>
</html>


<?php
}else{
		header("location:/belajarPHP/Absensi Siswa/login.php");
	}
?>