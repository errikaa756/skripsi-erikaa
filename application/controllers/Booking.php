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

    public function pesan()
    {
        $params = array();
        $params['reviews'] = $this->review->get_all_reviews();
        $params['month'] = get_two_months_from_db();
        // $update = $this->booking->update_past_days_status();
        $params['month_year'] = date('Y-m');
        $params['days'] = date('d');
        $params['days'] += 3;
        $this->booking->update_days_status($params);

        get_header(get_store_name());
        get_template_part('booking/cart', $params);
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

        $params['customer'] = $this->customer->data();
        $params['book_date'] = $this->input->post('book_date');
        if (empty($params['book_date'])) {
            redirect('booking');
        }
        $params['sisa'] = $this->input->post('sisa');
        $params['dp'] = $this->input->post('dp');
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

    public function pesanan()
    {
        $save = $this->booking->get_last_order_id();
        // input into payment = price, date, img, confirm date, payment date. (belum kesini )


        // input to order booking = user id, order number(generate), order status (ditunda, membayar dp, lunas), order date, total price,  

        $params = $this->input->post();
        if (empty($params)) {
            redirect('booking');
        }
        $user_id = get_current_user_id();
        $order_date = date('Y-m-d H:i:s');
        $name = $params['name'];
        $phone_number = $params['phone_number'];
        $address = $params['address'];
        $note = $params['note'];
        $order_id = $this->_create_order_number($user_id);

        $day = substr($params['book_date'], 8, 2);
        $month_year = substr($params['book_date'], 0, 7);
        $validaste = validate_booking($day, $month_year);

        if ($validaste == True) {
            $booking_day['day'] = $day;
            $booking_day['month_year'] = $month_year;
            $delivery_data = array(
                'customer' => array(
                    'name' => $name,
                    'phone_number' => $phone_number,
                    'address' => $address
                ),
                'note' => $note
            );

            $delivery_data = json_encode($delivery_data);



            $order = [
                'user_id' => $user_id,
                'order_number' => $order_id,
                'order_status' => 'Dalam Proses',
                'order_date' => $order_date,
                'sisa_pembayaran' => $params['sisa'],
                'total_price' => $params['sisa'] + $params['dp'],
                'total_dp' => $params['dp'],
                'delivery_data' => $delivery_data
            ];


            // booking item 
            $save = $this->booking->create_booking($order);
            $booking_item = [
                'order_id' => (int) $save,  
                'day_book' => $params['book_date'],
                'order_price' => $params['sisa'] + $params['dp'],
            ];

            $this->booking->booking_days($booking_day);
            $this->booking->create_booking_items($booking_item);
        } else {
           
            $this->session->set_flashdata('error', 'Sudah Terbooking!');
        }
        redirect('customer/booking/view/'.$save);

        
    }
    public function _create_order_number($user_id)
    {
        $this->load->helper('string');

        $alpha = strtoupper(random_string('alpha', 3));
        $num = random_string('numeric', 3);

        $number = $alpha . date('j') . date('n') . date('y') . $user_id . $num;
        //Random 3 letter . Date . Month . Year . Quantity . User ID . Coupon Used . Numeric

        return $number;
    }
}
