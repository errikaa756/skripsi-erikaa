<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_orders()
    {
        $id = $this->user_id;

        return $this->db->where('user_id', $id)->get('orders')->num_rows();
    }

    public function count_process_order()
    {
        $id = $this->user_id;

        return $this->db->where(array('user_id' => $id, 'order_status' => 2))->get('orders')->num_rows();
    }

    public function get_all_orders($limit, $start)
    {
        $id = $this->user_id;
        $booking = $this->db->query("
            SELECT o.id, o.order_number, o.order_status, o.order_date, o.total_price, o.total_dp, o.sisa_pembayaran, i.day_book, i.order_price
            FROM order_booking o 
            LEFT JOIN booking_item i
                ON i.order_id = o.id
            WHERE o.user_id = '$id'");

        

        return $booking->result();
    }

    public function order_with_bank_payments()
    {
        return $this->db->where(array('user_id' => $this->user_id))->order_by('order_date', 'DESC')->get('order_booking')->result();
    }

    public function is_order_exist($id)
    {
        $user_id = $this->user_id;

        return ($this->db->where(array('id' => $id, 'user_id' => $user_id))->get('order_booking')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function order_data($id)
    {
        $order = $this->db->query("
        SELECT o.*, p.payment_price, p.payment_date, p.picture_name, p.payment_status, p.confirmed_date, p.payment_data, i.day_book, i.order_price
        FROM order_booking o 
        LEFT JOIN booking_payment p
            ON p.order_id = o.id
        LEFT JOIN booking_item i
                ON i.order_id = o.id
            
        WHERE o.id = '$id'");
      
        return $order->row();
    }

    public function order_items($id)
    {
        $book_info = $this->db->query("
            SELECT o.*, i.day_book, i.order_price
            FROM order_booking o
            LEFT JOIN booking_item i
                ON i.order_id = o.id
            WHERE o.id = '$id'");
        $items = $this->db->query("
            SELECT oi.product_id, oi.order_qty, oi.order_price, p.name, p.picture_name, p.date_tour
            FROM order_item oi
            JOIN packages p
	            ON p.id = oi.product_id
            WHERE order_id = '$id'");

        return $book_info->result();
    }

    public function cancel_order($id)
    {
        $data = $this->order_data($id);
        $payment_method = $data->payment_method;

        $status =  ($payment_method == 1) ? 5 : 4;

        return $this->db->where('id', $id)->update('orders', array('order_status' => $status));
    }

    public function delete_order($id)
    {
        if ( ($this->db->where('order_id', $id)->get('order_item')->num_rows() > 0))
            $this->db->where('order_id', $id)->delete('order_item');
        
        if ( ($this->db->where('order_id', $id)->get('payments')->num_rows() > 0))
            $this->db->where('order_id', $id)->delete('payments');

        $this->db->where('id', $id)->delete('orders');
    }

    public function all_orders()
    {
        return $this->db->where('user_id', $this->user_id)->order_by('order_date', 'DESC')->get('orders')->result();
    }
}