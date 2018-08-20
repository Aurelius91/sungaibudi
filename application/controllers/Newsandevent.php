<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsandevent extends CI_Controller
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
        $header_id = 4;
        $page = 1;

        $arr_data['title'] = 'News & Event';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['page'] = $page;
        $arr_data['arr_news'] = $this->_get_news($page);
        $arr_data['count_page'] = $this->_count_page();
        $arr_data['arr_slideshow'] = $this->cms_function->generate_slideshow('Newsandevents');
        $this->load->view('news-event', $arr_data);
    }

    public function page($page = 1)
    {
        $header_id = 4;

        $arr_data['title'] = 'News & Event';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['page'] = $page;
        $arr_data['arr_news'] = $this->_get_news($page);
        $arr_data['count_page'] = $this->_count_page();
        $this->load->view('news-event', $arr_data);
    }

    public function detail($url_name = '')
    {
        if ($url_name == '')
        {
            redirect(base_url() . 'newsandevent');
        }

        $this->db->where('url_name', $url_name);
        $arr_news = $this->core_model->get('news');

        if (count($arr_news) <= 0)
        {
            redirect(base_url() . 'newsandevent');
        }

        $news = $arr_news[0];
        $news->date_display = date('d F Y', $news->date);
        $news->image_name = '';

        $this->db->where('news_id', $news->id);
        $arr_image = $this->core_model->get('image');

        if (count($arr_image) > 0)
        {
            $news->image_name = ($arr_image[0]->name != '') ? $arr_image[0]->name : $arr_image[0]->id . '.' . $arr_image[0]->ext;
        }

        // get related news
        $this->db->where('id !=', $news->id);
        $this->db->order_by('date DESC');
        $this->db->limit(5);
        $arr_related_news = $this->core_model->get('news');
        $arr_related_news_id = $this->cms_function->extract_records($arr_related_news, 'id');
        $arr_image_lookup = array();

        if (count($arr_related_news_id) > 0)
        {
            $this->db->where_in('news_id', $arr_related_news_id);
            $arr_image = $this->core_model->get('image');

            foreach ($arr_image as $image)
            {
                $arr_image_lookup[$image->news_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
            }
        }

        foreach ($arr_related_news as $related_news)
        {
            $related_news->image_name = (isset($arr_image_lookup[$related_news->id])) ? $arr_image_lookup[$related_news->id] : '';
        }

        $header_id = 4;
        $arr_data['title'] = 'News & Event';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['news'] = $news;
        $arr_data['arr_related_news'] = $arr_related_news;
        $this->load->view('news-event-detail', $arr_data);
    }
    /* End Public Function Area */



    private function _count_page()
    {
        $count_news = $this->core_model->count('news');
        return ceil($count_news / 4);
    }

    private function _get_news($page)
    {
        $this->db->order_by('date DESC');
        $this->db->limit(4, ($page - 1) * 4);
        $arr_news = $this->core_model->get('news');
        $arr_news_id = $this->cms_function->extract_records($arr_news, 'id');
        $arr_image_lookup = array();

        if (count($arr_news_id) > 0)
        {
            $this->db->where_in('news_id', $arr_news_id);
            $arr_image = $this->core_model->get('image');

            foreach ($arr_image as $image)
            {
                $arr_image_lookup[$image->news_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
            }
        }

        foreach ($arr_news as $news)
        {
            $news->image_name = (isset($arr_image_lookup[$news->id])) ? $arr_image_lookup[$news->id] : '';
            $news->date_display = date('d F Y', $news->date);
            $news->day_display = date('d', $news->date);
            $news->month_display = date('M', $news->date);
            $news->year_display = date('Y', $news->date);
        }

        return $arr_news;
    }
}
