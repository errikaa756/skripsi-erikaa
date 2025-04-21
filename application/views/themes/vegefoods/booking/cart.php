<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$data_booking = booking_info(28);


?>
<div class="hero-wrap hero-bread"
    style="background-image: url('<?php echo get_theme_uri('images/caffebg.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center"></div>
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                    <span>data</span>
                </p>
                <h1 class="mb-0 bread">data</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-data"></section>
    <div class="container">
        <?php if ($data_booking) : ?>
        <form action="<?php echo site_url('booking/checkout'); ?>" method="POST">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="data-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>Service</th>
                                    <th>Tanggal</th>
                                    <th>DP</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    
                                    <td class="image-prod">
                                        <div class="img img-fluid rounded"
                                            style="background-image:url(<?php echo base_url('assets/uploads/products/tempat-aula.png'); ?>);">
                                        </div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?php echo $data_booking['name']; ?></h3>
                                    </td>


                                    <td class="data-date"><?php echo $data_booking['book_date']; ?></td>

                                    <td class="dp">Rp <?php echo format_rupiah($data_booking['price'] * (get_diskonpersentase()/100)); ?></td>


                                    <td class="total">Rp <?php echo format_rupiah($data_booking['price']); ?></td>
                                </tr><!-- END TR-->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Order Summary</h3>
                    <p class="d-flex">
                        <span>Dp Minimal <?= get_diskonpersentase() ?>%</span>
                        <span class="n-subtotal font-weight-bold">Rp
                            <?php echo format_rupiah($data_booking['price'] * (get_diskonpersentase()/100)); ?></span>
                    </p>
                    <p class="d-flex">
                        <span>waktu Pelunasan </span>
                        <span class="n-subtotal font-weight-bold">
                        <?= get_waktu_pelunasan() ?> Menit</span>
                    </p>
                    
                    <hr>
                    <p class="d-flex total-price">
                        <span>Sisa Pembayaran</span>
                        <span class="n-total font-weight-bold">Rp <?= format_rupiah($data_booking['sisa']); ?></span>
                    </p>
                </div>
                <input type="hidden" value='<?= $data_booking['book_date']; ?>' name='book_date'>
                <input type="hidden" value='<?= $data_booking['dp']; ?>' name='dp'>
                <input type="hidden" value='<?= $data_booking['sisa']; ?>' name='sisa'>
                <p><button type="submit" class="btn btn-primary py-3 px-4">Checkout</button></p>
            </div>
        </form>
        <?php else : ?>
        <div class="row"></div>
            <div class="col-md-12 ftco-animate"></div>
                <div class="alert alert-info">No datas in the cart.<br><?php echo anchor('browse', 'Browse our services'); ?> and start data!
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>

<script>
$('.remove-item').click(function(e) {
    e.preventDefault();

    var rowid = $(this).data('rowid');
    var tr = $('.data-' + rowid);

    $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Removing...');

    $.ajax({
        method: 'POST',
        url: '<?php echo site_url('data/cart_api?action=remove_item'); ?>',
        data: {
            rowid: rowid
        },
        success: function(res) {
            if (res.code == 204) {
                tr.addClass('alert alert-danger');

                setTimeout(function(e) {
                    tr.hide('fade');

                    $('.n-subtotal').text(res.total.subtotal);
                    $('.n-ongkir').text(res.total.ongkir);
                    $('.n-total').text(res.total.total);
                }, 2000);
            }
        }
    })
})
</script>
