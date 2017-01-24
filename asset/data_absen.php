<?php
	session_start();
	if($_SESSION['wakil'] && @$_SESSION['level'] == 'VFXNV'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body style="background:url(../asset/img/20161116_071018.jpg)no-repeat;background-size:cover;">
	
<div class="navigasi">
	<img src="../asset/img/cik2.png" alt="" style="margin:-60px 0px;">
	<ul class="forakun">
		<li class="nama_kelas"><a href="../asset/siswa.php" class="white-text">Home</a></li>
		<li class="nama_kelas"><a href="../prosesabsen/index.php" class="white-text">Absen</a></li>
		<li id="pesan"><i class="material-icons" style="font-size:35px;margin:20px 10px;color:white;">email</i></li><li><a href="../asset/log.php?op=out"><img src="../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
</ul>
	
</div>


<div class="container" id="absen">
	<div class="dataabsen">
		<form action="" style="margin:0 auto; width:20%;" method="post">
			<input type="text" placeholder="Masukan Tanggal" class="datepicker" name="dt" style="color:white;">
			
			<input type="submit" class="right tmb_submit">
		</form>
		
		<?php
		
	$konek = mysqli_connect("localhost","root","","absensi");
		
	$sa = @$_POST['dt'];
	$yu = $_SESSION['kelas'];
	
	$work = "SELECT tb_siswa.nama_sis,tb_siswa.nisn,tb_siswa.kelas,hadir.tanggal,hadir.keterangan,hadir.id_absen,tb_mapel.id_mapel,tb_mapel.nama_pel FROM tb_siswa , hadir , tb_mapel WHERE tb_siswa.nisn = hadir.nisn AND tb_mapel.id_mapel = hadir.id_mapel AND tanggal = '$sa' AND tb_siswa.kelas = '$yu' AND tb_mapel.kelas = '$_SESSION[mapel]' AND tb_mapel.jurusan = '$_SESSION[jurusan]' AND keterangan IN ('izin' , 'sakit' , 'alfa' , 'dispen')";
	
	$hasil = mysqli_query($konek,$work);
	?>
		
		<br>
		<br>
		<br>
		<br>
		
		<table class="responsive-table"  style="color:white">
			<tr>
				<th class="center">Nama</th>
				<th class="center">Mata Pelajaran</th>
				<th class="center">Keterangan</th>
			</tr>
	<?php
		$bismillah = "SELECT tb_siswa.nama_sis,tb_siswa.nisn,tb_siswa.kelas,hadir.tanggal,hadir.keterangan,hadir.id_absen,tb_mapel.id_mapel,tb_mapel.nama_pel FROM tb_siswa , hadir , tb_mapel WHERE tb_siswa.nisn = hadir.nisn AND tb_mapel.id_mapel = hadir.id_mapel AND tanggal = '$sa' AND tb_siswa.kelas = '$yu' AND tb_mapel.kelas = '$_SESSION[mapel]' AND tb_mapel.jurusan = '$_SESSION[jurusan]' AND keterangan = ''";
		
		$tamsis = "SELECT foto,nama_sis,nisn FROM tb_siswa WHERE kelas = '$_SESSION[kelas]' ";

		$hasilsis = mysqli_query($konek,$tamsis);
		$ext = mysqli_query($konek,$bismillah);
		$jmlsis = mysqli_num_rows($hasilsis);
		$jmlhadir = mysqli_num_rows($ext);
		if($jmlhadir == $jmlsis){
			echo "
				<tr>
					<td colspan='3'><center>HADIR SEMUA</center></td>
				</tr>
			";
		}else{
	?>
							
			<?php
	while($data1=mysqli_fetch_array($hasil)){
	echo
		"
		<tr>
			<td class='center'>$data1[nama_sis]</td>
			<td class='center'>$data1[nama_pel]</td>
			<td class='center'>$data1[keterangan]</td>
		</tr>
		";
	}
	?>
	<?php
		}
	?>	
		</table>

	</div>
</div>
	
<div class="isipesan">
	<?php
	
	$konek = mysqli_connect("localhost","root","","absensi");
		
	$work = "SELECT * FROM pesan WHERE kelas = '$_SESSION[kelas]'";
	
	$hasil = mysqli_query($konek,$work);
?>
<?php		
	while($jk = mysqli_fetch_array($hasil)){
?>
	<div class="sender">
		<h6 class="blue-text text-accent-3"><?php echo "$jk[nama_pengirim]";?></h6>
	</div>
	<div class="konten">
		<p>
			<?php echo "$jk[nama_siswa]"; ?>
		</p>
		<p>
			<?php echo "$jk[isi]";?>
		</p>
		<hr style="background:white;">
	</div>
	<?php }	?>
</div>

	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
			
    $('select').material_select();
		$("#pesan").click(function(){
        $(".isipesan").slideToggle("slow");
		$(".isisettings").slideUp("slow");
    });
			
			
            
		});
	</script>
	
</body>
</html>

<?php
}else{
		header("location:/Absensi Siswa/loginuser.php");
	}
?>