<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Data dummy untuk produk utama
$product = (object)[
    'id' => 1,
    'sku' => 'SKU001',
    'name' => 'Reservasi Meja',
    'picture_name' => 'dummy_main.jpg',
    'price' => 100000,
    'current_discount' => 0,
    'description' => '4 porsi nasi+ayam (ayam bebas req)    4 minum Esteh.',
    'date_tour' => '2025-03-01'
];

// Data dummy untuk produk terkait
$related_products = [
    (object)[
        'id' => 2,
        'sku' => 'SKU002',
        'name' => 'Produk Dummy 1',
        'picture_name' => 'dummy1.jpg',
        'price' => 100000,
        'current_discount' => 20000
    ],
    (object)[
        'id' => 3,
        'sku' => 'SKU003',
        'name' => 'Produk Dummy 2',
        'picture_name' => 'dummy2.jpg',
        'price' => 150000,
        'current_discount' => 0
    ],
    (object)[
        'id' => 4,
        'sku' => 'SKU004',
        'name' => 'Produk Dummy 3',
        'picture_name' => 'dummy3.jpg',
        'price' => 200000,
        'current_discount' => 50000
    ],
    (object)[
        'id' => 5,
        'sku' => 'SKU005',
        'name' => 'Produk Dummy 4',
        'picture_name' => 'dummy4.jpg',
        'price' => 250000,
        'current_discount' => 0
    ]
];
?>

<!--<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/bg_1.jpg'); ?>');">-->
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                    <span class="mr-2"><?php echo anchor('browse', 'Produk'); ?></span>
                    <span><?php echo $product->name; ?></span>
                </p>
                <h1 class="mb-0 bread"><?php echo $product->name; ?></h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>"
                    class="image-popup"><img
                        src="<?php echo base_url('assets/uploads/products/'. $product->picture_name); ?>"
                        class="img-fluid" alt="<?php echo $product->name; ?>"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $product->name; ?></h3>
                <h4><!--Tanggal Keberangkatan : <i><?php echo $product->date_tour; ?>--></i></h4>
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
                    <?php if ($product->current_discount > 0) : ?>
                    <span class="mr-2 price-dc"><strike><small>Rp
                                <?php echo format_rupiah($product->price); ?></small></strike></span>
                    <span class="price-sale text-success">Rp
                        <?php echo format_rupiah($product->price - $product->current_discount); ?></span>
                    <?php else : ?>
                    <span>Rp <?php echo format_rupiah($product->price); ?></span>
                    <?php endif; ?>
                </p>
                <p><?php echo $product->description; ?></p>
                <div class="row mt-4"> 
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p>Tanggal Pembookingan: <?php echo strftime('%A, %d %B %Y', strtotime('2025-02-26')); ?></p>
                    </div>
                    <div class="w-100"></div>
                    
                </div>
                <form action="<?php echo site_url('Reservasi/pesan'); ?>" method='POST'>
                    <input type="hidden" value='26' name='day' id='day'/>
                    <input type="hidden" value='2025-02' name='month_year'>
                    <input type="submit" class='btn btn-black btn-sm py-3 px-5' value='Pesan'>

                </form>
                <!-- <p><a href="<?php echo site_url('booking/book/26/2025-02'); ?>" class='btn btn-black btn-sm py-3 px-5 '>Pesan</a> -->
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {

    var quantitiy = 0;
    $('.quantity-right-plus').click(function(e) {

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);
        $('.cart-btn').attr('data-qty', quantity + 1);

        // Increment

    });

    $('.quantity-left-minus').click(function(e) {
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