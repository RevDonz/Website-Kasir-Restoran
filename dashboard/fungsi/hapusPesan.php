<?php
session_start();
require  '../../koneksi.php';

$id  = $_GET['id'];
$query_order = mysqli_query($kon, "SELECT * FROM tb_order WHERE id_order = '$id'");
$order = mysqli_fetch_assoc($query_order);
$hapus_order = "DELETE FROM tb_order WHERE id_order = '$id'";
mysqli_query($kon, "DELETE FROM tb_detail_order WHERE id_order = '$id'");
mysqli_query($kon, "UPDATE tb_meja SET status = 0 WHERE meja_id = '$order[meja_order]'");
$query = mysqli_query($kon, $hapus_order);
if ($query > 0) {
    $_SESSION['pesan'] = '
		<div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
			<b>Berhasil!</b> Pesanan berhasil dihapus
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?order');
} else {
    $_SESSION['pesan'] = '
		<div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
			<b>Gagal!</b> Pesanan gagal dihapus
			<button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
		</div>
	';
	header('location:../index.php?order');
}
