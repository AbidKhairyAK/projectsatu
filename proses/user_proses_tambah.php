<?php
session_start();
if(isset($_SESSION['login'])){
	include 'koneksi.php';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$email = isset($_POST['email']) ? $_POST['email'] : '';
	$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
	if(!empty($nama) && !empty($email) && !empty($pass)){
		mysqli_query($connect,"INSERT INTO user VALUES(null,'$nama','$email','$pass')");
		header("location:../user.php");
	} else {
		echo "jangan <a href='../user_tambah.php'>tergesa</a>-gesa...";
	}
} else {
	echo "belum <a href='../index.php'>login?</a>";
}
?>