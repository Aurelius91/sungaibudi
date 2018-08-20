<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends CI_Controller
{
    private $_setting;

    public function __construct()
    {
        parent:: __construct();
    }




    /* Public Function Area */
    public function index()
    {
        $header_id = 0;

        $arr_data['title'] = 'Home';
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['setting'] = $this->_setting;

        $this->load->view('maintenance', $arr_data);
    }
    /* End Public Function Area */
}
