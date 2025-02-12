<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->model(array(
            'contact_model' => 'contact',
            'review_model' => 'review',
            'customer_model' => 'customer',     
            'product_model' => 'product',
            'booking_model' => 'booking'
        ));
    }
    public function index()
    {
        $params = array();
        $params['reviews'] = $this->review->get_all_reviews();
        $params['month'] = get_two_months_from_db();
        // $update = $this->booking->update_past_days_status();
        $params['month_year'] = date('Y-m');
        $params['days'] = date('d');
        $params['days'] += 3;
        $this->booking->update_days_status($params);

        generateCalendar('2025', '04');
        get_header(get_store_name());
        get_template_part('booking/book', $params);
        get_footer();
    }

    public function pesan(){
        $data = 'halo';
        get_header('Info Booking | ' . get_settings('store_tagline'));
        get_template_part('booking/cart', $data);
        get_footer();
    }

    public function form($day, $month_year)
    {
        if ($day == 0 || empty($month_year)) {
            show_error('Akses tidak sah!');
        } else {
            if ($this->booking->is_available($day, $month_year)) {
                $data = $this->product->product_data('28');

                $product['product'] = $data;
                $product['month_year'] = $month_year;
                $product['day'] = $day;
                $product['related_products'] = $this->product->related_products($data->id, $data->category_id);

                get_header($data->name . ' | ' . get_settings('store_tagline'));
                get_template_part('booking/view_single_book', $product);
                get_footer();
            } else {
                $this->session->set_flashdata('error', 'Tanggal tidak tersedia!');
                redirect('booking');
            }
        }
    }

    public function book($day = '', $month_year = '')
    {
        if ($day == 0 || empty($month_year)) {
            show_error('Akses tidak sah!');
        } else {
            $params = [
                'rowid' => '1',
                'id' => '101',
                'name' => 'Aula',
                'qty' => 2,
                'booking_date' => $month_year . '-' . str_pad($day, 2, '0', STR_PAD_LEFT),
                'subtotal' => 200000,
                'dp' => 50000
            ];
            
            get_header('Keranjang Belanja');
            get_template_part('booking/cart', $params);
            get_footer();
        }

    }


    public function checkout($action = '')
    {
        $params = array();
        $params['customer'] = $this->customer->data();
        $params['subtotal'] = 120000;
        $params['total'] = 120000;
        if (!is_login()) {
            $coupon = $this->input->post('coupon_code');
            $quantity = $this->input->post('quantity');

            $this->session->set_userdata('_temp_coupon', $coupon);
            $this->session->set_userdata('_temp_quantity', $quantity);

            verify_session('customer');


        }

        get_header('Checkout');
        get_template_part('booking/checkout', $params);
        get_footer();
    }
}
?>