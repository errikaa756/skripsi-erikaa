<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Kelola Reservasi</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="<?php echo site_url('admin'); ?>"><i
                                        class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hari</li>
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
                    <h3 class="mb-0">Reservasi Menu</h3>
                </div>

                <form method="get" action="<?= site_url() ?>/admin/reservasi" class="ml-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="month" value="<?= $bulan ?>" class="form-control form-control-sm"
                                    required="" name="bulan">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-filter"></i>
                                Filter</button>
                        </div>
                    </div>
                </form>
                <style>
                    .form-group {
                        margin-bottom: 1rem;
                    }

                    .btn-outline-primary {
                        border-color: #5e72e4;
                        color: #5e72e4;
                    }

                    .btn-outline-primary:hover {
                        background-color: #5e72e4;
                        color: #fff;
                    }
                </style>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush" id="packageList" style="width: 100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($reservasi)): ?>
                                <tr>
                                    <td colspan="4" class="text-center">Belum ada data untuk ditampilkan</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($reservasi as $index => $item): ?>
                                    <tr data-month="<?php echo $item['month_year']; ?>">
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?php echo get_formatted_date($item['month_year'] . '-' . str_pad($item['day'], 2, '0', STR_PAD_LEFT)); ?>
                                        </td>
                                        <td><?php echo $item['available'] ? 'Tersedia' : 'Terbooking'; ?></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#editModal" data-month_year="<?php echo $item['month_year']; ?>"
                                                data-day="<?php echo $item['day']; ?>">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal" tabindex="-1" role="dialog"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form method="post" action="<?= site_url('admin/reservasi/edit'); ?>">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Reservasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="month_year" id="editMonthYear">
                                            <input type="hidden" name="day" id="editDay">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select class="form-control" id="status" name="status">
                                                    <option value="1">Tersedia</option>
                                                    <option value="0">Terbooking</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('#editModal').on('show.bs.modal', function (event) {
                                var button = $(event.relatedTarget);
                                var month_year = button.data('month_year');
                                var day = button.data('day');

                                var modal = $(this);
                                modal.find('#editMonthYear').val(month_year);
                                modal.find('#editDay').val(day);
                            });
                        </script>
                    </table>
                </div>
            </div>

            <script>
                document.getElementById('monthFilter').addEventListener('change', function () {
                    var selectedMonth = this.value;
                    var rows = document.querySelectorAll('#packageList tbody tr');
                    rows.forEach(function (row) {
                        if (selectedMonth === '' || row.getAttribute('data-month') === selectedMonth) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                });
            </script>

        </div>
    </div>
</div>




<link href="<?php echo get_theme_uri('vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css', 'argon'); ?>"
    rel="stylesheet">

<script src="<?php echo get_theme_uri('vendor/datatables.net/js/jquery.dataTables.min.js', 'argon'); ?>"></script>
<script src="<?php echo get_theme_uri('vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js', 'argon'); ?>">
</script>
<script src="<?php echo base_url('assets/plugins/datatables.lang.js'); ?>"></script>