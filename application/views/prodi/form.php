<div class="card shadow border-0 mb-4">

    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
        <h5 class="mb-0 fw-bold">
            <?php echo isset($button) && $button === 'Update' ? 'Ubah' : 'Tambah'; ?> Program Studi
        </h5>
        <a class="btn btn-light btn-sm fw-semibold" href="<?php echo base_url('prodi') ?>">
            Kembali
        </a>
    </div>

    <div class="card-body">

        <form action="<?php echo $action ?>" method="post">

            <div class="mb-3">
                <label class="form-label fw-semibold">Fakultas</label>

                <?php 
                $status_fakultas = '';
                if ($_POST) {
                    $status_fakultas = form_error('fakultas_id') ? 'is-invalid' : 'is-valid';
                }
                ?>

                <select name="fakultas_id" class="form-select <?php echo $status_fakultas; ?>">
                    <option value="">-- Pilih Fakultas --</option>
                    <?php foreach($fakultas as $f): ?>
                        <option value="<?= $f['fakultas_id'] ?>" 
                            <?php 
                            // Prioritas: 1. Input lama (set_select), 2. Data database jika mode Ubah
                            echo set_select('fakultas_id', $f['fakultas_id'], (isset($prodi['fakultas_id']) && $prodi['fakultas_id'] == $f['fakultas_id']) ? TRUE : FALSE); 
                            ?>>
                            <?= $f['fakultas_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('fakultas_id', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Prodi</label>

                <?php 
                $status_prodi = '';
                if ($_POST) {
                    $status_prodi = form_error('prodi_name') ? 'is-invalid' : 'is-valid';
                }
                ?>

                <input
                    type="text"
                    name="prodi_name"
                    class="form-control <?php echo $status_prodi; ?>"
                    value="<?php echo set_value('prodi_name', isset($prodi['prodi_name']) ? $prodi['prodi_name'] : ''); ?>"
                    placeholder="Masukkan Nama Program Studi">
                <?php echo form_error('prodi_name', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="mb-3">
                <label class="form-label d-block fw-semibold">Strata</label>

                <?php 
                $status_strata = '';
                if ($_POST) {
                    $status_strata = form_error('prodi_strata') ? 'is-invalid' : 'is-valid';
                }
                ?>

                <div class="p-2 border rounded <?php echo form_error('prodi_strata') ? 'border-danger' : ($_POST ? 'border-success' : ''); ?>" style="--bs-border-opacity: .4;">
                    <?php
                    $strata = ['D3', 'S1', 'S2'];
                    foreach($strata as $s):
                    ?>
                    <div class="form-check form-check-inline">
                        <input
                            class="form-check-input <?php echo $status_strata; ?>"
                            type="radio"
                            name="prodi_strata"
                            value="<?= $s ?>"
                            id="strata_<?= $s ?>"
                            <?php 
                            echo set_radio('prodi_strata', $s, (isset($prodi['prodi_strata']) && $prodi['prodi_strata'] == $s) ? TRUE : FALSE); 
                            ?>>
                        <label class="form-check-label" for="strata_<?= $s ?>">
                            <?= $s ?>
                        </label>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <?php if(form_error('prodi_strata')): ?>
                    <div class="text-danger small mt-1"><?php echo form_error('prodi_strata'); ?></div>
                <?php endif; ?>
            </div>

            <div class="d-flex gap-2 pt-2">
                <button type="submit" class="btn btn-primary px-4">
                    <?php echo isset($button) ? $button : 'Simpan'; ?>
                </button>
                <a href="<?= base_url('prodi') ?>" class="btn btn-secondary px-4">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>