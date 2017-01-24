<?php
	session_start();
	if($_SESSION['wakil'] && @$_SESSION['level'] == 'WKUXQ'){

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
<body style="background:url(../../asset/img/piket.jpg);">
	
<div class="navigasi">
	<img src="../../asset/img/piket.png" alt="" style="margin:-60px 0px;">
	<ul class="forakun" style="width:23%;">
		<li class="nama_kelas"><a href="" class="white-text">PIKET</a></li>
		<li><a href="../../asset/log.php?op=out"><img src="../../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
	</ul>
	
</div>	

<div class="row" style="margin-top:100px; height:650px;">
	<div class="col m12">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="post">
      <div class="row" id="awal" style="background: rgba(0, 0, 0, 0.6);">
      <div class="container">
		<h4 class="center white-text"><b>SMKN 13 BANDUNG</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama siswa" id="first_name" type="text" class="validate white-text" name="nama">
          <label for="first_name" class="white-text">Nama</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="(example: XI RPL 1 (use capital))" id="first_name" type="text" name="kls" class="validate white-text">
          <label for="first_name" class="white-text">Kelas</label>
        </div>
        <div class="input-field col s12">
        <input type="text" class="datepicker white-text" name="dt">
          <label for="first_name" class="white-text">Tanggal</label>
        </div>
        <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea white-text" length="120" name="isi"></textarea>
            <label for="textarea1" class="white-text">Keterangan</label>
          </div>
          <div class="col s12">
			<input type="submit" class="right tmb_submit" name="send">
          </div>
      </div>
	</div>
    </form>
	</div>
</div>	
	</div>
</div>

<?php
		$konek = mysqli_connect("localhost","root","","absensi");
		
		if(@$_POST['send']){
			$isi = $_POST['isi'];
			$kls = $_POST['kls'];
			$yu = $_POST['dt'];
			$yu1 = $_POST['nama'];
			$in = "INSERT INTO pesan(nama_pengirim , kelas , isi , tanggal , nama_siswa) VALUES ('$_SESSION[nama]', '$kls' , '$isi' , '$yu' , '$yu1')";
			
			$hasil = mysqli_query($konek,$in);
			if($hasil){
				header ("location:../../_sekolah/piket/index.php");
			}else{
				echo "gagal";
			}

		}
		
	?>

<div class="liat">
<div class="kl white-text">
	<?php
	
		$d = "SELECT * FROM pesan WHERE nama_pengirim = '$_SESSION[nama]'";
		$iu = mysqli_query($konek,$d);
		
	while($data = mysqli_fetch_array($iu)){
	?>	
	Nama : <?php echo "$data[nama_siswa]"; ?> <br>	
	Kelas : <?php echo "$data[kelas]"; ?><br>	
	Tanggal : <?php echo "$data[tanggal]"; ?><br>	
	
	<div class="isinyaa" style="border-radius:5px;border: 4px solid #336B87;">
	<p style="margin:10px 10px;">
		<?php echo $data['isi']; ?>
	</p>
	</div>
	<br>
	<?php	
	}
	
	?>
	
</div>
	
</div>

	
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
			
	 $('input#input_text, textarea#textarea1').characterCounter();
			
			$("#settings").click(function(){
        $(".isisettings").slideToggle("slow");
		$(".isipesan").slideUp("slow");
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