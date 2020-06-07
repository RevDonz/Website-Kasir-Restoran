<?php  

if (isset($_GET['meja'])) {
    $query_order = mysqli_query($kon, "SELECT * FROM tb_order WHERE meja_order = '$_GET[meja]' ORDER BY id_order DESC");
    $order = mysqli_fetch_assoc($query_order);
    $detail_order = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order = '$order[id_order]'");
}

$member = mysqli_query($kon, "SELECT * FROM tb_user WHERE id_level = 5");

?>
<div class="container mt-3">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
    <div class="card">
        <div class="card-header">
            Entri Transaksi
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <?php if (isset($_GET['meja'])): ?>
                        <div class="det">
                            <p>No order : <?= $order['id_order'] ?></p>
                            <p>No Meja : <?= $order['meja_order'] ?></p>
                            <p>Tanggal Pesan : <?= date('d-m-Y', $order['tanggal_order']) ?></p>
                            <p>Keterangan : <?= $order['keterangan_order'] ?></p>
                        </div>
                    <?php endif ?>
                    <table class="table table-bordered table-hover table-striped" id="tabel">
                        <thead>
                            <tr> 
                                <th>No</th>
                                <th>Nama Pesanan</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>
                        <?php if (isset($_GET['meja'])): ?>
                            <tbody>
                            <?php $i = 1;
                                foreach ($detail_order as $row) :
                                $query_mas = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$row[id_masakan]'");
                                $masakan = mysqli_fetch_assoc($query_mas); ?>
                                    <tr class="text-small">
                                        <td><?= $i++; ?></td>
                                        <td><?= $masakan['nama_masakan'] ?></td>
                                        <td><?= $row['jumlah_dorder'] ?></td>
                                        <td>Rp. <?= rupiah($masakan['harga_masakan']) ?></td>
                                        <td>Rp. <?= rupiah($masakan['harga_masakan'] * $row['jumlah_dorder']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else : ?>
                            <tbody></tbody>
                        <?php endif; ?>
                    </table>
                </div>
                <div class="col-md-4">
                    <form action="fungsi/prosesTransaksi.php" method="POST">
                        <?php $kursi = mysqli_query($kon, "SELECT * FROM tb_meja WHERE status != 0"); ?>
                        <div class="form-group">
                            <label for="">No Meja</label>

                            <select class="form-control" onchange='location=this.value' required>
                                <option selected disabled>-- Nomor Meja --</option>

                                    <?php if (isset($_GET['meja'])) : ?>
                                        <?php foreach ($kursi as $kurs) : ?>
                                            <option value="index.php?meja=<?= $kurs['meja_id'] ?>" <?= $kurs['meja_id'] == $_GET['meja'] ? 'selected' : '' ?>><?= $kurs['meja_id'] ?></option>
                                        <?php endforeach; ?>

                                    <?php else : ?>
                                        <?php foreach ($kursi as $kurs) : ?>
                                            <option value="index.php?meja=<?= $kurs['meja_id'] ?>"><?= $kurs['meja_id'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Member</label>
                            <select name="member" class="form-control">
                                <option selected value=""></option>
                                <?php foreach ($member as $m): ?>
                                    <option value="<?= $m['id_user'] ?>"><?= $m['nama_user'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Total Harga</label>
                            <?php
                            if (isset($_GET['meja'])) {
                                $q_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$order[id_order]'");
                                $hartot = mysqli_fetch_assoc($q_hartot);
                                $toto = $hartot['hartot'];
                                $id_order = $order['id_order'];
                                $meja_url = $_GET['meja'];
                            } else {
                                $meja_url = '';
                                $toto = '';
                                $id_order = '';
                            }
                            ?>
                            <input type="hidden" name="meja" value="<?= $meja_url ?>">
                            <input type="hidden" name="id_order" value="<?= $id_order ?>">

                            <input type="text" name="total_harga" readonly required value="<?= $toto ?>" class="form-control hartot" placeholder="Total Harga">
                        </div>
                        <div class="form-group">
                            <label for="">Diskon (%)</label>
                            <input type="number" class="form-control diskon" min="0" max="100" name="diskon" value="0" placeholder="Diskon ">
                        </div>
                        <div class="form-group">
                            <label for="">Total Bayar</label>
                            <input type="number" readonly class="form-control totbayar" required value="<?= $toto ?>" name="total_bayar" placeholder="Total Bayar">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" min="1" class="form-control uang" required name="uang" placeholder="Uang">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" readonly class="form-control kembalian" required name="kembalian" placeholder="Kembalian">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block">Bayar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

