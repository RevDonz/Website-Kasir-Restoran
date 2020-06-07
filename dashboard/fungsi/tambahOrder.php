<?php
session_start();
require '../../koneksi.php';

$meja = htmlspecialchars($_POST['meja']);
$id_order = htmlspecialchars($_POST['id_order']);
$keterangan = htmlspecialchars($_POST['keterangan']);
$user_id = $_SESSION['id_user'];
$tanggal = time();
$tanggal2 = date('d-m-Y');
if ($meja < 1) {
    $_SESSION['pesan'] = '
		<div class="alert alert-warning mb-2 alert-dismissible text-small " role="alert">
			<b>Maaf!</b> Meja belum dipilih
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php');
    return false;
}

mysqli_query($kon, "UPDATE tb_detail_order set status_dorde = 1 WHERE id_order = '$id_order'");

mysqli_query($kon, "UPDATE tb_meja set status = 1 WHERE meja_id = '$meja'");

$queryTambah = "INSERT INTO tb_order VALUES('$id_order', '$meja', '$tanggal', '$tanggal2', '$user_id', '$keterangan', 0)";
$query = mysqli_query($kon, $queryTambah);

if ($query > 0) {
    $_SESSION['pesan'] = '
		<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			<b>Yoi!</b> Pesanan sedang diproses, mohon tunggu sampai masakan datang
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php');
} else {
    $_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Maaf!</b> Pesanan gagal diproses
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php');
}
