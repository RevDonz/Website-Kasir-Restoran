<div class="container mt-3">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
    <div class="card">
        <div class="card-header">
            Laporan
        </div>
        <div class="card-body">
            <a href="admin/semua_laporan.php" target="_blank" class="btn btn-primary btn-sm mb-3">Print semua laporan <i class="fa fa-print"></i></a>
            <table class="table table-bordered table-hover table-striped" id="tabel">
                <thead>
                    <tr> 
                        <th>No</th>
                        <th>No Order</th>
                        <th>No Meja</th>
                        <th>Pelanggan</th>
                        <th>Tanggal Transaksi</th>
                        <th>Total Bayar</th>
                        <th>Diskon</th>
                        <th>Total Bayar (Diskon)</th>
                        <th>Option</th>
                    </tr>
                </thead>
            <?php $i = 1;
            $transaksi = mysqli_query($kon, "SELECT * FROM tb_transaksi ORDER BY id_transaksi DESC");
            foreach ($transaksi as $row) :
                $user_query =  mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$row[id_user]'");
                $user = mysqli_fetch_assoc($user_query);
                $order_query =  mysqli_query($kon, "SELECT * FROM tb_order WHERE id_order = '$row[id_order]'");
                $oq = mysqli_fetch_assoc($order_query);
            ?>
                <tbody>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row['id_order'] ?></td>
                        <td><?= $oq['meja_order'] ?></td>
                        <td><?= $user['nama_user'] ?></td>
                        <td><?= date('d-m-Y H:i', $oq['tanggal_order']) ?></td>
                        <td>Rp. <?= rupiah($row['hartot_transaksi']) ?></td>
                        <td><?= $row['diskon_transaksi'] ?>%</td>
                        <td>Rp. <?= rupiah($row['totbar_transaksi']) ?></td>
                        <td>
                            <a href="admin/print_struk.php?id_order=<?= $row['id_order'] ?>" target="_blank" class="btn btn-primary text-white btn-sm text-small"><i class="fas fa-print"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
