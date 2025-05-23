<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// Load Composer autoload





class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->model(array(
            'product_model' => 'product',
            'review_model' => 'review'
        ));
    }

    public function index() {
        
        $params['title'] = 'Pesan Minum Disini';

        $products['products'] = $this->product->get_all_products();
        $products['products'] = $this->product->get_produk_without_place();
        $products['best_deal'] = $this->product->best_deal_product();
        $products['reviews'] = $this->review->get_all_reviews();

        get_header($params);
        get_template_part('home', $products);
        get_footer();
    }

    public function makanan(){
        $params['title'] = 'Kategori Fashion ';
        $category = ['MAKANAN'];
        $products['products'] = $this->product->get_category_produk($category);
        $products['best_deal'] = $this->product->best_deal_product();
        $products['reviews'] = $this->review->get_all_reviews();

        get_header($params);
        get_template_part('home', $products);
        get_footer();
    }

    public function minuman(){
        $params['title'] = 'Kategori Fashion ';
        $category = ['MINUMAN'];
        $products['products'] = $this->product->get_category_produk($category);
        $products['best_deal'] = $this->product->best_deal_product();
        $products['reviews'] = $this->review->get_all_reviews();

        get_header($params);
        get_template_part('home', $products);
        get_footer();
    }
}