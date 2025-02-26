<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="hero-wrap hero-bread" style="background-image: url('<?php echo get_theme_uri('images/caffebg2.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                    <span>Reservasi</span></p>
                <h1 class="mb-0 bread">Reservasi</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Reservasi Menu</span>
                <h2 class="mb-4"><?php echo get_store_name(); ?></h2>
                <p><?php echo get_settings('store_tagline'); ?></p>
            </div>
        </div>
    </div>
    <style>
        .booked {
            /* opacity: 0.5; */
            filter: grayscale(100%);
        }
    </style>
    <div class="container">
        <div class="row">
            <?php
            $params['month'] = get_two_months_from_db();
            $current_month = '';
            foreach ($params['month'] as $day):
                $month_year = date('F Y', strtotime($day['month_year']));
                if ($current_month != $month_year):
                    if ($current_month != ''):
                        echo '</div>'; // Close previous month section
                    endif;
                    $current_month = $month_year;
                    echo '<div class="col-12"><h3 class="mb-4">' . $current_month . '</h3></div>';
                    echo '<div class="row">';
                endif;
                ?>
                <div class="col-md-4 col-lg-2 ftco-animate">
                    <div class="product <?php echo $day['available'] == '0' ? 'booked' : ''; ?>">
                        <a href="<?php echo $day['available'] == '1' ? site_url('Reservasi/form/' . $day['day'] . '/' . $day['month_year']) : 'javascript:void(0);'; ?>"
                            class='img-prod'>
                            <img class="img-fluid" src="<?php echo base_url('assets/uploads/products/tempat-aula.png'); ?>"
                                alt="Colorlib Template">
                            <?php if ($day['available'] == '0'): ?>
                                <span class="status">Terbooking</span>
                            <?php else: ?>
                                <span class="status">Tersedia</span>
                            <?php endif; ?>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href=""><?= $day['day'] . ' ' . date('F Y', strtotime($day['month_year'])); ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="price-sale">Rp.
                                            <?= format_rupiah($produk_book['price']) ?></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div> <!-- Close the last month section -->
    </div>
    </div>
</section>