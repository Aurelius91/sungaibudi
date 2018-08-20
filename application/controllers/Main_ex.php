<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $_lang;
    private $_setting;

    public function __construct()
    {
        parent:: __construct();

        // load setting here
        $this->_setting = $this->setting_model->load();

        // check setting for maintenance
        if ($this->_setting->setting__system_main_website_maintenance > 0)
        {
            // Redirect if Setting Maintenance is On
            redirect(base_url() . 'maintenance/');
        }

        // Set Language from Cookie
        $this->_lang = (!get_cookie('sungbud_lang')) ? $this->_setting->setting__system_language : get_cookie('sungbud_lang');
        $this->_lang = ($this->_setting->setting__website_enabled_dual_language <= 0) ? $this->_setting->setting__system_language : $this->_lang;
    }




    /* Public Function Area */
    public function index()
    {
        $arr_data['title'] = 'Home';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $this->load->view('home', $arr_data);
    }
    /* End Public Function Area */




    /* Ajax Function Area */
    public function ajax_set_language($lang)
    {
        $json['status'] = 'success';

        try
        {
            // set cookie Language
            // change expiration in expire = time() + {duration}
            $cookie = array(
                'name'   => 'sungbud_lang',
                'value'  => $lang,
                'expire' => time() + 7200,
            );

            set_cookie($cookie);
        }
        catch (Exception $e)
        {
            $json['message'] = $e->getMessage();
            $json['status'] = 'error';

            if ($json['message'] == '')
            {
                $json['message'] = 'Server error.';
            }
        }

        echo json_encode($json);
    }
    /* End Ajax Function Area */
}
