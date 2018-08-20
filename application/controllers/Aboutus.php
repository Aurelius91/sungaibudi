<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Aboutus extends CI_Controller
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
        $header_id = 2;
        $arr_data['title'] = 'About Us';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['arr_management'] = $this->_get_management();
        $arr_data['count_boc'] = $this->_count_management();
        $arr_data['count_bod'] = $this->_count_management('Board of Directors');
        $arr_data['arr_slideshow_1'] = $this->cms_function->generate_slideshow('About-History');
        $arr_data['arr_slideshow_2'] = $this->cms_function->generate_slideshow('About-VisionMission');
        $arr_data['arr_slideshow_3'] = $this->cms_function->generate_slideshow('About-Management');
        $this->load->view('aboutus', $arr_data);
    }
    /* End Public Function Area */


    private function _count_management($type = 'Board of Commisioners')
    {
        $this->db->where('type', $type);
        return $this->core_model->count('management');
    }

    private function _get_management()
    {
        $this->db->order_by('name ASC');
        $arr_management = $this->core_model->get('management');
        $arr_management_id = $this->cms_function->extract_records($arr_management, 'id');
        $arr_management_lookup = array();

        if (count($arr_management_id) > 0)
        {
            $this->db->where_in('management_id', $arr_management_id);
            $arr_image = $this->core_model->get('image');

            foreach ($arr_image as $image) {
                $arr_image_lookup[$image->management_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
            }
        }

        foreach ($arr_management as $management)
        {
            $management->image_name = (isset($arr_image_lookup[$management->id])) ? $arr_image_lookup[$management->id] : '';
        }

        return $arr_management;
    }
}
