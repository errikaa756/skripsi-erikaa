<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-5">
                    <h1>Pembayaran Saya</h1>
                </div>
                <div class="col-sm-2">
                    <?php echo anchor('customer/BookingPayments/confirm', 'Tambah Pembayaran'); ?>
                </div>
                <div class="col-sm-5">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor(base_url(), 'Home'); ?></li>
                        <li class="breadcrumb-item active">Pembayaran</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card card-primary">
            <div class="card-body<?php echo ( count($booking) > 0) ? ' p-0' : ''; ?>">
            <?php if ( count($booking) > 0) : ?>
                <div class="table-responsive">
                    <table class="table table-striped m-0">
                        <tr class="bg-primary">
                            <th scope="col">No.</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Tanggal Booking</th>
                            <th scope="col">Status</th>
                        </tr>
                        <?php foreach ($booking as $payment) : ?>
                            <tr>
                                <td><?php echo $payment->id; ?></td>
                                <td><?php echo anchor('customer/BookingPayments/view/'. $payment->order_id, '#'. $payment->order_number); ?></td>
                                <td><?php echo get_formatted_date($payment->payment_date); ?></td>
                                <td><?php echo $payment->payment_status; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else : ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-info">
                            Belum ada data pembayaran
                        </div>

                        <?php echo anchor('customer/BookingPayments/confirm', 'Konfirmasi pembayaran baru'); ?>
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