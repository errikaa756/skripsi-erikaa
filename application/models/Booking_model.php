<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Booking_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function is_available($id, $month_year)
    {
        return ($this->db->where(array('day' => $id, 'month_year' => $month_year, 'available'=>TRUE))->get('calendar_days')->num_rows() > 0) ? TRUE : FALSE;
    }
    public function create_order(Array $data)
    {
        $this->db->insert('order_booking', $data);

        return $this->db->insert_id();
    }

    public function create_order_items($data)
    {
        return $this->db->insert_batch('booking_item', $data);
    }

    public function update_past_days_status() {
        // Ambil tanggal hari ini
        $today = date('Y-m-d');  // Format 'YYYY-MM-DD'
        $current_month_year = date('Y-m');  // Format 'YYYY-MM' untuk bulan dan tahun sekarang

        // Ambil data bulan yang ada di tabel 'months' berdasarkan bulan dan tahun sekarang
        $this->db->select('month_year, days_in_month');
        $this->db->where('month_year', $current_month_year);  // Cek bulan dan tahun yang sesuai
        $query = $this->db->get('months');
        $month_data = $query->row();

        if ($month_data) {
            // Mengambil jumlah hari dalam bulan tersebut
            $days_in_month = $month_data->days_in_month;

            // Perbarui status hari yang sudah lewat untuk bulan dan tahun sekarang
            $this->db->set('available', 0);  // Mengubah status menjadi tidak tersedia (terbooking)
            $this->db->where('month_year', $current_month_year);  // Filter berdasarkan bulan tahun sekarang
            $this->db->where('day <', date('d'));  // Cek hari yang sudah lewat
            $this->db->update('calendar_days');
        }
    }

    public function update_days_status($params) {
        // Perbarui status hari yang sudah lewat untuk bulan dan tahun yang diberikan
        $this->db->set('available', 0);  // Mengubah status menjadi tidak tersedia (terbooking)
        $this->db->where('month_year', $params['month_year']);  // Filter berdasarkan bulan tahun yang diberikan
        $this->db->where('day <', $params['days']);  // Cek hari yang sudah lewat berdasarkan tanggal yang diberikan
        $this->db->update('calendar_days');
    }



    public function testing_modal(){
        return 'testing';
    }
}