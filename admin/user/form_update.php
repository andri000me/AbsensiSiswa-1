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
	
	$tam = "SELECT * FROM tb_user WHERE id_user = '$no'";
	
	$hasil = mysqli_query($konek,$tam);
	
	$data = mysqli_fetch_array($hasil);
	
	
?>
		
 <div class="row" style="margin-top:150px;">
   <div class="container">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Update User</a></li>
      </ul>
    </div>
    <div id="test1" class="col s12" style="background: #2A3132;padding:30px 0px;">
<div class="container">
	<div class="container" style="margin-top:40px;">
		<form class="col s12" method="POST" action="prosesupdate.php" enctype="multipart/form-data">
      <div class="row white" id="awal">
      <div class="container">
		<h4 class="center"><b>Update User</b></h4>
       <div class="input-field col s12">
         <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
          <input placeholder="Nama User" id="first_name" type="text" class="validate" name="nama" value="<?php echo $data['nama_user']; ?>">
          <label for="first_name">Nama</label>
        </div>
        <div class="input-field col s12">
          <input placeholder="Username" id="first_name" type="text" class="validate black-text" name="user" value="<?php echo $data['username']; ?>" disabled>
          <label for="first_name">Username</label>
        </div>
         <div class="input-field col s12">
          <input placeholder="Password" id="first_name" type="text" class="validate" name="password">
          <label for="first_name">Password</label>
		 </div>
        <div class="input-field col s12">
          <input placeholder="Kelas" id="first_name" type="text" class="validate" name="kelas1" value="<?php echo $data['kelas']; ?>" disabled>
          <label for="first_name">Kelas</label>
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