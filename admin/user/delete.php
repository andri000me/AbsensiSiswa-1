<?php
//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "absensi");
//ambil id dari hasil klik link edit
$nomor = $_GET['no'];

$hapus = "DELETE FROM tb_user WHERE id_user='$nomor'"; //buku adalah nama tabel db nya ,terus kalau nomor adalah nama primary key table nya, terus kalau $nomor adalah nama var

$hasil = mysqli_query($konek,$hapus);
//apabila query untuk input data benar

if($hasil)
{
//lakukan redirect

	header("location:inputuser.php");

}else{
echo "Hapus Data Tamu Gagal";
} ?>