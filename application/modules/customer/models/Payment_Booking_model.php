<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_Booking_model extends CI_Model {
    public $user_id;

    public function __construct()
    {
        parent::__construct();

        $this->user_id = get_current_user_id();
    }

    public function count_all_payments()
    {
        $id = $this->user_id;

        return $this->db->join('orders', 'orders.id = payments.order_id')->where('orders.user_id', $id)->get('payments')->num_rows();
    }

    public function get_all_payments()
    {
        $id = $this->user_id;

      
        $order = $this->db->query("
            SELECT p.*, o.order_number
            FROM booking_payment p
            JOIN order_booking o
                ON o.id = p.order_id
            WHERE o.user_id = '$id'
        ");

        return $order->result();
    }

    public function register_payment($id, Array $data)
    {
        $this->db->where('id', $id)->update('order_booking', array('order_status' => "Menunggu Konfirmasi"));
        $this->db->insert('booking_payment', $data);

        return $this->db->insert_id();
    }

    public function payment_list()
    {
        $id = $this->user_id;

        $booking = $this->db->query("
            SELECT p.*, o.order_number
            FROM booking_payment p
            JOIN order_booking o
                ON o.id = p.order_id
            WHERE o.user_id = '$id'
            LIMIT 5");
        return $booking->result();
    }

    public function is_payment_exist($id)
    {
        return ($this->db->where('id', $id)->get('payments')->num_rows() > 0) ? TRUE : FALSE;
    }

    public function payment_data($id)
    {
        $data = $this->db->select('p.*, o.order_number')->join('orders o', 'o.id = p.order_id')->where('p.id', $id)->get('payments p')->row();

        return $data;
    }

}