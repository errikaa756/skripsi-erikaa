<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        verify_session('admin');

        $this->load->model(array(
            'order_model' => 'order',
            'Order_booking' => 'order_booking',
            'payment_model' => 'payment',
            'Payment_booking' => 'payment_booking'
        ));
    }

    public function index()
    {
        $params['title'] = 'Kelola Pembayaran';

        $config['base_url'] = site_url('admin/booking/index');
        $config['total_rows'] = $this->payment->count_all_payments();
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
 
        $payments['payments'] = $this->payment->get_all_payments($config['per_page'], $page);
        $payments['booking']=$this->payment_booking->get_all_payments();
        // var_dump($payments['booking']);
        $payments['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $params);
        $this->load->view('payment_booking/payments', $payments);
        $this->load->view('footer');
    }

    public function view($id = 0)
    {
        if ( $this->payment_booking->is_payment_exist($id))
        {
            $data = $this->payment->payment_data($id);
            $booking = $this->payment_booking->payment_data($id);

            $banks = json_decode(get_settings('payment_banks'));
            $banks = (Array) $banks;

            $params['title'] = 'Pembayaran Order #'. $booking->order_number;

            $payments['banks'] = $banks;
            $payments['payment'] = $data;
            $payments['booking'] = $booking;
            $payments['flash'] = $this->session->flashdata('payment_flash');

            $this->load->view('header', $params);
            $this->load->view('payment_booking/view', $payments);
            $this->load->view('footer');
        }
        else
        {
            show_404();
        }
    }

    public function verify()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');
        $action = $this->input->post('action');
        $redir = $this->input->post('redir');
        $data = [
            'id' => $id,
            'order' => $order,
            'action' => $action,
            'redir' => $redir

        ];
        

        if ($action == 1)
        {
            $status = 2;
            $flash = 'Pembayaran berhasil dikonfirmasi';
        }
        else if($action == 2)
        {
            $status = 3;
            $flash = 'Pembayaran ditandai sebagai tidak ada';
        }
        else
        {
            $flash = 'Tidak ada tindakan dilakukan';
        }
        var_dump($data);
        $this->payment_booking->set_payment_status($id, $status, $order);

        // $this->payment->set_payment_status($id, $status, $order);

        // $this->session->set_flashdata('payment_flash', $flash);

        // if ($redir == 1)
        //     redirect('admin/payments/view/'. $id);

        // redirect('admin/orders/view/'. $order .'#payment_flash');
    }
}