<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
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
        $header_id = 3;

        $this->db->where('product_id >', 0);
        $this->db->or_where('corporate_id >', 0);
        $arr_image = $this->core_model->get('image');

        $arr_corporate_image_lookup = array();
        $arr_product_image_lookup = array();

        foreach ($arr_image as $image)
        {
            if ($image->corporate_id > 0)
            {
                $arr_corporate_image_lookup[$image->corporate_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
            }

            if ($image->product_id > 0)
            {
                $arr_product_image_lookup[$image->product_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
            }
        }

        // get corporate logo
        $this->db->order_by('id DESC');
        $arr_corporate = $this->core_model->get('corporate');

        foreach ($arr_corporate as $corporate)
        {
            $corporate->image_name = (isset($arr_corporate_image_lookup[$corporate->id])) ? $arr_corporate_image_lookup[$corporate->id] : '';
        }

        // get category
        $this->db->order_by('id');
        $arr_category = $this->core_model->get('category');
        $arr_category_id = $this->cms_function->extract_records($arr_category, 'id');

        $arr_product_category_lookup = array();

        if (count($arr_category_id) > 0)
        {
            $this->db->where_in('category_id', $arr_category_id);
            $arr_product = $this->core_model->get('product');

            foreach ($arr_product as $product)
            {
                $product->image_name = (isset($arr_product_image_lookup[$product->id])) ? $arr_product_image_lookup[$product->id] : '';

                $arr_product_category_lookup[$product->category_id][] = clone $product;
            }
        }

        foreach ($arr_category as $category)
        {
            $category->arr_product = (isset($arr_product_category_lookup[$category->id])) ? $arr_product_category_lookup[$category->id] : array();
        }

        $arr_data['title'] = 'Our Products';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['arr_slideshow'] = $this->cms_function->generate_slideshow('Product');
        $arr_data['arr_category'] = $arr_category;
        $arr_data['arr_corporate'] = $arr_corporate;

        $this->load->view('product', $arr_data);
    }
    /* End Public Function Area */
}
