<?php
session_start();
include '../../koneksi.php';

// ambil data dari form
$id_masakan = htmlspecialchars($_POST['id_masakan']);
$jumlah = htmlspecialchars($_POST['jumlah']);
$keterangan = htmlspecialchars($_POST['keterangan']);
$id_user = $_SESSION['id_user'];

// ambil data dari DB untuk orderan
$query_order = mysqli_query($kon, "SELECT count(id_order) as no_order FROM tb_order");
$order = mysqli_fetch_assoc($query_order);
$no_order = $order['no_order'] + 1;
$a_no = 'ORD000' . $no_order;

// ambil data dari DB untuk makanan
$query_masakan = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$id_masakan'");
$harga = mysqli_fetch_assoc($query_masakan);
$hartot = $harga['harga_masakan'] * $jumlah;

// validasi jika ada makanan yang duplikat
$validasi_dupllikat_menu = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_masakan = '$id_masakan' AND check_available = '$no_order'");
$q_validasi = mysqli_fetch_assoc($validasi_dupllikat_menu);

// cek 
if ($q_validasi > 0) {
	$duplikat = $q_validasi['jumlah_dorder']+$jumlah;
	$query_tambah_duplikat = mysqli_query($kon, "UPDATE tb_detail_order SET jumlah_dorder='$duplikat' WHERE id_masakan='$id_masakan' AND check_available = '$no_order'");
    	header("location:../index.php");
} else {
    $queryTambah = "INSERT INTO tb_detail_order VALUES(NULL, '$no_order', '$a_no', '$id_masakan',  '$keterangan', '$jumlah', '$hartot', '$id_user', 0)";
    $query = mysqli_query($kon, $queryTambah);

    if ($query > 0) {
    	header("location:../index.php");
    } else {
    	header("location:../index.php");
    }
}
