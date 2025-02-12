<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Combined data
$booking = [
    'rowid' => '1',
    'id' => '101',
    'name' => 'Service 1',
    'qty' => 2,
    'booking_date' => '2023-10-01',
    'subtotal' => 200000,
    'dp' => 50000
];
$total_booking = 200000;
$shipping_cost = is_numeric(get_settings('shipping_cost')) ? get_settings('shipping_cost') : 0;
$total_price = 200000 + $shipping_cost;

?>
<div class="hero-wrap hero-bread"
    style="background-image: url('<?php echo get_theme_uri('images/caffebg.jpg'); ?>');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center"></div>
                <p class="breadcrumbs"><span class="mr-2"><?php echo anchor(base_url(), 'Home'); ?></span>
                    <span>Booking</span>
                </p>
                <h1 class="mb-0 bread">Booking</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-booking"></section>
    <div class="container">
        <?php if ($booking) : ?>
        <form action="<?php echo site_url('booking/checkout'); ?>" method="POST">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="booking-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Service</th>
                                    <th>Booking Date</th>
                                    <th>Price</th>
                                    <th>DP</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center booking-<?php echo $booking['rowid']; ?>">
                                    <td class="product-remove"><a href="#" class="remove-item"
                                            data-rowid="<?php echo $booking['rowid']; ?>"><span
                                                class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img img-fluid rounded"
                                            style="background-image:url(<?php echo base_url('assets/uploads/products/tempat-aula.png'); ?>);">
                                        </div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?php echo $booking['name']; ?></h3>
                                    </td>


                                    <td class="booking-date"><?php echo $booking['booking_date']; ?></td>

                                    <td class="dp">Rp <?php echo format_rupiah($booking['dp']); ?></td>


                                    <td class="total">Rp <?php echo format_rupiah($booking['subtotal']); ?></td>
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
                        <span>Subtotal</span>
                        <span class="n-subtotal font-weight-bold">Rp
                            <?php echo format_rupiah($total_booking); ?></span>
                    </p>
                    
                    <hr>
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span class="n-total font-weight-bold">Rp <?php echo format_rupiah($total_price); ?></span>
                    </p>
                </div>
                <p><button type="submit" class="btn btn-primary py-3 px-4">Checkout</button></p>
            </div>
        </form>
        <?php else : ?>
        <div class="row"></div>
            <div class="col-md-12 ftco-animate"></div>
                <div class="alert alert-info">No bookings in the cart.<br><?php echo anchor('browse', 'Browse our services'); ?> and start booking!
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
    var tr = $('.booking-' + rowid);

    $('.product-name', tr).html('<i class="fa fa-spin fa-spinner"></i> Removing...');

    $.ajax({
        method: 'POST',
        url: '<?php echo site_url('booking/cart_api?action=remove_item'); ?>',
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
