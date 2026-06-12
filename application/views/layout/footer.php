<footer class="text-center text-muted pt-3 border-top mt-auto">
                    <small>&copy; 2026 Pemrograman Web &mdash; Universitas Bumigora</small>
                </footer>

            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Menampilkan SweetAlert secara otomatis dari Flashdata Session CodeIgniter
        <?php if($this->session->flashdata('success')): ?>
            Swal.fire({
                title: 'Berhasil!',
                text: '<?php echo $this->session->flashdata('success'); ?>',
                icon: 'success',
                confirmButtonColor: '#0d6efd'
            });
        <?php endif; ?>

        <?php if($this->session->flashdata('warning')): ?>
            Swal.fire({
                title: 'Pemberitahuan',
                text: '<?php echo $this->session->flashdata('warning'); ?>',
                icon: 'warning',
                confirmButtonColor: '#0d6efd'
            });
        <?php endif; ?>
        
        $(document).ready(function() {
            // Inisialisasi DataTable tunggal yang aman untuk semua halaman
            if ($('#datatable').length > 0 && !$.fn.DataTable.isDataTable('#datatable')) {
                $('#datatable').DataTable({
                    responsive: true,
                    pageLength: 10,
                    language: {
                        search: 'Cari:',
                        lengthMenu: 'Tampilkan _MENU_ data',
                        info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
                        infoEmpty: 'Tidak ada data yang ditampilkan',
                        zeroRecords: 'Data tidak ditemukan',
                        paginate: {
                            previous: 'Sebelumnya',
                            next: 'Berikutnya'
                        }
                    }
                });
            }
        });

        // Handler tombol hapus menggunakan SweetAlert2
        document.addEventListener('click', function (event) {
            var deleteButton = event.target.closest('.btn-hapus');
            if (!deleteButton) return;

            event.preventDefault();

            Swal.fire({
                title: 'Hapus data ini?',
                text: 'Data yang sudah dihapus tidak bisa dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc3545',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then(function (result) {
                if (result.isConfirmed) {
                    window.location.href = deleteButton.getAttribute('href');
                }
            });
        });
    </script>
</body>
</html>