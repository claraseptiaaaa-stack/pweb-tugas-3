<div class="card shadow border-0 mb-4">

    <div class="card-header bg-secondary text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-2">
        <div>
            <h5 class="mb-0 fw-bold">
                <?php echo isset($button) && $button === 'Update'
                ? 'Ubah Fakultas'
                : 'Tambah Fakultas'; ?>
            </h5>
        </div>

        <a class="btn btn-light" href="<?php echo base_url('fakultas') ?>">
            Kembali
        </a>
    </div>

    <div class="card-body">

        <form action="<?php echo $action; ?>" method="post">

            <div class="mb-3">
                <label class="form-label">
                    Nama Fakultas
                </label>

                <?php 
                // Logika penanda validasi server-side (merah jika salah, hijau jika benar)
                $input_status = '';
                if ($_POST) {
                    $input_status = form_error('fakultas_nama') ? 'is-invalid' : 'is-valid';
                }
                ?>

                <input
                    type="text"
                    name="fakultas_nama"
                    class="form-control <?php echo $input_status; ?>"
                    value="<?php echo set_value('fakultas_nama', isset($fakultas['fakultas_name']) ? $fakultas['fakultas_name'] : ''); ?>"
                    placeholder="Masukkan Nama Fakultas">
                
                <?php echo form_error('fakultas_nama', '<div class="invalid-feedback">', '</div>'); ?>
            </div>

            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-primary">
                    <?php echo isset($button) ? $button : 'Simpan'; ?>
                </button>

                <a href="<?php echo base_url('fakultas') ?>"
                   class="btn btn-secondary">
                    Batal
                </a>

            </div>

        </form>

    </div>
</div>