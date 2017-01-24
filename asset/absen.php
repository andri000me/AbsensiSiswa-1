<?php
	session_start();
	if($_SESSION['wakil'] && @$_SESSION['level'] == 'VFXNV'){

?>

<?php
	
	$konek = mysqli_connect("localhost","root","","absensi");
	
	$mapel = "SELECT id_mapel,nama_pel FROM tb_mapel WHERE kelas='$_SESSION[mapel]' AND jurusan='$_SESSION[jurusan]'";
	
	$tamsis = "SELECT foto,nama_sis,nisn FROM tb_siswa WHERE kelas = '$_SESSION[kelas]' ";
	
	$hasil = mysqli_query($konek,$mapel);
	$hasilsis = mysqli_query($konek,$tamsis);
	
	$data=mysqli_fetch_array($hasilsis);
	
	$data['nisn'];
		
	$_SESSION['nisn'] = $data['nisn'];
	
	$jml = mysqli_num_rows($hasilsis);
		$_SESSION['dataa'] = $jml;
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
	<img src="../asset/img/cik.png" alt="" style="margin:-60px 0px;">
	<ul class="forakun">
		<li class="nama_kelas"><a href="../asset/siswa.php" class="white-text">Home</a></li>
		<li class="nama_kelas"><a href="../prosesabsen/data_absen.php"  class="white-text">Data</a></li>
		<li id="pesan"><i class="material-icons" style="font-size:35px;margin:20px 10px;color:white;">email</i></li><li><a href="../asset/log.php?op=out"><img src="../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
</ul>
	
</div>


<div class="row" id="formu">
	<div class="col m12">
		<div class="container" style="background:black;margin-top:90px;border-radius:10px;">
			<h4 class="black-text center">Masukkan Data Absen</h4>
		<form action="../asset/proses.php" method="post">
		<div class="row">
		<div class="col m3"></div>
			<div class="col m3">
					<input type="text" placeholder="Masukan Tanggal" class="datepicker white-text" name="dt">
			</div>
			<div class="col m3">
					<select name="mapel" class="white-text" id="">
						<?php
							foreach($hasil as $mapel){
								echo "<option value=$mapel[id_mapel]>$mapel[nama_pel]</option>";
							}
						?>
					</select>
			</div>
		<div class="col m3"></div>
		</div>
			<div class="row">
			
			<div class="col m12" style="height:500px;overflow-y:scroll;overflow-x:hidden; ">
				
				<?php
				$jk = $jml;
				for($i=0;$i<$jml;$i++){
				?>
				<div class="col m4">
				<?php
		
			$yu = @$_SESSION['nisn']+$i;
			$ioo = "SELECT foto ,jk FROM tb_siswa WHERE nisn = '$yu'";
			
			$ko = mysqli_query($konek,$ioo);
			$ty = mysqli_fetch_array($ko);
			$foto = $ty['foto'];
					
					if($foto == NULL){
						if($ty['jk'] == "P"){
							$foto = "Perem.png";
						}else if($ty['jk'] == "L"){
							$foto = "Laki.png";
						}
					}else{
						$foto = $data['foto'];
					}
			
			echo "<img src = '/Absensi Siswa/admin/siswa/img/".$foto."' width='200px' height='100px' class='circle responsive-img center'>";
			
		?>
					<input type="hidden" name="nisn<?php echo $i; ?>" value="<?php echo $data['nisn']+$i; ?>"><?php 
			$sa = @$data[nisn]+$i;
			$jkp = "SELECT nama_sis FROM tb_siswa WHERE nisn = '$sa'";
			
			$hs = mysqli_query($konek,$jkp);
			$d = mysqli_fetch_array($hs);
			
			echo "<h5 class='center white-text'>$d[nama_sis]</h5>";
		?>				
						<p style="font-size=20%;">
						  <input name="ket<?php echo $i; ?>" type="radio" id="test1<?php echo $i; ?>" value="izin"/>
						  <label class="white-text" for="test1<?php echo $i; ?>">Izin</label>
						</p>
						<p>
						  <input name="ket<?php echo $i; ?>" type="radio" id="test2<?php echo $i; ?>" value="sakit"/>
						  <label class="white-text" for="test2<?php echo $i; ?>">Sakit</label>
						</p>
						<p>
						  <input name="ket<?php echo $i; ?>" type="radio" id="test3<?php echo $i; ?>" value="alfa"/>
						  <label class="white-text" for="test3<?php echo $i; ?>">Alfa</label>
						</p>
						<p>
						  <input name="ket<?php echo $i; ?>" type="radio" id="test4<?php echo $i; ?>" value="dispen"/>
						  <label class="white-text" for="test4<?php echo $i; ?>">Dispen</label>
						</p>
				</div>
			<?php
		}
			?>
			</div>
			</div>
			<input type="submit" class="right tmb_submit">
			</form>
		</div>
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