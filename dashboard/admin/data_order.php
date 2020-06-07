<div class="container mt-3">
    <?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
    <div class="card">
        <div class="card-header">
            Data Order
        </div>
        <div class="card-body">
            <a href="index.php?home"><button class="btn btn-primary btn-sm mb-3">Entri Order</button></a>
            <table class="table table-bordered table-hover table-striped" id="tabel">
                <thead>
                    <tr> 
                        <th>No</th>
                        <th>No Order</th>
                        <th>No Meja</th>
                        <th>Tanggal Order</th>
                        <th>Total Bayar</th>
                        <th>Keterangan</th>
                        <th>Option</th>
                    </tr>
                </thead>
            <?php $i = 1;
            $order = mysqli_query($kon, "SELECT * FROM tb_order WHERE status_order = 0 ORDER BY id_order DESC");
            foreach ($order as $orders) :
                $user_query =  mysqli_query($kon, "SELECT * FROM tb_user WHERE id_user = '$orders[id_user]'");
                $user = mysqli_fetch_assoc($user_query);
                $query_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$orders[id_order]'");
                $hartot = mysqli_fetch_assoc($query_hartot);
            ?>
                <tbody>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $orders['id_order'] ?></td>
                        <td><?= $orders['meja_order'] ?></td>
                        <td><?= date('d-m-Y H:i', $orders['tanggal_order']) ?></td>
                        <td>Rp. <?= rupiah($hartot['hartot']) ?></td>
                        <td><?= $orders['keterangan_order'] ?></td>
                        <td>
                            <a href="fungsi/hapusPesan.php?id=<?= $orders['id_order'] ?>" class="btn btn-danger btn-sm text-small" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
                            <button type="button" title="Detail Order" class="btn btn-sm btn-secondary text-small text-white" data-toggle="modal" data-target="#detailOrder_<?= $orders['id_order'] ?>"><i class="fas fa-eye"></i></button>
                            <?php if ($orders['order_status'] == 1) : ?>
                                <a href="print_struk.php?id_order=<?= $orders['id_order'] ?>" target="_blank" class="btn btn-warning text-white btn-sm text-small"><i class="fas fa-print"></i></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<?php foreach ($order as $detRow) : ?>
<div class="modal fade" id="detailOrder_<?= $orders['id_order'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
            $detail_order = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order = '$detRow[id_order]'");
            $query_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$detRow[id_order]'");
            $hartot = mysqli_fetch_assoc($query_hartot);
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($detail_order as $list_row) :
                    $masakan = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$list_row[id_masakan]' ");
                    $query_masakan = mysqli_fetch_assoc($masakan);
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $query_masakan['nama_masakan'] ?></td>
                    <td><?= $list_row['keterangan_dorder'] ?></td>
                    <td>Rp. <?= rupiah($query_masakan['harga_masakan']) ?></td>
                    <td align="center"><?= $list_row['jumlah_dorder'] ?></td>
                    <td>Rp. <?= rupiah($query_masakan['harga_masakan'] * $list_row['jumlah_dorder']) ?></td>
                </tr>
              <?php $i++; endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td align="right" colspan="5"><strong>Total Harga : </strong></td> 
                    <th colspan="2">Rp. <?= rupiah($hartot['hartot']) ?></th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>