<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if( ! function_exists('validate_booking')){
    
    function validate_booking($day, $month_year) {
        $CI = init();
        
        // Query to check if the day is available
        $query = $CI->db->where('day', $day)
                        ->where('month_year', $month_year)
                        ->where('available', true)
                        ->get('calendar_days');
        
        if ($query->num_rows() > 0) {
            return True; // The day is available for booking
        } else {
            return False; // The day is not available for booking
        }
    }


}
defined('BASEPATH') OR exit('No direct script access allowed');


// get diskon
if(!function_exists('get_dp')){
    function get_dp(){
        $CI = init();
        $query = $CI->db->query("SELECT * FROM tb_dp");
        return $query->result_array();
    }
}
if(!function_exists('get_data_time')){
    function get_order_date($order_number) {
        $CI = init();
        $query = $CI->db->query("
            SELECT order_date 
            FROM order_booking 
            WHERE order_number = '$order_number' 
              AND order_status = 'Dalam Proses'
        ");
        $result = $query->row_array();
        return isset($result['order_date']) ? $result['order_date'] : null;
    }
}
if(!function_exists('get_diskonpersentase')){
    function get_diskonpersentase(){
        $CI = init();
        $query = $CI->db->query("SELECT dp FROM tb_dp");
        $result = $query->row_array();
        return isset($result['dp']) ? (int)$result['dp'] : 0;
    }
}
if(!function_exists('get_waktu_pelunasan')){
    function get_waktu_pelunasan(){
        $CI = init();
        $query = $CI->db->query("SELECT waktu FROM tb_dp");
        $result = $query->row_array();
        return isset($result['waktu']) ? (int)$result['waktu'] : 0;
    }
}

if(!function_exists('coldown_time')){
    function coldown_time($time) {
        $CI = init();
        $query = $CI->db->query("SELECT waktu FROM tb_dp");
        $result = $query->row_array();
        $limitInMinutes = isset($result['waktu']) ? (int)$result['waktu'] : 0;

        $countdown = new CountdownCancel();
        $countdown->setStartTime($time);
        $countdown->setLimitInMinutes($limitInMinutes);

        if ($countdown->isExpired()) {
            return 'Waktu pelunasan telah habis.';
        } else {
            return $countdown->getFormattedRemainingTime();
        }
    }
}

if(!function_exists('update_dp')){
    function update_dp($data){
        $CI = init();
        $CI->db->where('id', $data['dp_id']);
        $CI->db->set('dp', $data['dp_percentage']);
        $CI->db->set('waktu', $data['dp_due_date']);
        if ($CI->db->update('tb_dp')) {
            return true;
        } else {
            return false;
        }
    }
}

if( ! function_exists('get_meja')){
function get_meja() {
    $CI = init();
    $query = $CI->db->query("SELECT * FROM reservasi_meja");
    return $query->result_array();
}
}
if( ! function_exists('validate_reservasi')){
    
    function validate_reservasi($day, $month_year) {
        $CI = init();
        
        // Query to check if the day is available
        $query = $CI->db->where('day', $day)
                        ->where('month_year', $month_year)
                        ->where('availabel_m', true)
                        ->get('calendar_days');
        
        if ($query->num_rows() > 0) {
            return True; // The day is available for booking
        } else {
            return False; // The day is not available for booking
        }
    }


}

if ( ! function_exists('reservasi_meja')){
    function reservasi_meja($day){
        $data = [
            'id' => '28',
            'category_id' => '11',
            'sku' => 'AT51278',
            'name' => 'Meja 1 ',
            'description' => 'Tempat untuk acara organisasi dan keluarga',
            'picture_name' => 'tempat-meja.jpg',
            'price' => 110000,
            'current_discount' => '0.00',
            'stock' => '0',
            'product_unit' => 'Tempat',
            'is_available' => '1',
            'add_date' => '2024-12-09 09:01:18',
            'date_tour' => '2024-12-22',
            'category_name' => 'BOOKING',
            'dp' => 0.2 * 110000, // 20% of price
            'sisa' => 110000 - (0.2 * 110000), // remaining amount
            'book_date' => '2025-02-26',
        ];
        return $data;
    }
}
// codingan view 
if ( ! function_exists('booking_info')){
    function booking_info($booking_id){
        $CI = init();

        $day = $CI->input->post('day');
        $month_year = $CI->input->post('month_year');
        $date = $month_year.'-'.$day;
        if ($day <= 0) {
            redirect('booking');
        }
        

        $data = $CI->db->query("
            SELECT p.*, pc.name as category_name
            FROM packages p
            JOIN product_category pc
                ON pc.id = p.category_id
            WHERE p.id = '$booking_id'
        ")->row_array();
        $data['dp']=$data['price']*0.2;
        $data['sisa']=$data['price']-$data['dp'];
        $data['book_date']=$date;
        


        return $data;
    }
}

if (! function_exists('generateCalendar')){
    function generateCalendar($year, $month) {
        $CI =& get_instance();
        $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year); // Menghitung jumlah hari dalam bulan
        
        // Cek apakah entri untuk bulan dan tahun ini sudah ada
        $existing_entries = $CI->db->where('month_year', $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT))
                                   ->get('calendar_days')
                                   ->num_rows();
        
        if ($existing_entries > 0) {
            return; // Jika entri sudah ada, tidak perlu di-insert lagi
        }

        // Menambahkan entri ke tabel calendar_days untuk setiap hari
        for ($day = 1; $day <= $days_in_month; $day++) {
            $data = array(
                'month_year' => $year . '-' . str_pad($month, 2, '0', STR_PAD_LEFT),
                'day' => $day,
                'available' => true  // Mengatur agar semua hari tersedia awalnya
            );
            $CI->db->insert('calendar_days', $data);
        }
    }
}
if (! function_exists('get_status_booking')){
    function get_status_booking() {
        return [
            'Ditolak',
            'Dalam Proses',
            'Selesai'
        ];
    }
}

if( ! function_exists('get_month_year')){
    function get_month_year($data) {
        // Extract the year and month from the date string
        $year_month = substr($data, 0, 7);
        $day = substr($data, 8, 2);
        return ['year_month' => $year_month, 'day' => $day];
    }
}

if(!function_exists('get_detail_booking_item')){
    function get_detail_booking_item($id=28){
        $CI = init();
        $data = $CI->db->query("
            SELECT p.*
            FROM packages p            
            WHERE p.id = '$id'
        ")->row_array();
        return $data;
    }
}

if(!function_exists('get_monts')){
    function get_monts($month_year){
        $CI = init();
        $data = $CI->db->query("
            SELECT *
            FROM calendar_days
            WHERE month_year = '$month_year'
        ")->result_array();
        return $data;
    }
}

if (!function_exists('get_two_months_from_db')) {
    function get_two_months_from_db() {
        $CI =& get_instance();
        $CI->load->database();

        // Ambil bulan ini dan bulan depan dalam format 'YYYY-MM'
        $currentMonth = date('Y-m');
        $nextMonth = date('Y-m', strtotime('+1 month'));

        $CI->db->select("month_year, day, available, availabel_m");
        $CI->db->where_in("month_year", [$currentMonth, $nextMonth]);
        $CI->db->order_by("month_year, day", "ASC");
        $query = $CI->db->get("calendar_days");

        return $query->result_array();
    }
}
if ( ! function_exists('get_settings'))
{
    function get_settings($key = '')
    {
        $CI =& get_instance();

        $row = $CI->db
            ->select('content')
            ->where('key', $key)
            ->get('settings')
            ->row();

        return $row->content;
    }
}

if ( ! function_exists('update_settings'))
{
    function update_settings($key, $new_content)
    {
        $CI = init();

        $CI->db->where('key', $key)
            ->update('settings', array('content' => $new_content));
    }
}

if ( ! function_exists('get_store_name'))
{
    function get_store_name()
    {
        return get_settings('store_name');
    }
}


if ( ! function_exists('get_admin_image'))
{
    function get_admin_image()
    {
        $id = get_current_user_id();
        $CI = init();

        $data = $CI->db->select('profile_picture')->where('id', $id)->get('users')->row();
        $profile_picture = $data->profile_picture;

        if ( file_exists('assets/uploads/users/'. $profile_picture))
            $file = $profile_picture;
        else
            $file = 'admin.png';

        return base_url('assets/uploads/users/'. $file);
    }
}

if ( ! function_exists('get_admin_name')) {
    function get_admin_name() {
        $data = user_data();

        return $data->name;
    }
}

if ( ! function_exists('get_user_name'))
{
    function get_user_name()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

        return $user->name;
    }
}

if ( ! function_exists('get_user_image'))
{
    function get_user_image()
    {
        $CI = init();
        $id = get_current_user_id();

        $user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

        $picture = $user->profile_picture;
        $file = './assets/uploads/users/'. $picture;

        if ( ! file_exists($file))
            $picture_name = $picture;
        else
            $picture_name = 'admin.png';

        return base_url('assets/uploads/users/'. $picture_name);
    }
}

if ( ! function_exists('get_store_logo'))
{
    function get_store_logo()
    {
        $file = get_settings('store_logo');
        return base_url('assets/uploads/sites/'. $file);
    }
}

if ( ! function_exists('get_formatted_date'))
{
    function get_formatted_date($source_date)
    {
        $d = strtotime($source_date);

        $year = date('Y', $d);
        $month = date('n', $d);
        $day = date('d', $d);
        $day_name = date('D', $d);
            
        $day_names = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jum\'at',
            'Sat' => 'Sabtu'
        );
        $month_names = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'November',
            '11' => 'Oktober',
            '12' => 'Desember'
        );
        $day_name = $day_names[$day_name];
        $month_name = $month_names[$month];

        $date = "$day_name, $day $month_name $year";

        return $date;
    }
}

if ( ! function_exists('format_rupiah')) {
    function format_rupiah($rp)
    {
        return number_format($rp, 2 ,',', '.');
    }
}

if ( ! function_exists('create_product_sku'))
{
    function create_product_sku($name, $category, $price, $stock)
    {
        $name = create_acronym($name);
        $category = create_acronym($category);
        $price = create_acronym($price);
        $stock = $stock;
        $key = substr(time(), -3);

        $sku =  $name.$category.$price.$stock.$key;
        return $sku;
    }
}

if ( ! function_exists('create_acronym'))
{
    function create_acronym($words)
    {
        $words = explode(' ', $words);
        $acronym = '';
        
        foreach ($words as $word)
        {
          $acronym .= $word[0];
        }

        $acronym = strtoupper($acronym);

        return $acronym;
    }
}

if ( ! function_exists('count_percent_discount'))
{
    function count_percent_discount($discount, $from, $num = 1)
    {
        $count = ($discount / $from) * 100;
        $count = number_format($count, $num);

        return $count;
    }
}

if ( ! function_exists('get_product_image'))
{
    function get_product_image($id)
    {
        $CI = init();
        $CI->load->model('product_model');

        $data = $CI->product_model->product_data($id);
        $picture_name = $data->picture_name;

        if ( ! $picture_name)
            $picture_name = 'default.jpg';

        $file = './assets/uploads/products/'. $picture_name;

        return base_url('assets/uploads/products/'. $picture_name);
    }
}

if ( ! function_exists('get_order_status'))
{
    function get_order_status($status, $payment)
    {
        if ($payment == 1)
        {
            // Bank
            if ($status == 1)
                return 'Menunggu pembayaran';
            else if ($status == 2)
                return 'Dalam proses';
            else if ($status == 3)
                return 'Dalam pengiriman';
            else if ($status == 4)
                return 'Selesai';
            else if ($status == 5)
                return 'Dibatalkan';
        }
        else if ($payment == 2)
        {
            //COD
            if ($status == 1)
                return 'Dalam proses';
            else if ($status == 2)
                return 'Dalam pengiriman';
            else if ($status == 3)
                return 'Selesai';
            else if ($status == 4)
                return 'Dibatalkan';
        }
    }
}

if ( ! function_exists('get_payment_status'))
{
    function get_payment_status($status)
    {
        if ($status == 1)
            return 'Menunggu konfirmasi';
        else if ($status == 2)
            return 'Berhasil dikonfirmasi';
        else if ($status == 3)
            return 'Pembayaran tidak ditemukan';
    }
}

if ( ! function_exists('get_contact_status'))
{
    function get_contact_status($status)
    {
        if ($status == 1)
            return 'Belum dibaca';
        else if ($status == 2)
            return 'Sudah dibaca';
        else if ($status == 3)
            return 'Sudah dibalas';
    }
}

if ( ! function_exists('get_month'))
{
    function get_month($mo)
    {
        $months = array(
            '1' => 'Januari',
            '2' => 'Februari',
            '3' => 'Maret',
            '4' => 'April',
            '5' => 'Mei',
            '6' => 'Juni',
            '7' => 'Juli',
            '8' => 'Agustus',
            '9' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        return $months[$mo];
    }
}


class CountdownCancel
{
    private $startTime;
    private $limitInSeconds;

    public function __construct()
    {
        $this->startTime = null;
        $this->limitInSeconds = 0;
    }

    public function setStartTime($startTime): void 
    {
        $this->startTime = strtotime($startTime);
    }

    public function setLimitInMinutes($limitInMinutes): void
    {
        // Subtract 1 second to start from 2:59 when limit is set to 3 minutes
        $this->limitInSeconds = ($limitInMinutes * 60) - 1;
    }

    public function isExpired(): bool
    {
        return (time() - $this->startTime) > $this->limitInSeconds;
    }

    public function getRemainingTime(): int
    {
        $remaining = $this->limitInSeconds - (time() - $this->startTime);
        return max($remaining, 0);
    }

    public function getFormattedRemainingTime(): string
    {
        $remaining = $this->getRemainingTime();
        return gmdate("i:s", $remaining);
    }
}


