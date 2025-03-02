<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get_reservasi_by_id($id){
        $reservasi = $this->db->query("
            SELECT * FROM reservasi_meja WHERE id=$id
        ");
        return $reservasi->result();

    }
    function get_last_order_id() {
        $this->db->select('id');
        $this->db->from('order_meja');
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        $result = $query->row();
        return $result ? $result->id : null;
    }
    
    public function is_available($id, $month_year)
    {
        return ($this->db->where(array('day' => $id, 'month_year' => $month_year, 'availabel_m'=>TRUE))->get('calendar_days')->num_rows() > 0) ? TRUE : FALSE;
    }
    
    public function get_data(){
        return $this->db->get('reservasi_meja')->result();
    }
    public function get_meja_by_id($id){
        return $this->db->where('id', $id)->get('reservasi_meja')->row();
    }

    public function get_status_reservasi($id, $date){

    }

    public function get_id_by_date($day, $month_year){
        return $this->db->select('day_id')->where(array('day'=>$day, 'month_year'=>$month_year))->get('calendar_days')->row();
    }

    public function get_rervasi_item($id_date){
        return $this->db->where('id_day', $id_date)->get('reservasi_item')->result();
    }

    public function booking_days($data)
    {
        $data['availablel_m'] = 0;
        $this->db->where('month_year', $data['month_year'])->where('day', $data['day'])->update('calendar_days', $data);

        return $this->db->affected_rows();
    }

    public function create_booking_items($data)
    {
        return $this->db->insert('reservasi_item', $data);
    }

    public function create_booking(Array $data)
    {
        $this->db->insert('order_meja', $data);

        return $this->db->insert_id();
    }
}