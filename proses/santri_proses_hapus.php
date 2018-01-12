<?php
session_start();
if (isset($_SESSION['login'])){
	include 'koneksi.php';
	$id = isset($_GET['ID']) ? $_GET['ID'] : '';
	if(!empty($id)){
		mysqli_query($connect,"DELETE FROM santri WHERE id='$id'");
		header("location:../santri.php");
	} else {
		echo "<a href='../santri.php'>id-nya</a> kosong maz...!";
	}
} else {
	echo "<a href='../index.php'>Login</a> dulu box...!";
}
?>