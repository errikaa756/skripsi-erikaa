<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
body {
    width: 100%;
    height: 100%;
    margin: 0;
    padding: 0;
    background-color: #FAFAFA;
    font: 12pt "Tahoma";
}

* {
    box-sizing: border-box;
    -moz-box-sizing: border-box;
}

.page {
    min-height: 210mm;
    width: 297mm;
    padding: 20mm;
    margin: 10mm auto;
    border: 1px #D3D3D3 solid;
    border-radius: 5px;
    background: white;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

.subpage {
    padding: 1cm;
    border: 5px red solid;
    height: 257mm;
    outline: 2cm #FFEAEA solid;
}

@page {
    size: A4;
    margin: 0;
}

@media print {

    html,
    body {
        height: 210mm;
        width: 297mm;
    }

    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
    }
}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Header -->

<script>
window.print();
</script>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <br>
                <br>
                <hr>
                <!-- Card header -->

                <div style="font-size: 22px" align="center">
                    Data Order produk
                </div>
                <div style="font-size: 35px" align="center">Djayataruna Cafe & Archery</div>
                <div style="font-size: 12px" align="center">Jl. Jayataruna no. 93, Merak Batin, Natar.</div>
                <hr>

                <?php if ( count($orders) > 0) : ?>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Customer</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jumlah Menu</th>
                                    <th>Jumlah Harga</th>
                                    <th>Status</th>
                                    <!-- <th scope="col">Status</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <th>
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



                                    <!-- <td>?php echo get_order_status($order->order_status, $order->payment_method); ?>
                                    </td> -->
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