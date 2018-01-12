<?php
include 'koneksi.php';

$email = $_POST['email'];
$password = md5($_POST['password']);

if (!empty($email) && !empty($password)){
	$sql = mysqli_query($connect,"SELECT * FROM user WHERE email='$email' AND password='$password'");
	$result = mysqli_num_rows($sql);
	if($result){
		$row = mysqli_fetch_array($sql);
		session_start();
		$_SESSION['login'] = true;
		$_SESSION['nama'] = $row['nama'];
		$_SESSION['user_id'] = $row['id'];
		$_SESSION['email'] = $row['email'];
		header("location:../home.php");
	} else {
		echo "email dan pass-nya salah boz...!";
	}
} else {
	echo "<a href='../index.php'>Login</a> dulu maz...!";
}
?>