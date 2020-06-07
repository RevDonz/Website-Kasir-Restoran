<?php
session_start();
error_reporting(0);

include 'header.php';

if (isset($_GET['registrasi'])) {
  	include 'admin/registrasi.php';
} elseif (isset($_GET['user'])) {
	include 'admin/data_user.php';
} elseif (isset($_GET['makanan'])) {
	include 'admin/data_makanan.php';
} elseif (isset($_GET['minuman'])) {
	include 'admin/data_minuman.php';
} elseif (isset($_GET['tambah_makanan'])) {
	include 'admin/tambah_makanan.php';
} elseif (isset($_GET['ubah_makanan'])) {
	include 'admin/ubah_makanan.php';
} elseif (isset($_GET['ubah_user'])) {
	include 'admin/ubah_user.php';
} elseif (isset($_GET['order'])) {
	include 'admin/data_order.php';
} elseif (isset($_GET['transaksi'])) {
	include 'admin/transaksi.php';
} elseif (isset($_GET['meja'])) {
	include 'admin/transaksi.php';
} elseif (isset($_GET['dashboard'])) {
	include 'admin/dashboard.php';
} elseif (isset($_GET['laporan'])) {
	include 'admin/laporan.php';
} else {
  	include 'admin/index.php';
}

include 'footer.php';
?>