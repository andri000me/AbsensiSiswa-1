<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

<a href="input.php">INPUT</a>

<?php

$konek = mysqli_connect("localhost","root","","absensi");

$tampil = "SELECT * FROM tb_mapel";

$hasil = mysqli_query($konek,$tampil);
?>


<table border="1">
	<tr>
		<th>MAPEL</th>
		<th>Kelas</th>
		<th>Jurusan</th>
		<th>Guru</th>
		<th>Action</th>
	</tr>


<?php

	while($data=mysqli_fetch_array($hasil)){
		echo "
			<tr>
				<td>$data[nama_pel]</td>
				<td>$data[kelas]</td>
				<td>$data[jurusan]</td>
				<td>$data[guru]</td>
				<td><a href=\"delete.php?no=$data[id_mapel]\">DELETE</a> | <a href=\"update.php?no=$data[id_mapel]\">UPDATE</a></td>
			</tr>
		
		";
	}
	
?>

</table>
	
</body>
</html>