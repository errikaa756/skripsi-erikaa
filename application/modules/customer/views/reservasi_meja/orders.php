<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Booking </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item active">Booking</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <br> </br>
    
    <section class="content">
        <div class="card card-primary">
            <div class="card-body<?php echo ( count($reservasi) > 0) ? ' p-0' : ''; ?>">
                <?php if ( count($reservasi) > 0) : ?>
                <div class="table-responsive">
                    <table class="table table-striped m-0">
                        <tr class="bg-primary">
                            <th scope="col">No.</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">ID</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Total DP</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Order Status</th>
                            <!-- <th scope="col">Status</th> -->
                        </tr>
                        <?php foreach ($reservasi as $order) : ?>
                        <tr>
                            <td><?php echo $order->id; ?></td>
                            <td><?php echo anchor('customer/ReservasiMeja/cetak_order/'. $order->id, 'Cetak Order'); ?></td>
                            <td><?php echo anchor('customer/ReservasiMeja/view/'. $order->id, '#'. $order->order_number); ?>
                            </td>
                            <td><?php echo get_formatted_date($order->order_date); ?></td>
                            <td>Rp<?php echo format_rupiah($order->total_dp); ?> </td>
                            <td>Rp <?php echo format_rupiah($order->total_price); ?></td>
                            <td><?php echo $order->order_status?></td>
                            <!-- <td>?php echo get_order_status($order->order_status, $order->payment_method); ?></td> -->
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else : ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-info">
                            Belum ada data order.
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <?php if ($pagination) : ?>
            <div class="card-footer">
                <?php echo $pagination; ?>
            </div>
            <?php endif; ?>

        </div>
    </section>

</div>