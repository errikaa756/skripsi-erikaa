<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                <span>Checkout</span>
            </p>
            <h1 class="mb-0 bread">Checkout</h1>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <form action="<?php echo site_url('booking/pesanan'); ?>" method="POST">

            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate d-none">
                    <h3 class="mb-4 billing-heading">Pembelian produk</h3>

                    <div class="form-group">
                        <label for="name" class="form-control-label">Pembelian untuk (nama):</label>
                        <input type="text" name="name" value="<?php echo $customer->name; ?>" class="form-control" id="name" required>
                    </div>

                    <div class="form-group">
                        <label for="hp" class="form-control-label">No. HP:</label>
                        <input type="text" name="phone_number" value="<?php echo $customer->phone_number; ?>" class="form-control" id="hp" required>
                    </div>

                    <div class="form-group">
                        <label for="address" class="form-control-label">Alamat:</label>
                        <textarea name="address" class="form-control" id="address" required><?php echo $customer->address; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="note" class="form-control-label">Catatan:</label>
                        <textarea name="note" class="form-control" id="note"></textarea>
                    </div>

                </div>
                <div class="col-xl">
                <!-- <div class="col-xl-5"> -->
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Rincian Belanja</h3>
                                <p class="d-flex">
                                    <span>Nama</span>
                                    <span><?php echo strtoupper($customer->name); ?></span>
                                </p>
                                <p class="d-flex">
                                    <span>Tanggal Booking</span>
                                    <span><?= $book_date ?></span>
                                    <input type="hidden" value="<?= $book_date ?>" name="book_date" id="book_date">
                                </p>
                                <hr>
                                <p class="d-flex">
                                    <span>Dp Minimal <?= get_diskonpersentase() ?>%</span>
                                    <span>RP. <?= format_rupiah($dp) ?></span>
                                    <input type="hidden" value="<?= $dp ?>" name="dp" id="dp"> 
                                </p>
                                <p class="d-flex">
                                    <span>Waktu Pelunasan </span>
                                    <span> <?= get_waktu_pelunasan() ?> Menit</span>
                                    
                                </p>
                                <hr>
                                <p class="d-flex total-price">
                                    <span>Sisa Pembayaran </span>
                                    <span>RP. <?= format_rupiah($sisa) ?></span>
                                    <input type="hidden" value="<?= $sisa ?>" name="sisa" id="sisa">
                                </p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Metode Pembayaran</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="payment" class="mr-2" value="1" checked> Transfer bank</label>
                                        </div>
                                    </div>
                                </div>
                          
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <img class="img-fluid" src="<?php echo base_url('assets/qris.png'); ?>" alt="QRIS" style="max-width: 200px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-right" style="margin-top: 10px;">
                                <input type="submit" class="btn btn-primary py-2 px-2" value="Buat Pesanan">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>