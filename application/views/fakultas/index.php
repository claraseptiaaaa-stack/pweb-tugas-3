<div class="card shadow border-0 mb-4">
    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">Data Fakultas</h5>
        <a href="<?php echo base_url('fakultas/tambah') ?>" class="btn btn-primary fw-semibold">
            Tambah
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-striped align-middle w-100 mb-0">
                
                <thead class="table-dark">
                    <tr>
                        <th style="width: 10%;">No</th>
                        <th>Nama Fakultas</th>
                        <th style="width: 25%;">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                <?php if(!empty($fakultas)): ?>
                    <?php $no = 1; ?>
                    <?php foreach($fakultas as $row): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $row['fakultas_name'] ?></td>
                        <td>
                            <a href="<?= base_url('fakultas/ubah/'.$row['fakultas_id']) ?>"
                               class="btn btn-warning btn-sm fw-semibold">
                                Ubah
                            </a>
                            <a href="<?= base_url('fakultas/hapus/'.$row['fakultas_id']) ?>"
                               class="btn btn-danger btn-sm fw-semibold btn-hapus">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted py-3">
                            Belum ada data Fakultas.
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>

            </table>
        </div>
     </div> 
</div>