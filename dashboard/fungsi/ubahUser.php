<?php  
error_reporting(0);
session_start();
include "../../koneksi.php";

// ambil data dari form
$id = $_GET['id_user'];
$nama = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];
$link = header("location:../index.php?user");

$query = "UPDATE tb_user SET nama_user='$nama', username='$username', password='$password', id_level='$id_level' WHERE id_user='$id'";
	$sql = mysqli_query($kon, $query);		

	if ($sql) {
		$_SESSION['pesan'] = '
    <div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
    	<b>Berhasil!</b> Data berhasil diubah
    	<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
		$link;
	} else {
		$_SESSION['pesan'] = '
    <div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
    	<b>Gagal!</b> Data gagal diubah
    	<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
    </div>
    ';
		$link;
	}
?>