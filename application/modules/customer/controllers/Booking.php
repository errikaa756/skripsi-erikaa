<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('customer');

        $this->load->model(array(
            'order_model' => 'order',
            'booking_model' => 'booking',
        ));
    }

    public function index()
    {
        $params['title'] = 'Daftar Booking';

        $config['base_url'] = site_url('customer/orders/index');
        $config['total_rows'] = $this->order->count_all_orders();
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $choice = $config['total_rows'] / $config['per_page'];
        $config['num_links'] = floor($choice);
 
        $config['first_link']       = '«';
        $config['last_link']        = '»';
        $config['next_link']        = '›';
        $config['prev_link']        = '‹';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->load->library('pagination', $config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
 
        $orders['orders'] = $this->order->get_all_orders($config['per_page'], $page);
        $orders['booking'] = $this->booking->get_all_orders($config['per_page'], $page);
        $orders['pagination'] = $this->pagination->create_links();


        $this->load->view('header', $params);
        $this->load->view('booking/orders', $orders);
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ( $this->booking->is_order_exist($id))
        {
            $booking = $this->booking->order_data($id);
            $data = $this->order->order_data($id);
            $items = $this->order->order_items($id);
            $book_item = $this->booking->order_items($id);
            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;
            
            $params['title'] = 'Order #'. $booking->order_number;
            
            $order['data'] = $data;
            $order['items'] = $items;
            $order['banks'] = $banks;
            $order['booking']=$booking;
            $order['book_item']=$book_item;
            $order['user_data']=json_decode($booking->delivery_data);
            $this->load->view('header', $params);
            $this->load->view('booking/view', $order);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }
//cetak order
    public function cetak_order($id = 0)
    {
        if ( $this->order->is_order_exist($id))
        {
            $data = $this->order->order_data($id);
            $items = $this->order->order_items($id);
            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;
 
            $params['title'] = 'Order #'. $data->order_number;

            $order['data'] = $data;
            $order['items'] = $items;
            $order['delivery_data'] = json_decode($data->delivery_data);
            $order['banks'] = $banks;

            $this->load->view('header', $params);
            $this->load->view('orders/cetakorder', $order);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function order_api()
    {
        $action = $this->input->get('action');

        switch ($action)
        {
            case 'cancel_order' :
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if ( ($data->payment_method == 1 && $data->order_status == 1) || ($data->payment_method == 2 && $data->order_status == 1))
                {
                    $this->order->cancel_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dibatalkan');
                }
                else
                {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dibatalkan');
                }
            break;
            case 'delete_order' :
                $id = $this->input->post('id');
                $data = $this->order->order_data($id);

                if ( ($data->payment_method == 1 && ($data->order_status == 5 || $data->order_status == 4)) || ($data->payment_method == 2 && ($data->order_status == 4 || $sata->order_status == 3)))
                {
                    $this->order->delete_order($id);
                    $response = array('code' => 200, 'success' => TRUE, 'message' => 'Order dihapus');
                }
                else
                {
                    $response = array('code' => 200, 'error' => TRUE, 'message' => 'Order tidak dapat dihapus');
                }
            break;
        }

        $response = json_encode($response);
        $this->output->set_content_type('application/json')
            ->set_output($response);
    }
}