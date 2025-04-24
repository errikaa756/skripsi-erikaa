<?php
defined('BASEPATH') or exit('No direct script access allowed');
use Datadebasa\array2print\array2print;
class Orders2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'order_model' => 'order'
        ));
        $this->pdf = new array2print();
    }


    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Handle POST request
            $postData = $this->input->post();

            // Decode the JSON string into an array
            $tableData = json_decode($postData['tableData'], true);

            // Example: Validate and process the data

            if (!empty($postData['name']) && !empty($postData['email'])) {
                // Perform some action, e.g., save to database
                $this->order->save_order($postData);
                $this->session->set_flashdata('success', 'Order successfully saved.');
            } else {
                $this->session->set_flashdata('error', 'Please fill in all required fields.');
            }
            // Headers untuk tabel PDF
            $headers = [
                'customer' => 'Nama Pelanggan',
                'tanggal_transaksi' => 'Tanggal Transaksi',
                'jumlah_menu' => 'Jumlah Menu',
                'jumlah_harga' => 'Jumlah Harga',
                'status' => 'Status'
            ];
            $data = $tableData;

            // Buat PDF menggunakan array2print (pastikan library ini tersedia)
            $pdf = new array2print();
            $pdf->setData($data)
                ->setHeaders($headers)
                ->setSignature('...................', 'Manager')
                ->generate();

            // Simpan PDF ke direktori output
            $outputDir = FCPATH . 'output';
            if (!file_exists($outputDir)) {
                if (!mkdir($outputDir, 0777, true)) {
                    throw new Exception('Gagal membuat direktori output');
                }
            }

            $pdfPath = $outputDir . '/transaksi_list.pdf';

            if ($pdf->output($pdfPath)) {
                echo "PDF telah berhasil dibuat dan disimpan di: " . $pdfPath . "\n";
                echo "Ukuran file: " . filesize($pdfPath) . " bytes\n";
            } else {
                throw new Exception('Gagal membuat file PDF');
            }
            // Return the file path to be read
            return redirect(base_url('output/transaksi_list.pdf'));
        }

        // Sample data


        // Load the PDF file in the browser
        $params['title'] = 'Laporan Pimpinan Order';

        $config['base_url'] = site_url('admin/orders/index');
        $config['total_rows'] = $this->order->count_all_orders();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link'] = '«';
        $config['last_link'] = '»';
        $config['next_link'] = '›';
        $config['prev_link'] = '‹';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $orders['orders'] = $this->order->get_all_orders($config['per_page'], $page);
        $orders['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('orders/orders2', $orders);
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ($this->order->is_order_exist($id)) {
            $data = $this->order->order_data($id);
            $items = $this->order->order_items($id);
            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;

            $params['title'] = 'Order #' . $data->order_number;

            $order['data'] = $data;
            $order['items'] = $items;
            $order['delivery_data'] = json_decode($data->delivery_data);
            $order['banks'] = $banks;
            $order['order_flash'] = $this->session->flashdata('order_flash');
            $order['payment_flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('orders/view', $order);
            $this->load->view('footer');
        } else {
            show_404();
        }
    }

    public function cetakorders2()
    {
        $params['title'] = 'Cetak Order';

        $config['base_url'] = site_url('admin/orders/index');
        $config['total_rows'] = $this->order->count_all_orders();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);

        $config['first_link'] = '«';
        $config['last_link'] = '»';
        $config['next_link'] = '›';
        $config['prev_link'] = '‹';
        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close'] = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close'] = '</span>Next</li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close'] = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $orders['orders'] = $this->order->get_all_orders($config['per_page'], $page);
        $orders['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('orders/cetakorders2', $orders);

    }


    public function status()
    {
        $status = $this->input->post('status');
        $order = $this->input->post('order');

        $this->order->set_status($status, $order);
        $this->session->set_flashdata('order_flash', 'Status berhasil diperbarui');

        redirect('admin/orders/view/' . $order);
    }
}