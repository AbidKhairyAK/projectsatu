<?php
session_start();
if(isset($_SESSION['login'])){
	include 'koneksi.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$tempat = isset($_POST['tempat_lahir']) ? $_POST['tempat_lahir'] : '';
	$tanggal = isset($_POST['tanggal_lahir']) ? $_POST['tanggal_lahir'] : '';
	$alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
	$jenis = isset($_POST['jenis_kelamin']) ? $_POST['jenis_kelamin'] : '';
	
	$input = date('Y-m-d H:i:s');
	$user = $_SESSION['user_id'];
	
	if (!empty($nama) && !empty($tempat) && !empty($tanggal) && !empty($alamat) && !empty($jenis)){
		mysqli_query($connect, "UPDATE santri SET nama='$nama', tempat_lahir='$tempat', 
								tanggal_lahir='$tanggal', alamat='$alamat', jenis_kelamin='$jenis', 
								user_id='$user', tanggal_input='$input' WHERE id='$id'");
		header("location:../santri.php");
	} else {
		echo "Tolong menjadi <a href='../santri.php'>santri</a> terlebih dahulu...!";
	}
	
} else {
	echo "<a href='../index.php'>login</a> dulu maz...!";
}
?>