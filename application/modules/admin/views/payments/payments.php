<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!-- Header -->
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Kelola Pembayaran</h6>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">Pembayaran</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Kelola Pembayaran</h3>
          <div class="col-md-2 ">
            <a href="<?php echo site_url('admin/payments'); ?>"
              class="btn btn-sm btn-primary shadow-sm d-inline-flex align-items-center" target="_blank">
              <i class="fa fa-print mr-2"></i> <span>Print Data</span>
            </a>
            <script>
              document.addEventListener('DOMContentLoaded', function () {
                const printButton = document.querySelector('.btn-primary.shadow-sm');
                printButton.addEventListener('click', function (event) {
                  event.preventDefault();

                  const table = document.querySelector('.table');
                  const tableHTML = table.outerHTML;

                  const printWindow = window.open('', '_blank');
                  printWindow.document.write(`
                    <html>
                      <head>
                        <title>DT Archery </title>
                        <style>
                          .kop-surat {
                            display: flex;
                            align-items: center;
                            padding: 10px 20px;
                            border-bottom: 2px solid black;
                            margin-bottom: 20px;
                          }

                          .logo {
                            width: 80px;
                            height: 80px;
                            margin-right: 20px;
                          }

                          .header-text {
                            text-align: center;
                            flex: 1;
                          }

                          .header-text h1 {
                            margin: 0;
                            font-size: 24px;
                            text-transform: uppercase;
                          }

                          .header-text h2 {
                            margin: 5px 0;
                            font-size: 18px;
                          }

                          .header-text p {
                            margin: 0;
                            font-size: 14px;
                          }

                          .header-text hr {
                            border: none;
                            border-top: 2px solid black;
                            margin-top: 10px;
                          }
                          table {
                            width: 100%;
                            border-collapse: collapse;
                          }
                          th, td {
                            border: 1px solid #ddd;
                            padding: 8px;
                            text-align: left;
                          }
                          th {
                            background-color: #f2f2f2;
                          }

                          .footer-ttd {
                            width: 100%;
                            margin-top: 50px;
                            display: flex;
                            justify-content: flex-end;
                          }

                          .ttd {
                            text-align: center;
                            width: 250px;
                          }

                          .ttd .nama {
                            margin-top: 80px;
                            font-weight: bold;
                            text-decoration: underline;
                          }

                          .ttd .jabatan {
                            margin-top: -5px;
                          }
                        </style>
                      </head>
                      <body>
                      <div class="kop-surat">
                        <img src="http://localhost/cafenatar/assets/uploads/sites/Logo_Cafe.png" alt="Logo" class="logo">
                        <div class="header-text">
                          <h1>DT Archery </h1>
                          <p>Merak Batin, Kec. Natar, Kabupaten Lampung Selatan, Lampung 35362</p>
                        </div>
                      </div>
                        <h3>Data Pembayaran</h3>
                        ${tableHTML}
                        <!-- Footer untuk tanda tangan -->
                        <div class="footer-ttd">
                          <div class="ttd">
                            <p>Bandar Lampung, <?php echo date('d F Y'); ?></p>
                            <p>Pemilik Djayataruna Cafe & Archery</p>
                            <p class="nama">Saka Fatihan Djayataruna</p>
                          </div>
                        </div>
                      </body>
                    </html>
                  `);
                  printWindow.document.close();
                  printWindow.print();
                });
              });
            </script>

          </div>
        </div>

        <?php if (count($payments) > 0): ?>
        <div class="card-body p-0">
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Pembayaran Order</th>
                  <th scope="col">Customer</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                  <th scope="col">
                    <?php echo $payment->id; ?>
                  </th>
                  <td>#<?php echo anchor('admin/payments/view/' . $payment->id, $payment->order_number); ?></td>
                  <td>
                    <?php echo $payment->customer; ?>
                  </td>
                  <td>
                    <?php echo get_formatted_date($payment->payment_date); ?>
                  </td>
                  <td>
                    Rp <?php echo format_rupiah($payment->payment_price); ?>
                  </td>
                  <td><?php echo get_payment_status($payment->status); ?></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card-footer">
          <?php echo $pagination; ?>
        </div>
        <?php else: ?>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">
              <div class="alert alert-primary">
                Belum ada data produk yang ditambahkan. Silahkan menambahkan baru.
              </div>
            </div>
            <div class="col-md-4">
              <a href="<?php echo site_url('admin/products/add_new_product'); ?>"><i class="fa fa-plus"></i> Tambah
                produk baru</a>
              <br>
              <a href="<?php echo site_url('admin/products/category'); ?>"><i class="fa fa-list"></i> Kelola
                kategori</a>
            </div>
          </div>
        </div>
        <?php endif; ?>

      </div>
    </div>
  </div>