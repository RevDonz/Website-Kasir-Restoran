<?php  
session_start();
include '../../koneksi.php';

// ambil data dari form
$nama_user = $_POST['nama_user'];
$username = $_POST['username'];
$password = $_POST['password'];
$id_level = $_POST['id_level'];

// query input data
$query = "INSERT INTO tb_user VALUES ('', '$username', '$password', '$nama_user', '$id_level')";
$sql = mysqli_query($kon, $query);

// cek
if ($sql) {
	$_SESSION['pesan'] = '
		<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			<b>Berhasil!</b> Registrasi User berhasil
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?user');
} else {
	$_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Gagal!</b> Registrasi User gagal
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?user');
}
?>