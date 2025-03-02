<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<!--<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bg_1.jpg'); ?>');">-->
<div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                <span class="mr-2"><?php echo anchor('browse', 'Produk'); ?></span>
                <span><?php echo $reservasi->name; ?></span>
            </p>
            <h1 class="mb-0 bread">Reservasi Meja</h1>
        </div>
    </div>
</div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo base_url('assets/uploads/products/' . $reservasi->picture_name); ?>"
                    class="image-popup"><img
                        src="<?php echo base_url('assets/uploads/products/' . $reservasi->picture_name); ?>"
                        class="img-fluid" alt="<?php echo $reservasi->name; ?>"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $reservasi->name; ?></h3>
                <h4>Tanggal Reservasi : <i><?php echo get_formatted_date($date_tour); ?></i></h4>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <p class="price">
                    <span>Rp <?php echo format_rupiah($reservasi->price); ?></span>
                </p>
                <p><?php echo $reservasi->paket; ?></p>
                
                <form action="<?php echo site_url('Reservasi/pesan'); ?>" method='POST'>                    
                    <input type="hidden" value='<?= $date_tour ?>' name='date_book'>
                    <input type="hidden" value="<?= $reservasi->id ?>" name="id">
                    <input type="hidden" value="<?= $day_id ?>" name="day_id">
                    <input type="submit" class='btn btn-black btn-sm py-3 px-5' value='Pesan'>

                </form>
                <!-- <p><a href="<?php echo site_url('booking/book/26/2025-02'); ?>" class='btn btn-black btn-sm py-3 px-5 '>Pesan</a> -->
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function () {

        var quantitiy = 0;
        $('.quantity-right-plus').click(function (e) {

            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            $('#quantity').val(quantity + 1);
            $('.cart-btn').attr('data-qty', quantity + 1);

            // Increment

        });

        $('.quantity-left-minus').click(function (e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());

            // If is not undefined

            // Increment
            if (quantity > 0) {
                $('#quantity').val(quantity - 1);
                $('.cart-btn').attr('data-qty', quantity - 1);
            }
        });

    });
</script>