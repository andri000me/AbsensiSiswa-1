<?php
	session_start();
	if(@$_SESSION['walikelas'] && @$_SESSION['level'] == 'MMPUBPZDV'){

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
<body style="background:url(http://2.bp.blogspot.com/-fozUOViWqJs/UFy5Mv-l3PI/AAAAAAAAALI/ddfXly5OD6o/s1600/240420112589.jpg)no-repeat;background-size:cover;">
	
<div class="navigasi">
	<img src="../../asset/img/walikelas.png" alt="" style="margin:-60px 0px;">
	<ul class="forakun" style="width:15%;"><li><a href="../../asset/log.php?op=out"><img src="../../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
	</ul>
	
</div>
		
 <div class="row" style="margin-top:150px;">
   <div class="container">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s6"><a href="#test1">Input Keterangan Siswa</a></li>
        <li class="tab col s6"><a class="active" href="#test2">Data Absen</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="background: rgba(0, 0, 0, 0.7);">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="post">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Kirim Pesan</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama siswa" id="first_name" type="text" class="validate" name="nama">
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field col s12">
        <input type="text" class="datepicker" name="dt">
          <label for="first_name">Tanggal</label>
        </div>
        <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" length="120" name="isi"></textarea>
            <label for="textarea1">Keterangan</label>
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
    
    <?php
		$konek = mysqli_connect("localhost","root","","absensi");
		
		if(@$_POST['send']){
			$isi = $_POST['isi'];
			$yu = $_POST['dt'];
			$yu1 = $_POST['nama'];
			$in = "INSERT INTO pesan(nama_pengirim , kelas , isi , tanggal , nama_siswa) VALUES ('$_SESSION[nama]', '$_SESSION[kelas]' , '$isi' , '$yu' , '$yu1')";
			
			$hasil = mysqli_query($konek,$in);
			if($hasil){
				header ("location:../../_sekolah/walikelas/index.php");
			}else{
				echo "gagal";
			}

		}
		
	?>
    
    <div id="test2" class="col s12" style="background: rgba(0, 0, 0, 0.7);height:500px;overflow-y:scroll;overflow-x:hidden;">
		<form action="" style="margin:0 auto; width:20%;" method="post">
			<input type="text" placeholder="Masukan Tanggal" class="datepicker white-text" name="dt">
			
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
		
		<table class="responsive-table"  style="color:#90AFC5;">
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
  </div>
  
  <div class="isisettings" style="right:50px;">
	<ul>
		<a href=""><li class="liset">Kebijakan Privasi</li></a>
		<a href=""><li class="liset">Settings</li></a>
	</ul>
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
     $('ul.tabs').tabs('select_tab', 'tab_id');
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