<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Pembayaran Order #<?php echo $payment->order_number; ?></h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><?php echo anchor('admin/booking', 'Pembayaran'); ?></li>
              <li class="breadcrumb-item active" aria-current="page">#<?php echo $payment->order_number; ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Page content -->
<div class="container-fluid mt--6">
  
  <!-- booking -->
  <div class="row">
    <div class="col-md-8">
      <div class="card-wrapper">
        <div class="card">
          <div class="card-header">
            <h3 class="mb-0">Pembayaran #<?php echo $payment->order_number; ?></h3>
            <?php if ($flash): ?>
              <span class="float-right text-success font-weight-bold"
                style="margin-top: -30px;"><?php echo $flash; ?></span>
            <?php endif; ?>
          </div>
          <div class="card-body p-0">
            <table class="table align-items-center table-flush table-hover">
              <tr>
                <td>Transfer</td>
                <td><b>Rp <?php echo format_rupiah($payment->payment_price); ?></b></td>
              </tr>
              <tr>
                <td>Tanggal Pemesanan</td>
                <td><b><?php echo get_formatted_date($payment->payment_date); ?></b></td>
              </tr>
              <tr>
                <td>Tanggal Booking</td>
                <td><b><?php echo get_formatted_date($payment->month_year.'-'.$payment->day); ?></b></td>
              </tr>
              <tr>
                <td>Status</td>
                <td><b>
                  <span class="badge badge-info"></span><?= $payment->payment_status ?></span>
                    
                  </b></td>
              </tr>
              <tr>
                <td>Transfer ke</td>
                <td>
                  <div style="white-space: initial;"><b>
                      <?php
                      $bank_data = json_decode($payment->payment_data);
                      $bank_data = (Array) $bank_data;
                      $transfer_to = $bank_data['transfer_to'];

                      $transfer_to = $banks[$transfer_to];
                      $transfer_from = $bank_data['source'];
                      ?>
                      <?php echo $transfer_to->bank; ?> a.n <?php echo $transfer_to->name; ?>
                      (<?php echo $transfer_to->number; ?>)
                    </b></div>
                </td>
              </tr>
              <tr>
                <td>Transfer dari</td>
                <td>
                  <div style="white-space: initial;">
                    <b><?php echo $transfer_from->bank; ?> a.n <?php echo $transfer_from->name; ?>
                      (<?php echo $transfer_from->number; ?>)</b>
                  </div>
                </td>
              </tr>
            </table>
          </div>

        </div>

      </div>

    </div>
    <div class="col-md-4">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="mb-0">Bukti Pembayaran</h3>
        </div>
        <div class="card-body p-0">
          <img alt="Pembayaran Order #<?php echo $payment->order_number; ?>" class="img img-fluid"
            src="<?php echo base_url('assets/uploads/payments/' . $payment->picture_name); ?>">
        </div>
        <div class="card-footer">
          <form action="<?php echo site_url('admin/booking/verify'); ?>" method="POST">

            <div class="row">
              <input type="hidden" name="id" value="<?php echo $payment->id; ?>">
              <input type="hidden" name="order" value="<?php echo $payment->order_id; ?>">
              <?php $date_book =get_month_year($payment->month_year.'-'.$payment->day); ?>
              <input type="hidden" name="month_year" value="<?=  $payment->month_year?>">
              <input type="hidden" name="day" value="<?=  $payment->day?>">
              <div class="col-md-9">
                <select class="form-control" name="status">
                    <?php foreach (get_status_booking() as $status): ?>
                    <option value="<?= $status ?>" <?= $status == $payment->payment_status ? 'selected' : '' ?>><?= $status == 'Ditolak' ? 'Tolak' : ($status == 'Selesai' ? 'Terima' : $status) ?></option>  
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-md-3 text-right">
                <input type="submit" class="btn btn-primary" value="OK">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>