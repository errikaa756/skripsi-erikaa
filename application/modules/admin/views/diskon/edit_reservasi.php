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
                    <h3 class="mb-0">Reservasi Menu </h3>
                </div>

             
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
                                <th scope="col">Nama</th>
                                <th scope="col">Paket</th>
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
                                    <tr >
                                        <td><?php echo $index + 1; ?></td>
                                        <td><?= $item['name']; ?>
                                        </td>
                                        <td><?= $item['paket']; ?></td>
                                        <td>
                                            <a href="<?= site_url('/admin/reservasimeja/show/'.$item['name'].'-'.$item['name']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                      
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