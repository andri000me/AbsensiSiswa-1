<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../../asset/css/materialize.min.css">
	<link rel="stylesheet" href="../../asset/css/style.css">
	
</head>
<body style="background:url(../../asset/img/user.jpg)no-repeat;background-size:cover;">
	

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
        <li class="tab col s3"><a href="#test1">Input User</a></li>
        <li class="tab col s3"><a class="active" href="#test2">Data User</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="padding:30px 0px;">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="GET" action="prosesinput.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Input User</b></h4>
       <div class="input-field col s12">
          <input placeholder="Nama User" id="first_name" type="text" class="validate" name="nama">
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Username" id="first_name" type="text" class="validate" name="user">
          <label for="first_name">Username</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="Password" id="first_name" type="password" class="validate" name="password">
          <label for="first_name">Password</label>
		 </div>
        <div class="input-field col s12">
          <input placeholder="Kelas" id="first_name" type="text" class="validate" name="kelas1">
          <label for="first_name">Kelas</label>
        </div>
          <div class="input-field col s12">
			<select name="kelas">
			  <option value="" disabled selected>Angkatan</option>
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
         <div class="input-field col s12">
			<select name="level" id="">
			  <option value="" disabled selected>Level</option>
				<option value="FFUKZ">admin</option>
				<option value="VFXNV">Wakil Kelas</option>
				<option value="MMPUBPZDV">Wali Kelas</option> 
				<option value="WKUXQ">Piket</option> 
			</select>
			<label>Level</label>
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

$tampil = "SELECT * FROM tb_user";

$hasil = mysqli_query($konek,$tampil);
?>
    	<table>
        <thead class="white-text">
          <tr>
              <th data-field="id">Nama</th>
              <th data-field="id">Username</th>
              <th data-field="id">Password</th>
              <th data-field="name">Kelas</th>
              <th data-field="name">Kelas Mapel</th>
              <th data-field="name">Jurusan</th>
              <th data-field="price">Level</th>
              <th data-field="price">Action</th>
          </tr>
        </thead>
        
        <tbody class="white-text">
        
			<?php

	while($data=mysqli_fetch_array($hasil)){
		echo "
			<tr>
				<td>$data[nama_user]</td>
				<td>$data[username]</td>
				<td>$data[password]</td>
				<td>$data[kelas]</td>
				<td>$data[kelas_mapel]</td>
				<td>$data[jurusan]</td>
				<td>$data[level]</td>
				<td><a href=\"delete.php?no=$data[id_user]\" class='white-text'>DELETE</a></td>
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