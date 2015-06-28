<?php
include "check_session.php";
include "../controllpage/database.php";
$controll = new database();
$user= $controll->keamanan($_POST['username']);
$pass=$controll->keamanan($_POST['password']);


if($controll->login($user,$pass)==true){
	echo "berhasil";
	session_start();
	$_SESSION['username']=$user;
	$_SESSION['password']=$pass;
	header("location:admin.php");
}else{
	echo "gagal";
	header("location:index.php");
}




?>