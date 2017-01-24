<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../../asset/css/style.css">
	
</head>
<body style="background:url(../../asset/img/class.jpg)no-repeat;background-size:cover;">
<div class="navigasi">
	<ul class="forakun">
		<li class="nama_kelas"><a href="../admin.php" class="white-text">Home</a></li>
		<li class="nama_kelas"><a href="../mapel/input.php" class="white-text">Mapel</a></li><li><a href="../../asset/log.php?op=out"><img src="../../asset/img/logout.png" width="35px" height="30px" style="margin:20px 0px;" alt=""></a></li>
</ul>
	
</div>
		
 <div class="row" style="margin-top:150px;">
   <div class="container">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Input Siswa</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Data Absen</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="padding:30px 0px;">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="post" action="prosesinput.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Input Siswa</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama siswa" id="first_name" type="text" class="validate" name="nama">
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="NISN" id="first_name" type="text" class="validate" name="nis">
          <label for="first_name">NISN</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Kelas" id="first_name" type="text" class="validate" name="kelas">
          <label for="first_name">Kelas</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="Alamat" id="first_name" type="text" class="validate" name="alamat">
          <label for="first_name">Alamat</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="No HP" id="first_name" type="text" class="validate" name="notelp">
          <label for="first_name">No HP</label>
        </div>
          <div class="input-field col s12">
			<select name="jk">
			  <option value="" disabled selected>Jenis Kelamin</option>
			  <option value="L">Laki - Laki</option>
			  <option value="P">Perempuan</option>
			</select>
			<label>Jenis Kelamin</label>
		  </div>
          <div class="input-field col s12">
			<input type="file" name="img">
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
    <div id="test2" class="col s12" style="background: rgba(0, 0, 0, 0.6);padding:30px 0px;height:550px;overflow-y:scroll;overflow-x:hidden;">
    <?php

$konek = mysqli_connect("localhost","root","","absensi");

$tampil = "SELECT * FROM tb_siswa";

$hasil = mysqli_query($konek,$tampil);
?>
    	<table>
        <thead class="white-text">
          <tr>
              <th data-field="id" class="center">Kode Siswa</th>
              <th data-field="name" class="center">Nama</th>
              <th data-field="name" class="center">Foto</th>
              <th data-field="price" class="center">No HP</th>
              <th data-field="price" class="center">Jenis Kelamin</th>
              <th data-field="price" class="center">Alamat</th>
              <th data-field="price" class="center">Kelas</th>
              <th data-field="price" class="center">Action</th>
          </tr>
        </thead>
        
        <tbody class="white-text">
        
			<?php

	while($data=mysqli_fetch_array($hasil)){
		
		$foto = $data['foto'];
		if($foto == NULL){
				if($data['jk'] == "P"){
					$foto = "Perem.png";
				}else if($data['jk'] == "L"){
					$foto = "Laki.png";
				}
			}else{
				$foto = $data['foto'];
			}
		echo "
			<tr>
				<td>$data[nisn]</td>
				<td>$data[nama_sis]</td>
				<td><img src = 'img/".$foto."' width=100px height=100px></td>
				<td>$data[no_telp]</td>
				<td>$data[jk]</td>
				<td>$data[alamat]</td>
				<td>$data[kelas]</td>
				<td><a href=\"delete.php?no=$data[nisn]\" class='white-text'>DELETE</a> | <a href=\"update.php?no=$data[nisn]\" class='white-text'>UPDATE</a></td>
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