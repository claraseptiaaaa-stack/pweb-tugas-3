<div class="card shadow border-0 mb-4">
	<div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
		<div>
			<h5 class="mb-0 fw-bold">Data Mahasiswa</h5>
		</div>
		<a class="btn btn-primary btn-lg fw-bold" href="<?php echo base_url('mahasiswa/tambah') ?>">Tambah</a>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table id="datatable" class="table table-striped table-bordered align-middle w-100 mb-0">
				<thead class="table-dark">
					<tr>
						<td>No.</td>
						<td>NIM</td>
						<td>Nama</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody>

<?php if(!empty($mahasiswa)): ?>
    <?php $no = 1; ?>

    <?php foreach($mahasiswa as $row): ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nim'] ?></td>
        <td><?= $row['nama'] ?></td>

        <td>
            <a href="<?= base_url('mahasiswa/edit/'.$row['id']) ?>"
               class="btn btn-warning btn-sm">
               Edit
            </a>

            <a href="<?= base_url('mahasiswa/hapus/'.$row['id']) ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Yakin hapus data?')">
               Hapus
            </a>
        </td>
    </tr>

    <?php endforeach; ?>

<?php else: ?>

    <tr>
        <td colspan="4" class="text-center text-muted">
            Belum ada data mahasiswa.
        </td>
    </tr>

<?php endif; ?>

</tbody>
			</table>
		</div>
	</div>
</div>