<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Data Order produk</h6>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Order produk</li>
                        </ol>
                    </nav>
                </div>
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
                <div class="card-header">
                    <h3 class="mb-0">Data Order produk</h3>
                </div>
              
                <form method="get" action="<?= site_url() ?>/admin/orders" class="ml-4">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="month" value="<?= date('Y-m') ?>" class="form-control form-control-sm"
                                    required="" name="bulan">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-outline-primary btn-sm"><i class="fa fa-filter"></i>
                                Filter</button>
                        </div>
                        <div class="col-md-2 ">
                            <a href="<?php echo site_url('admin/orders2/print'); ?>" 
                               class="btn btn-sm btn-primary shadow-sm d-inline-flex align-items-center" 
                               target="_blank" 
                               onclick="sendTableData(event)">
                                <i class="fa fa-print mr-2"></i> <span>Print Data</span>
                            </a>

                            <script>
                                function sendTableData(event) {
                                    event.preventDefault();

                                    const tableData = [];
                                    document.querySelectorAll('table tbody tr').forEach(row => {
                                        const rowData = {
                                            customer: row.cells[1].innerText.trim(),
                                            tanggal_transaksi: new Date(row.cells[2].innerText.trim()).toLocaleDateString('id-ID'),
                                            jumlah_menu: row.cells[3].innerText.trim(),
                                            jumlah_harga: row.cells[4].innerText.trim(),
                                            status: row.cells[5].querySelector('select').value
                                        };
                                        tableData.push(rowData);
                                    });

                                    const form = document.createElement('form');
                                    form.method = 'POST';
                                    form.action = '<?php echo site_url("admin/orders2"); ?>';
                                    form.target = '_blank';

                                    const input = document.createElement('input');
                                    input.type = 'hidden';
                                    input.name = 'tableData';
                                    input.value = JSON.stringify(tableData);
                                    form.appendChild(input);

                                    document.body.appendChild(form);
                                    form.submit();
                                    document.body.removeChild(form);
                                }
                            </script>
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


                <?php if ( count($orders) > 0) : ?>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                       
                        <table class="table table-bordered table-hover align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Tanggal Transaksi</th>
                                    <th scope="col">Jumlah Menu</th>
                                    <th scope="col">Jumlah Harga</th>
                                    <th scope="col">Status</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <th scope="col">
                                        <?php echo $order->order_number; ?>
                                    </th>
                                    <td><?php echo $order->customer; ?></td>
                                    <td>
                                        <?php echo get_formatted_date($order->order_date); ?>
                                    </td>
                                    <td>
                                        <?php echo $order->total_items; ?>
                                    </td>
                                    <td>
                                        Rp <?php echo format_rupiah($order->total_price); ?>
                                    </td>
                                    <td>
                                        <select class="form-control" id="$order->order_status"
                                            name="$order->order_status" readonly>
                                            <option value="2"
                                                <?php echo ($order->order_status == 2) ? ' selected' : ''; ?>>Dalam
                                                proses</option>
                                            <option value="3"
                                                <?php echo ($order->order_status == 3) ? ' selected' : ''; ?>>Sedang
                                                Liburan</option>
                                            <option value="4"
                                                <?php echo ($order->order_status == 4) ? ' selected' : ''; ?>>Selesai
                                            </option>
                                            <option value="5"
                                                <?php echo ($order->order_status == 5) ? ' selected' : ''; ?>>Di
                                                Batalkan
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <?php echo $pagination; ?>
                </div>
                <?php else : ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="alert alert-primary">
                                Belum ada Data Menu yang ditambahkan. Silahkan menambahkan baru.
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i
                                    class="fa fa-plus"></i> Tambah Menu baru</a>
                            <br>
                            <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i>
                                Kelola kategori</a>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>