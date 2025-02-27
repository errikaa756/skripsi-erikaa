<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Order #<?php echo $booking->order_number; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor('customer', 'Home'); ?></li>
                        <li class="breadcrumb-item active"><?php echo anchor('customer/orders', 'Order'); ?></li>
                        <li class="breadcrumb-item active">#<?php echo $booking->order_number; ?></li>
                        <li class="breadcrumb-item active"><?php echo anchor('customer/orders', 'view'); ?></li>
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
                                <td>Nomor</td>
                                <td><b>#<?php echo $booking->order_number; ?></b></td>
                            </tr>
                            <tr>
                                <td>Tangagl Pemesanan</td>
                                <td><b><?php echo get_formatted_date($booking->order_date); ?></b></td>
                            </tr>
                            <tr>
                                <td>Tanggal Booking</td>
                                <td><b><?php echo get_formatted_date($booking->day_book); ?></b></td>
                            </tr>
                            <tr>
                                <td>DP</td>
                                <td><b>Rp <?php echo format_rupiah($booking->total_dp); ?></b></td>
                            </tr>
                            <tr>
                                <td>Sisa</td>
                                <td><b>Rp <?php echo format_rupiah($booking->order_price - $booking->total_dp); ?></b>
                                </td>
                            </tr>

                            <tr>
                                <td>Status</td>
                                <td><i><b>
                                            <?= $booking->order_status ?>
                                        </b>
                                    </i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-heading">Data Penerima</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-hover table-striped table-hover">
                            <tr>
                                <td>Nama</td>
                                <td><b><?php echo $user_data->customer->name; ?></b></td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td><b><?php echo $user_data->customer->phone_number; ?></b></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td><b><?php echo $user_data->customer->address; ?></b></td>
                            </tr>
                            <tr>
                                <td>Catatan</td>
                                <td><b><?php echo $user_data->note; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-heading">Pembayaran</h5>
                    </div>
                    <div class="card-body p-0">
                        <?php if ($booking->payment_price == NULL): ?>
                            <div class="alert alert-info m-2">Tidak ada data pembayaran.</div>
                        <?php else: ?>
                            <table class="table table-hover table-striped table-hover">
                                <tr>
                                    <td>Transfer</td>
                                    <td><b>Rp <?php echo format_rupiah($booking->payment_price); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td><b><?php echo get_formatted_date($booking->payment_date); ?></b></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td><b>
                                            <?= $booking->payment_status ?>
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Transfer ke</td>
                                    <td><b>
                                            <?php
                                            $bank_data = json_decode($booking->payment_data);
                                            $bank_data = (Array) $bank_data;
                                            $transfer_to = $bank_data['transfer_to'];

                                            $transfer_to = $banks[$transfer_to];
                                            $transfer_from = $bank_data['source'];
                                            ?>
                                            <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?>
                                            (<?php echo $transfer_to->number; ?>)
                                        </b></td>
                                </tr>
                                <tr>
                                    <td>Transfer dari</td>
                                    <td><b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?>
                                            (<?php echo $transfer_from->number; ?>)</b></td>
                                </tr>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-heading">Tindakan</h5>
                    </div>
                    <div class="card-body">
                        <div class="text-center actionRow">
                            <?php if ($booking->payment_status == Null): ?>
                                    <p>Order selesai</p>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#deleteModal"><i
                                            class="fa fa-trash"></i> Hapus</a>
                            <?php elseif ($booking->payment_method == 2): ?>
                                <?php if ($booking->order_status == 1): ?>
                                    <p>Order dalam proses</p>
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal"><i
                                            class="fa fa-times"></i> Batalkan</a>                               
                                <?php else: ?>
                                    <p>Order selesai</p>
                                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#deleteModal"><i
                                            class="fa fa-trash"></i> Hapus</a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
