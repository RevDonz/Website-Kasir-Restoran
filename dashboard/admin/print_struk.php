<?php  
session_start();
require '../../koneksi.php';
require '../fungsi/rupiah.php';

$id = $_GET['id_order'];
$q_struk = mysqli_query($kon, "SELECT * FROM tb_transaksi WHERE id_order = '$id'");
$struk = mysqli_fetch_assoc($q_struk);
$q_mem = mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$struk[id_user]'");
$mem = mysqli_fetch_assoc($q_mem);
$detail_order = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order  = '$id'");
$q_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$id'");
$hartot = mysqli_fetch_assoc($q_hartot);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Struk</title>
    <style>
      hr {
        border-top: 2px dashed;
      }
    </style>
  </head>
  <body>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-6 mx-auto" style="border: 1px solid #000;">
          <h4 class="text-center mt-2"><img src="../assets/image/logo.png" width="40" align="middle"><span class="mt-3">Chicken House</span></h4>
          <hr>
          <div class="row mt-3">
            <div class="col-md-6">
              TANGGAL : <?= date('d-m-Y h:i', $struk['tanggal_transaksi']) ?><br>
              NO ORDER : <?= $struk['id_order'] ?>
            </div>
            <div class="col-md-6">
              Member : <?= $struk['id_user'] == 0 ? 'Tidak' : $mem['nama_user'] ?>
            </div>
          </div>
          <hr>
          <div class="row">
            <?php foreach ($detail_order as $do) :
              $q_masakan = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$do[id_masakan]'");
              $masakan = mysqli_fetch_assoc($q_masakan);
            ?>
              <div class="col-md-3"><?= $masakan['nama_masakan'] ?></div>
              <div class="col-md-1"><?= $do['jumlah_dorder'] ?></div>
              <div class="col-md-4 text-right">Rp. <?= rupiah($masakan['harga_masakan']) ?></div>
              <div class="col-md-4 text-right">Rp. <?= rupiah($do['hartot_dorder']) ?></div>
            <?php endforeach; ?>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-right">Subtotal</div>
            <div class="col-md-4 text-right">Rp. <?= rupiah($struk['hartot_transaksi']) ?></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-right">Diskon</div>
            <div class="col-md-4 text-right"><?= $struk['diskon_transaksi'] ?> %</div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-right">Total</div>
            <div class="col-md-4 text-right">Rp. <?= rupiah($struk['totbar_transaksi']) ?></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-right">Tunai</div>
            <div class="col-md-4 text-right">Rp. <?= rupiah($struk['uang_transaksi']) ?></div>
          </div>
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-1"></div>
            <div class="col-md-4 text-right">Kembalian</div>
            <div class="col-md-4 text-right">Rp. <?= rupiah($struk['kembalian_transaksi']) ?></div>
          </div>
          <hr>
          <div class="row">
            <div class="col text-center">
              <p>
                Terima Kasih <br> Atas Kunjungan Anda
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
      window.print();
    </script>
  </body>
</html>