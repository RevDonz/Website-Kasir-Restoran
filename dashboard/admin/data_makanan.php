<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
	<div class="card">
		<div class="card-header">
			Data Masakan
		</div>
		<div class="card-body">
			<a href="index.php?makanan"><button class="btn btn-primary btn-sm mb-3">Data Makanan</button></a>
			<a href="index.php?minuman"><button class="btn btn-primary btn-sm mb-3">Data Minuman</button></a>
			<a href="index.php?tambah_makanan"><button class="btn btn-success btn-sm mb-3 float-right">Tambah Data</button></a>
			<table class="table table-bordered table-hover table-striped" id="tabel">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Makanan</th>
						<th>Harga</th>
						<th>Foto</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<!-- mengambil data dari database -->
					<?php
					$i = 1;
					$sql = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE kategori_masakan='Makanan'");
					while ($data = mysqli_fetch_array($sql)) : ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['nama_masakan'] ?></td>
						<td><?= $data['harga_masakan'] ?></td>
						<td><img src="assets/image/makanan/<?= $data['foto'] ?>" alt="makanan" height="100"></td>
						<?php  
							if ($data['status_masakan']==1) {
								$status = "Tersedia";
							} else {
								$status = "Tidak Tersedia";
							}
						?>
						<td><?= $status; ?></td>
						<td>
							<div class="btn-group">
								<a href="index.php?ubah_makanan=<?= $data['id_masakan'] ?>" class="btn btn-sm btn-warning">Ubah</a>
								<a href="fungsi/hapusMakanan.php?id_masakan=<?= $data['id_masakan']; ?>" class="btn btn-danger btn-sm">Hapus</a>
							</div>
						</td>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>