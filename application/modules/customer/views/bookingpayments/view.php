<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pembayaran Order #<?php echo $booking->order_number; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor('customer', 'Home'); ?></li>
                        <li class="breadcrumb-item active"><?php echo anchor('customer/payments', 'Pembayaran'); ?></li>
                        <li class="breadcrumb-item active">Order #<?php echo $booking->order_number; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-heading">Data Order</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped table-hover">
                            <tr>
                                <td>Order</td>
                                <td>#<b><?php echo $booking->order_number; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tanggal</td>
                                <td><b><?php echo get_formatted_date($booking->payment_date); ?></b></td>
                            </tr>
                            <tr>
                                <td>Jumlah transfer</td>
                                <td><b>Rp <?php echo format_rupiah($booking->payment_price); ?></b></td>
                            </tr>
                            <tr>
                                <td>Transfer dari</td>
                                <td><b><?php echo $payment->source->bank; ?> a.n <?php echo $payment->source->name; ?>
                                        (<?php echo $payment->source->number; ?>)</td>
                            </tr>
                            <tr>
                                <td>Transfer ke</td>
                                <td><b>
                                        <?php
                                        $transfer_to = $payment->transfer_to;
                                        $transfer_to = $banks[$transfer_to];
                                        
                                    ?>
                                        <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?>
                                        (<?php echo $transfer_to->number; ?>)
                                    </b></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><b><?php echo $booking->payment_status; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-heading">Bukti Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img alt="Pembayaran order #<?php echo $booking->order_number; ?>" class="img img-fluid"
                                src="<?php echo base_url('assets/uploads/payments/'. $booking->picture_name); ?>">
                        </div>
                        <a href="<?php echo base_url('assets/uploads/payments/'. $booking->picture_name); ?>">Pdf File</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>