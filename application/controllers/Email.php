<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller
{
    private $_setting;

    public function __construct()
    {
        parent:: __construct();
    }




    /* Public Function Area */
    public function index()
    {
        $arr_data = array();

        // Send Email
        $this->load->library('email');

        $this->email->from('no-reply@labelideas.co', 'No Reply');
        $this->email->to('sugianto@labelideas.co');
        $this->email->set_mailtype('html');

        $message = $this->load->view('email', $arr_data, true);

        $this->email->subject("ORDER CONFIRMATION");
        $this->email->message($message);

        $this->email->send();

        $this->load->view('email', $arr_data);
    }
    /* End Public Function Area */
}
