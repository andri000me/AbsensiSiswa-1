<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../../asset/css/style.css">
	
</head>
<body style="background:url(../../asset/img/mapel.jpg)no-repeat;background-size:cover;">
	

<div class="navigasi">
	<ul class="forakun">
		<li class="nama_kelas"><a href="../admin.php" class="white-text">Home</a></li>
		<li class="nama_kelas"><a href="../siswa/inputsiswa.php" class="white-text">Siswa</a></li><li><a href="../../asset/log.php?op=out"><img src="../../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
</ul>
	
</div>
		
 <div class="row" style="margin-top:150px;">
   <div class="container">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Input Mata Pelajaran</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Data Mata Pelajaran</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="padding:30px 0px;">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="GET" action="prosesinput.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Input Mata Pelajaran</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama siswa" id="first_name" type="text" class="validate" name="mapel">
          <label for="first_name">Nama Mata Pelajaran</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="NISN" id="first_name" type="text" class="validate" name="guru">
          <label for="first_name">Guru</label>
        </div>
          <div class="input-field col s12">
			<select name="kelas">
			  <option value="" disabled selected>Kelas</option>
			  <option value="X">X</option>
			  <option value="XI">XI</option>
			  <option value="XII">XII</option>
			  <option value="XIII">XIII</option>
			</select>
			<label>Kelas</label>
		  </div>
         <div class="input-field col s12">
			<select name="jurusan" id="">
			  <option value="" disabled selected>Jurusan</option>
				<option value="RPL">Rekayasa Perangkat Lunak</option>
				<option value="TKJ">Teknologi Komunikasi Jaringan</option>
				<option value="AK">Analis Kimia</option> 
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
    <div id="test2" class="col s12"style="background: rgba(0, 0, 0, 0.6);padding:30px 0px;height:550px;overflow-y:scroll;overflow-x:hidden;">
    <?php

$konek = mysqli_connect("localhost","root","","absensi");

$tampil = "SELECT * FROM tb_mapel";

$hasil = mysqli_query($konek,$tampil);
?>
    	<table>
        <thead class="white-text">
          <tr>
              <th data-field="id" class="center">Nama Pelajaran</th>
              <th data-field="name" class="center">Kelas</th>
              <th data-field="name" class="center">Jurusan</th>
              <th data-field="price" class="center">Guru</th>
              <th data-field="price" class="center">Action</th>
          </tr>
        </thead>
        
        <tbody class="white-text">
        
			<?php

	while($data=mysqli_fetch_array($hasil)){
		echo "
			<tr>
				<td class='center'>$data[nama_pel]</td>
				<td class='center'>$data[kelas]</td>
				<td class='center'>$data[jurusan]</td>
				<td class='center'>$data[guru]</td>
				<td class='center'><a href=\"delete.php?no=$data[id_mapel]\" class='white-text'>DELETE</a> | <a href=\"form_update.php?no=$data[id_mapel]\" class='white-text'>UPDATE</a></td>
			</tr>
		
		";
	}
	
?>
        </tbody>
      </table>
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