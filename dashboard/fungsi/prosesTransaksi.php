<?php
session_start();
require '../../koneksi.php';

$id_order = htmlspecialchars($_POST['id_order']);
$meja = htmlspecialchars($_POST['meja']);
$member = htmlspecialchars($_POST['member']);
$total_harga = htmlspecialchars($_POST['total_harga']);
$diskon = htmlspecialchars($_POST['diskon']);
$total_bayar = htmlspecialchars($_POST['total_bayar']);
$uang = htmlspecialchars($_POST['uang']);
$kembalian = htmlspecialchars($_POST['kembalian']);
$tanggal = time();
$tanggal2 = date('d-m-Y');

$q_detailOrder = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order = '$id_order'");

if ($uang < $total_bayar) {
    $_SESSION['pesan'] = '
        <div class="alert alert-warning mb-2 alert-dismissible text-small " role="alert">
            <b>Maaf!</b> Uang kurang
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
    ';
    header("location:../index.php?meja=$meja");
} else {
    mysqli_query($kon, "UPDATE tb_order set status_order = 1 WHERE id_order = '$id_order'");

    mysqli_query($kon, "UPDATE tb_meja set status = 0 WHERE meja_id = '$meja'");

    $queryTambah = "INSERT INTO tb_transaksi VALUES(NULL, '$member', '$id_order', '$tanggal', '$tanggal2', '$total_harga', '$diskon', '$total_bayar', '$uang', '$kembalian')";
    $query = mysqli_query($kon, $queryTambah);
    if ($query > 0) {
        $_SESSION['pesan'] = '
        <div class="alert alert-success mb-2 alert-dismissible text-small " role="alert">
            <b>Berhasil!</b> Transaksi berhasil <a class="btn btn-sm btn-primary" href="admin/print_struk.php?id_order=' . $id_order . '" target="_blank">Print Struk <i class="fa fa-print"></i></a>
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        ';
        header("location:../index.php?transaksi");
    } else {
        $_SESSION['pesan'] = '
        <div class="alert alert-danger mb-2 alert-dismissible text-small " role="alert">
            <b>Gagal!</b> Transaksi gagal 
            <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>
        ';
        header("location:../index.php?transaksi");
    }
}

?>


