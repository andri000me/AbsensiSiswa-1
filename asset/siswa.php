<?php
	session_start();
	if($_SESSION['wakil'] && @$_SESSION['level'] == 'VFXNV'){

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>



<div class="over"></div>

<div class="row"  id="mainsiswa">
	<div class="col-md-12">
	<ul class="forakun">
		<li id="pesan"><i class="material-icons" style="font-size:35px;margin:20px 10px;color:white;">email</i></li>
		<li><a href="log.php?op=out"><img src="img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
	</ul>
		<div class="container">
			<img src="img/trUvE-sy.png" id="usr" width="300px" alt="">
			<h1 class="sambut">Selamat Datang di Absensi Siswa SMKN 13 Bandung</h1>
		</div>
		<div class="cik" onclick="location.href='../prosesabsen/index.php'">
			<a href=""></a>
		</div>
		<div class="cik1" onclick="location.href='../prosesabsen/data_absen.php'">
			<a href=""></a>
		</div>
	</div>
</div>

	
<div class="poo">
<?php
	
	$konek = mysqli_connect("localhost","root","","absensi");
		
	$work = "SELECT * FROM pesan WHERE kelas = '$_SESSION[kelas]'";
	
	$hasil = mysqli_query($konek,$work);
?>
<?php		
	while($jk = mysqli_fetch_array($hasil)){
?>
	<div class="pii">
		<h4 class="blue-text text-accent-3"><?php echo "$jk[nama_pengirim]";?></h4>
	</div>
	<div class="pee">
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

<div class="uoo">
	<ul>
		<a href=""><li class="iop">Kebijakan Privasi</li></a>
		<a href=""><li class="iop">Settings</li></a>
	</ul>
</div>
	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
            $("#pesan").click(function(){
        $(".poo").slideToggle("slow");
		$(".uoo").slideUp("slow");
    });
			
			$("#settings").click(function(){
        $(".uoo").slideToggle("slow");
		$(".poo").slideUp("slow");
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