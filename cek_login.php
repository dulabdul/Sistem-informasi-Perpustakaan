<?php
session_start();
$_SESSION['sesi'] = NULL;

include "koneksi.php";
if (isset($_POST['submit'])) {
	$user	= isset($_POST['user']) ? $_POST['user'] : "";
	$pass	= isset($_POST['pass']) ? $_POST['pass'] : "";
	$qry	= mysqli_query($db, "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'");
	$sesi	= mysqli_num_rows($qry);

	if ($sesi == 1) {
		$data_admin = mysqli_fetch_array($qry);
		$_SESSION['idadmin'] = $data_admin['idadmin'];
		$_SESSION['sesi'] = $data_admin['nm_admin'];
		echo "<script>alert('Anda Berhasil Login');</script>";
		echo "<meta http-equiv='refresh' content='0; url=index.php?user=$sesi'>";
	} else {
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
		echo "<script>alert('Anda Gagal Login');</script>";
		//silahkan isi dengan kode pada modul
	}
} else {
	include "login.php";
}
