<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
	<div class="card">
		<div class="card-header">
			Data User
		</div>
		<div class="card-body">
			<a href="index.php?registrasi"><button class="btn btn-primary btn-sm mb-3">Registrasi User</button></a>
			<table class="table table-bordered table-hover table-striped" id="tabel">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama User</th>
						<th>Username</th>
						<th>Password</th>
						<th>Level</th>
						<?php if ($_SESSION['level'] == "Admin"): ?>
							<th>Aksi</th>	
						<?php endif ?>
					</tr>
				</thead>
				<tbody>
					<!-- mengambil data dari database -->
					<?php
					$i = 1;
					$sql = mysqli_query($kon, "SELECT * FROM tb_user");
					while ($data = mysqli_fetch_array($sql)) : ?>
					<tr>
						<td><?= $i++; ?></td>
						<td><?= $data['nama_user'] ?></td>
						<td><?= $data['username'] ?></td>
						<td><?= $data['password'] ?></td>
						<?php  
							if ($data['id_level']==1) {
								$level = "Admin";
							} elseif ($data['id_level']==2) {
								$level = "Waiter";
							} elseif ($data['id_level']==3) {
								$level = "Kasir";
							} elseif ($data['id_level']==4) {
								$level = "Owner";
							} else {
								$level = "Pelanggan";
							}
						?>
						<td><?= $level; ?></td>
						<?php if ($_SESSION['level'] == "Admin"): ?>
						<td>
							<div class="btn-group">
								<a href="index.php?ubah_user=<?= $data['id_user'] ?>" class="btn btn-sm btn-warning">Ubah</a>
								<a href="fungsi/hapusUser.php?id_user=<?= $data['id_user']; ?>" class="btn btn-danger btn-sm">Hapus</a>
							</div>
						</td>
					<?php endif; ?>
					</tr>
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>