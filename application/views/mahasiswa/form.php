<div class="card shadow border-0 mb-4">
	<div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
		<div>
			<h5 class="mb-0 fw-bold"><?php echo isset($button) && $button === 'Update' ? 'Ubah Mahasiswa' : 'Tambah Mahasiswa'; ?></h5>
		</div>
		<a class="btn btn-light" href="<?php echo base_url('mahasiswa') ?>">Kembali</a>
	</div>
	<div class="card-body">
		<form action="<?php echo $action; ?>" method="post">
			<div class="mb-3">
				<label for="mahasiswa_nim" class="form-label">NIM</label>
				<input type="text" name="mahasiswa_nim" id="mahasiswa_nim" class="form-control" value="<?php echo isset($mahasiswa['mahasiswa_nim']) ? $mahasiswa['mahasiswa_nim'] : ''; ?>" placeholder="Masukkan NIM">
			</div>
			<div class="mb-3">
				<label for="mahasiswa_nama" class="form-label">Nama</label>
				<input type="text" name="mahasiswa_nama" id="mahasiswa_nama" class="form-control" value="<?php echo isset($mahasiswa['mahasiswa_nama']) ? $mahasiswa['mahasiswa_nama'] : ''; ?>" placeholder="Masukkan Nama">
			</div>
			<div class="d-flex gap-2">
				<button type="submit" class="btn btn-primary"><?php echo isset($button) ? $button : 'Simpan'; ?></button>
				<a href="<?php echo base_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
			</div>
		</form>
	</div>
</div>