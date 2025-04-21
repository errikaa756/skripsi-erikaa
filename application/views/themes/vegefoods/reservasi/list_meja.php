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
        
        <div class="row">

            <?php if (count($list_meja) > 0): ?>
                <?php foreach ($list_meja as $MEJA): ?>
                    <div class="col-md-4 col-lg-2 ftco-animate fadeInUp ftco-animated">
                      
                        <div class="product <?= $MEJA->staus_availabel =='0' ? 'booked' : ''; ?>">
                            <a href="<?= $MEJA->staus_availabel == '1' ? site_url('Reservasi/MEJA/' . $url . '/' . $MEJA->id . '/'.$day_id) : 'javascript:void(0);'; ?>"
                                class="img-prod">
                                <?php if ($MEJA->staus_availabel == '0') { ?>
                                    <span class="status" style="z-index: 999;">Tidak Tersedia</span>
                                <?php } else { ?>
                                    <span class="status" style="z-index: 999;">Tersedida</span>

                                <?php } ?>
                                <img class="img-fluid"
                                    src="<?php echo base_url('assets/uploads/products/' . $MEJA->picture_name); ?>"
                                    alt="<?php echo $MEJA->name; ?>">

                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a
                                        href="<?php echo site_url('Reservasi/MEJA/' . $url . '/' . $MEJA->id . '/'); ?>"><?php echo $MEJA->name; ?></a>
                                </h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p class="price">

                                            <span class="mr-2"><span class="price-sale">Rp
                                                    <?php echo format_rupiah($MEJA->price); ?></span>
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
            <?php endif; ?>
<style>
    .booked{
        filter: grayscale(100%);
    }
</style>
        </div>
    </div>
</section>