<?php
session_start();
if(isset($_SESSION['login'])){
	include 'koneksi.php';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$tempat = isset($_POST['tempat']) ? $_POST['tempat'] : '';
	$tanggal = isset($_POST['tanggal']) ? $_POST['tanggal'] : '';
	$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
	$jenis = isset($_POST['jenis']) ? $_POST['jenis'] : '';
	$input = date("Y-m-d H:i:s");
	$user = $_SESSION['user_id'];
	if(!empty($nama) && !empty($tempat) && !empty($tanggal) && !empty($alamat) && !empty($jenis)){
		mysqli_query($connect,"INSERT INTO santri VALUES(null,'$nama','$tempat','$tanggal','$alamat','$jenis','$user','$input')");
		header("location:../santri.php");
	} else {
		echo "jangan <a href='../santri_tambah.php'>tergesa</a>-gesa...";
	}
} else {
	echo "belum <a href='../index.php'>login?</a>";
}
?>