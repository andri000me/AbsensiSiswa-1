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
	
	$tam = "SELECT * FROM tb_mapel WHERE id_mapel = '$no'";
	
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
		<form class="col s12" method="POST" action="prosesupdate.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Input Siswa</b></h4>
       <div class="input-field col s12">
		<input type="hidden" name="nis" value="<?php echo $data['id_mapel']; ?>">
          <input placeholder="Nama Pelajaran" id="first_name" type="text" class="validate" name="mapel" value="<?php echo $data['nama_pel']; ?>">
          <label for="first_name">Nama Mata Pelajaran</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="NISN" id="first_name" type="text" class="validate" name="guru" value="<?php echo $data['guru']; ?>">
          <label for="first_name">Guru</label>
        </div>
          <div class="input-field col s12">
			<select name="kelas">
			  <option value="X" <?php if($data['kelas_mapel'] == "X"){
				echo "checked";
			} ?>>X</option>
			<option value="XI" <?php if($data['kelas_mapel'] == "XI"){
				echo "checked";
			} ?>>XI</option>
			<option value="XII" <?php if($data['kelas_mapel'] == "XII"){
				echo "checked";
			} ?>>XII</option>
			<option value="XIII" <?php if($data['kelas_mapel'] == "XIII"){
				echo "checked";
			} ?>>XIII</option>
			</select>
			<label>Kelas</label>
		  </div>
         <div class="input-field col s12">
			<select name="jurusan" id="">
				<option value="RPL" <?php if($data['jurusan'] == "RPL"){
				echo "checked";
			} ?>>RPL</option>
			<option value="TKJ" <?php if($data['jurusan'] == "TKJ"){
				echo "checked";
			} ?>>TKJ</option>
			<option value="AK" <?php if($data['jurusan'] == "AK"){
				echo "checked";
			} ?>>AK</option>
			</select>
			<label>Jurusan</label>
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