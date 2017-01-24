<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<form action="" method="POST">
	MASUKAN JUMLAH DATA YANG INGIN DIMASUKAN :
	<input type="text" name="jml"><br>
	<input type="submit" name="sm">
</form>

<?php

	if(@$_POST['sm']){
		$y = $_POST['jml'];
?>

	<form action="" enctype="multipart/form-data" method="POST">
	<?php
		for($i=0;$i<$y;$i++){
	?>
			KODE SISWA :
			<input type="text" name="kd<?php echo $i; ?>"><br>
			NAMA SISWA :
			<input type="text" name="nm<?php echo $i; ?>"><br>
			KELAS :
			<input type="text" name="kls<?php echo $i; ?>"><br>
			ALAMAT :
			<input type="text" name="alt<?php echo $i; ?>"><br>
			NO TELFON :
			<input type="text" name="notelp<?php echo $i; ?>"><br>
			Jenis Kelamin :
			<select name="jk<?php echo $i; ?>" id="">
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select><br>
			Foto:
			<input type="file" name="ft"><br><br><br><br>
			
	<?php
		}
	?>
	<input type="submit" name="sm2">
	</form>	
<?php		
	}
?>

<?php
	if(@$_POST['sm2']){
		$konek = mysqli_connect("localhost","root","","absensi");
		$yi = $_POST['jml'];
		for($u=0;$u<$yi;$u++){
			$a = $_POST['kd'.$i];
			$b = $_POST['nm'.$i];
			$c = $_POST['kls'.$i];
			$d = $_POST['alt'.$i];
			$e = $_POST['notelp'.$i];
			$f = $_POST['jk'.$i];
			$foto = $_FILES['ft'.$i]['name'.$i];
			$lcl = $_FILES['ft'.$i]['tmp_name'.$i];

			$directory = "img/$foto";

			$sini = move_uploaded_file($lcl,$directory);
			$xx ="INSERT INTO tb_siswa(nisn,nama_sis,alamat,no_telp,jk,kelas,foto) VALUES('$a' , '$b' , '$d' , '$e' ,'$f' ,'$c','$foto')";
			if($hasil || $sini){
				echo "BERHASIL";
			}else{
				echo "GAGAL";
			}
		}
	}
	
?>
	
</body>
</html>