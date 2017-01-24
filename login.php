
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<form action="" method="post">
		Username :
		<input type="text" name="usr"> <br>
		
		Password :
		<input type="password" name="pw"> <br>
		
		<select name="sl" id="">
			<option value="">Pilih</option>
			<option value="wakil">Wakil</option>
			<option value="piket">Piket</option>
			<option value="wali kelas">Wali Kelas</option>
		</select> <br>
		
		<input type="submit" value="Send" name="login">
	</form>
	
	<?php
	session_start();
	
	 include "inc/konek.php";
		 
		 if(@$_POST['login']){
			 
			 $usr = mysqli_real_escape_string($konek, $_POST['usr']);
			 $pw = mysqli_real_escape_string($konek, $_POST['pw']);
			 $level = mysqli_real_escape_string($konek, $_POST['sl']);
			 
			 if ($level == 'wakil'){
			 $sql = mysqli_query($konek, "SELECT * FROM tb_wakil WHERE username = '$usr' AND password = '$pw'") or die ($konek->error);
				 $data = mysqli_fetch_array($sql);
				 $id = $data[0];
				 $cek = mysqli_num_rows($sql);
				 
				 if($cek > 0){
					 $_SESSION['wakil'] = $id;
					 $_SESSION['kelas'] = $data['kelas'];
					 $_SESSION['mapel'] = $data['kelas_mapel'];
					if($data['jurusan'] == 'rpl'){
						header("location:jurusan/rpl");
					}else if($data['jurusan'] == 'tkj'){
						header("location:jurusan/tkj");
					}else if($data['jurusan'] == 'ak'){
						header("location:jurusan/ak");
					}
				 }else if($usr == '' || $pw == ''){
					 echo "<script>alert('Masukan username / password anda')</script>";
				 }else if($usr != $data['username'] || $pw != $data['password']){
					 echo "<script>alert('Masukan username / password anda salah')</script>";
				 }
			 }else if($level == 'piket'){
				  $sql = mysqli_query($konek, "SELECT * FROM tb_piket WHERE username = '$usr' AND password = '$pw'") or die ($konek->error);
				 $data = mysqli_fetch_array($sql);
				 $id = $data[0];
				 $cek = mysqli_num_rows($sql);
				 
				 if($cek > 0){
					 $_SESSION['piket'] = $id;
					 header("location:_sekolah/piket");
				 }else if($usr == '' || $pw == ''){
					 echo "<script>alert('Masukan username / password anda')</script>";
				 }else if($usr != $data['username'] || $pw != $data['password']){
					 echo "<script>alert('GAGAL PIKET')</script>";
				 }
			 }else if($level == 'wali kelas'){
				  $sql = mysqli_query($konek, "SELECT * FROM tb_walikelas WHERE username = '$usr' AND password = '$pw'") or die ($konek->error);
				 $data = mysqli_fetch_array($sql);
				 $id = $data[0];
				 $cek = mysqli_num_rows($sql);
				 
				 if($cek > 0){
					 $_SESSION['walikelas'] = $id;
					 $_SESSION['kelaswali'] = $data['kelas'];
					 $_SESSION['namawali'] = $data['nama_wali'];
					 header("location:_sekolah/walikelas");
				 }else if($usr == '' || $pw == ''){
					 echo "<script>alert('Masukan username / password anda')</script>";
				 }else if($usr != $data['username'] || $pw != $data['password']){
					 echo "<script>alert('GAGAL PIKET')</script>";
				 }
			 }
		 }
	
	?>
	
</body>
</html>