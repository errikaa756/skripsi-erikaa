<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    
    public function is_available($id, $month_year)
    {
        return ($this->db->where(array('day' => $id, 'month_year' => $month_year, 'available'=>TRUE))->get('calendar_days')->num_rows() > 0) ? TRUE : FALSE;
    }
    
    public function get_data(){
        return $this->db->get('reservasi_meja')->result();
    }
}