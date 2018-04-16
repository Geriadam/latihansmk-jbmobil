<form role="form" method="post" action="pembeli-proses-tambah.php?tambah=1" enctype="multipart/form-data">
	<div class="form-group">
	 	<label>Nomor KTP</label>
	 	<input type="text" class="form-control" placeholder="Nomor KTP" name="ktp"  required="required" size="30">
	</div>
	<div class="form-group">
	 	<label>Nama Pembeli</label>
		<input type="text" class="form-control" placeholder="Nama Pembeli" name="nama"  required="required" size="50">
	</div>
	<div class="form-group">
		<label>Alamat</label>
		<textarea name="alamat" class="form-control" placeholder="Alamat" required="required" id="address"></textarea>
	</div>
	<div class="form-group">
		<label>Telepon</label>
		<input type="text" class="form-control" placeholder="Telepon" name="telp"  required="required" maxlength="12">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="text" class="form-control" placeholder="Password" name="pass"  required="required" maxlength="15">
	</div>
	<div class="form-group">
		<div class="input-group">
			<img src="captcha/captcha.php" width="250" height="60" /><p>
			<label>Captcha</label>
			<input name="captcha" required="required" class="form-control" placeholder="Masukkan Captcha Di Atas" required="required" />
		</div>
	</div>
	<button type="submit" class="btn btn-primary" name="simpan">Daftar</button>
	<button aria-hidden="true" data-dismiss="modal" type="button" class="btn btn-danger" name="close">Close</button>
</form>