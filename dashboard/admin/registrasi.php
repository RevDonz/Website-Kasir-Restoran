<div class="container mt-3">
	<?php if (isset($_SESSION['pesan'])) : ?>
        <?= $_SESSION['pesan'] ?>
    <?php unset($_SESSION['pesan']); endif; ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="card">
		  		<div class="card-header">
		  			<h5><strong>Registrasi Member</strong></h5>
		  		</div>
			  	<div class="card-body">
			  		<form action="fungsi/registrasi_user.php" method="post">
				  		<div class="form-group">
				  			<label class="form-label" for="nama_user">Nama Lengkap</label>
				  			<input type="text" class="form-control" id="nama_user" name="nama_user">
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="username">Username</label>
				  			<input type="text" class="form-control" id="username" name="username">
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="password">Password</label>
				  			<input type="password" class="form-control" id="password" name="password">
				  		</div>
				  		<div class="form-group">
				  			<label class="form-label" for="id_level">id_level</label>
				  			<select name="id_level" id="id_level" class="form-control">
				  				<option value="1">Admin</option>
				  				<option value="2">Waiter</option>
				  				<option value="3">Kasir</option>
				  				<option value="4">Owner</option>
				  				<option value="5">Pelanggan</option>
				  			</select>
				  		</div>
				  		<button type="submit" class="btn btn-primary">Submit</button>
				  		<button type="button" class="btn btn-danger" onclick="history.back()">Kembali</button>
			  		</form>
			  	</div>
			</div>
			
		</div>
	</div>
</div>