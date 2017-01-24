<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../../asset/css/style.css">
	
</head>
<body style="background:#2A3132;">
	


<?php

	$konek = mysqli_connect("localhost","root","","absensi");
	
	$no = $_GET['no'];
	
	$tam = "SELECT * FROM tb_siswa WHERE nisn = '$no'";
	
	$hasil = mysqli_query($konek,$tam);
	
	$data = mysqli_fetch_array($hasil);
	
	
?>
		
 <div class="row" style="margin-top:150px;">
   <div class="container">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Input Keterangan Siswa</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="background: #2A3132;padding:30px 0px;">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="post" action="proses_update.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Input Siswa</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama siswa" id="first_name" type="text" class="validate" name="nama" value="<?php echo $data['nama_sis']; ?>">
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="NISN" id="first_name" type="hidden" class="validate" value="<?php echo $data['nisn']; ?>" name="nis">
        </div>
        <div class="input-field col s12">
          <input placeholder="Kelas" id="first_name" type="text" class="validate" name="kelas" value="<?php echo $data['kelas']; ?>">
          <label for="first_name">Kelas</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="Alamat" id="first_name" type="text" class="validate" name="alamat" value="<?php echo $data['alamat']; ?>">
          <label for="first_name">Alamat</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="No HP" id="first_name" type="text" class="validate" name="notelp" value="<?php echo $data['no_telp']; ?>">
          <label for="first_name">No HP</label>
        </div>
          <div class="input-field col s12">
			<select name="jk">
			<option value="L" <?php if($data['jk'] == "L"){
				echo "checked";
			} ?>>Pria</option>
			<option value="P" <?php if($data['jk'] == "P"){
				echo "checked";
			} ?>>Wanita</option> 
			</select>
			<label>Jenis Kelamin</label>
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
  </div>
	
	<script src="../../asset/js/jquery-1.9.1.min.js"></script>
	<script src="../../asset/js/materialize.min.js"></script>
	<script>
	  $(document).ready(function() {
    $('select').material_select();
  });
            
        
	
	</script>
	
</body>
</html>