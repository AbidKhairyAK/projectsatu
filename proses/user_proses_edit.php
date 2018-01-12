<?php
session_start();
if(isset($_SESSION['login'])){
	include 'koneksi.php';
	
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	
	if (!empty($nama) && !empty($email)){
		if (!empty($pass)){
			mysqli_query($connect, "UPDATE user SET nama='$nama', email='$email', password='$password' WHERE id='$id'");
		} else {
			mysqli_query($connect, "UPDATE user SET nama='$nama', email='$email' WHERE id='$id'");
		}
		header("location:../user.php");
	} else {
		echo "Tolong menjadi <a href='../user.php'>user</a> terlebih dahulu...!";
	}
	
} else {
	echo "<a href='../index.php'>login</a> dulu maz...!";
}
?>