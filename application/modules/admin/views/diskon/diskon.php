<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kelola Reservasi Meja</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jam</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="col-lg-6 col-5 text-right">
                    <a href="#" data-target="#addModal" data-toggle="modal" class="btn btn-sm btn-neutral">Tambah
                        Bulan</a>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Dashboard Pengelolaan DP (Down Payment)</h3>
                </div>
                <?php
                $dp = get_dp();
                ?>
                <!-- Tabel untuk pengaturan DP -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="dpTable" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nama Pengaturan</th>
                                <th scope="col">Persentase DP</th>
                                <th scope="col">Waktu Tenggang Pelunasan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dummy Data: Pengaturan DP pertama -->
                            <?php foreach ($dp as $k => $v) {
                                ?>
                                <tr data-id="1">
                                    <td class="dp_id"><?= $v['id'] ?></td>
                                    <td>Pengaturan DP Standar</td>
                                    <td class="dp_percentage"><?= $v['dp'] ?>%</td>
                                    <td class="dp_due_date"><?= $v['waktu'] ?> Jam</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-btn">Edit</button>
                                    </td>
                                </tr>
                                <?php
                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit DP -->
    <div class="modal fade" id="editDpModal" tabindex="-1" role="dialog" aria-labelledby="editDpModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editDpModalLabel">Edit Pengaturan DP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editDpForm" method="POST" action="<?= site_url() ?>/admin/diskon/dp">
                        <input type="text" name="dp_id" id="dp_id" class="d-none">
                        <div class="form-group">
                            <label for="dpPercentage">Persentase DP</label>
                            <input type="number" class="form-control" id="dpPercentage" name="dp_percentage" min="1"
                                max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="dpDueDate">Waktu Tenggang Pelunasan (Jam)</label>
                            <input type="number" class="form-control" id="dpDueDate" name="dp_due_date" min="1"
                                required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="saveDpBtn">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript untuk Modal dan Edit -->
<script>
    // Event listener untuk tombol Edit
    document.querySelectorAll('.edit-btn').forEach(function (button) {
        button.addEventListener('click', function () {
            // Ambil data dari baris yang dipilih
            var row = this.closest('tr');
            var dpPercentage = row.querySelector('.dp_percentage').textContent;
            var dpDueDate = row.querySelector('.dp_due_date').textContent;
            var idDP = row.querySelector('.dp_id').textContent;

            // Isi form dengan data yang ada
            document.getElementById('dpPercentage').value = dpPercentage.replace('%', '');
            document.getElementById('dpDueDate').value = dpDueDate.replace(' Jam', '');
            document.getElementById('dp_id').value = idDP;

            // Menyimpan ID baris yang sedang diedit
            document.getElementById('saveDpBtn').setAttribute('data-id', row.getAttribute('data-id'));

            // Tampilkan modal
            $('#editDpModal').modal('show');
        });
    });

    // Event listener untuk tombol Simpan Perubahan
    document.getElementById('saveDpBtn').addEventListener('click', function () {
        var rowId = this.getAttribute('data-id');
        var newDpPercentage = document.getElementById('dpPercentage').value;
        var newDpDueDate = document.getElementById('dpDueDate').value;

        // Validasi input
        if (newDpPercentage < 1 || newDpPercentage > 100) {
            alert('Persentase DP harus antara 1% dan 100%.');
            return;
        }
        if (newDpDueDate < 1) {
            alert('Waktu tenggang pelunasan harus lebih dari 0 Jam.');
            return;
        }

        // Update data di tabel
        var row = document.querySelector('tr[data-id="' + rowId + '"]');
        row.querySelector('.dp_percentage').textContent = newDpPercentage + '%';
        row.querySelector('.dp_due_date').textContent = newDpDueDate + ' Jam';

        // Tutup modal
        $('#editDpModal').modal('hide');

        // Simulasikan pengiriman data ke backend
        console.log('Data DP baru: ', {
            id: rowId,
            dp_percentage: newDpPercentage,
            dp_due_date: newDpDueDate
        });
    });
</script>




<link href="<?php echo get_theme_uri('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'argon'); ?>"
    rel="stylesheet">

<script src="<?php echo get_theme_uri('vendor/datatables.net/js/jquery.dataTables.min.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'argon'); ?>">
</script>
<script src="<?php echo base_url('assets/plugins/datatables.lang.js'); ?>"></script>