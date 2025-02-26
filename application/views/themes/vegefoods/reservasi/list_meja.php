<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(<?php echo get_theme_uri('images/caffebg.jpg'); ?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2"></h1>
                        <h2 class="subheading mb-4">Pesan Dapatkan Kebahgian</h2>
                        <p><a href="#MEJAs" class="btn btn-primary">Dapatkan Sekarang</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(<?php echo get_theme_uri('images/caffebg2.jpg'); ?>);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2"></h1>
                        <h2 class="subheading mb-4">Makanan Enak & Nikmat</h2>
                        <p><a href="#MEJAs" class="btn btn-primary">Dapatkan Sekarang</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section" id="MEJAs">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <!-- <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Gratis Ongkir</h3>
                        <span>Belanja minimal Rp
                            ?php echo format_rupiah(get_settings('min_shop_to_free_shipping_cost')); ?></span>
                    </div>
                </div>
            </div> -->
            <!-- <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-diet"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Selalu Segar</h3>
                        <span>Dipetik Langsung dari Kebun</span>
                    </div>
                </div>
            </div> -->
            <!--<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Kualitas Pelayanan Terbaik</h3>
                        <span>Kualitas Terbaik Bersertifikasi</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Layanan Bantuan</h3>
                        <span>Layanan Bantuan 24/7 Selalu Online</span>
                    </div>
                </div>
            </div>-->
        </div>
    </div>
</section>


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Signature Menu</span>
                <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
                <p><?php echo get_settings('store_tagline'); ?></p>
            </div>
        </div>
    </div>


    <div class="container">
        <span class="subheading">Minuman</span>
        <div class="row">
            <?php

            $MEJAs = [
                (object) [
                    'id' => 1,
                    'sku' => 'P001',
                    'name' => 'MEJA 1',
                    'price' => 100000,
                    'current_discount' => 100000,
                    'picture_name' => 'MEJA1.jpg'
                ],
                (object) [
                    'id' => 2,
                    'sku' => 'P002',
                    'name' => 'MEJA 2',
                    'price' => 100000,
                    'current_discount' => 0,
                    'picture_name' => 'MEJA2.jpg'
                ],
                (object) [
                    'id' => 3,
                    'sku' => 'P003',
                    'name' => 'MEJA 3',
                    'price' => 100000,
                    'current_discount' => 100000,
                    'picture_name' => 'MEJA3.jpg'
                ],
                (object) [
                    'id' => 4,
                    'sku' => 'P004',
                    'name' => 'MEJA 4',
                    'price' => 100000,
                    'current_discount' => 0,
                    'picture_name' => 'MEJA4.jpg'
                ]
            ];
            ?>
            <?php if (count($MEJAs) > 0): ?>
                <?php foreach ($MEJAs as $MEJA): ?>
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="MEJA">
                            <a href="<?php echo site_url('Reservasi/MEJA/' . $MEJA->id . '/' . $MEJA->sku . '/'); ?>"
                                class="img-prod">
                                <img class="img-fluid"
                                    src="<?php echo base_url('assets/uploads/MEJAs/' . $MEJA->picture_name); ?>"
                                    alt="<?php echo $MEJA->name; ?>">
                                <?php if ($MEJA->current_discount > 0): ?>
                                    <span
                                        class="status"><?php echo count_percent_discount($MEJA->current_discount, $MEJA->price, 0); ?>%</span>
                                <?php endif; ?>
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a
                                        href="<?php echo site_url('Reservasi/MEJA/' . $MEJA->id . '/' . $MEJA->sku . '/'); ?>"><?php echo $MEJA->name; ?></a>
                                </h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">
                                            <?php if ($MEJA->current_discount > 0): ?>
                                                <span class="mr-2 price-dc">Rp
                                                    <?php echo format_rupiah($MEJA->price); ?></span><span class="price-sale">Rp
                                                    <?php echo format_rupiah($MEJA->price - $MEJA->current_discount); ?></span>
                                            <?php else: ?>
                                                <span class="mr-2"><span class="price-sale">Rp
                                                        <?php echo format_rupiah($MEJA->price - $MEJA->current_discount); ?></span>
                                                <?php endif; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="<?php echo site_url('Reservasi/MEJA/' . $MEJA->id . '/' . $MEJA->sku . '/'); ?>"
                                            class="buy-now d-flex justify-content-center align-items-center text-center">
                                            <span><i class="ion-ios-menu"></i></span>
                                        </a>
                                        <a href="#"
                                            class="add-to-chart add-cart d-flex justify-content-center align-items-center mx-1"
                                            data-sku="<?php echo $MEJA->sku; ?>" data-name="<?php echo $MEJA->name; ?>"
                                            data-price="<?php echo ($MEJA->current_discount > 0) ? ($MEJA->price - $MEJA->current_discount) : $MEJA->price; ?>"
                                            data-id="<?php echo $MEJA->id; ?>">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>

        </div>
    </div>
</section>