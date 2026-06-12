<div class="card shadow border-0 mb-4">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Data Program Studi</h5>
        <a href="<?php echo base_url('prodi/tambah') ?>" class="btn btn-primary fw-semibold">
            Tambah
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped align-middle w-100 mb-0">

                <thead class="table-dark">
                    <tr>
                        <th style="width: 8%;">No</th>
                        <th>Nama Fakultas</th>
                        <th>Program Studi</th>
                        <th style="width: 12%;">Strata</th>
                        <th style="width: 18%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php if(!empty($prodi)): ?>
                    <?php $no = 1; ?>
                    <?php foreach($prodi as $row): ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= isset($row['fakultas_name']) ? $row['fakultas_name'] : '-' ?></td>
                        <td><?= $row['prodi_name'] ?></td>
                        <td><?= $row['prodi_strata'] ?></td>

                        <td>
                            <a href="<?= base_url('prodi/ubah/'.$row['prodi_id']) ?>"
                               class="btn btn-warning btn-sm fw-semibold">
                               Ubah
                            </a>

                            <a href="<?= base_url('prodi/hapus/'.$row['prodi_id']) ?>"
                               class="btn btn-danger btn-sm fw-semibold btn-hapus">
                               Hapus
                            </a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="5" class="text-center text-muted py-3">
                            Belum ada data Program Studi.
                        </td>
                    </tr>

                <?php endif; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>