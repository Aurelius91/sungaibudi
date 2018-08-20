<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
    private $_setting;

    public function __construct()
    {
        parent:: __construct();
    }




    /* Public Function Area */
    public function index()
    {
        $arr_data['title'] = 'Our Products';

        $this->load->view('product', $arr_data);
    }
    /* End Public Function Area */
}
