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
        $header_id = 1;

        $this->db->where('corporate_id >', 0);
        $this->db->or_where('product_id >', 0);
        $this->db->or_where('news_id >', 0);
        $arr_image = $this->core_model->get('image');

        $arr_corporate_image_lookup = array();
        $arr_product_image_lookup = array();
        $arr_news_image_lookup = array();

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

            if ($image->news_id > 0)
            {
                $arr_news_image_lookup[$image->news_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
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

        // get news
        $this->db->order_by('date DESC');
        $this->db->limit(4);
        $arr_news = $this->core_model->get('news');

        foreach ($arr_news as $news)
        {
            $news->image_name = (isset($arr_news_image_lookup[$news->id])) ? $arr_news_image_lookup[$news->id] : '';
            $news->date_display = date('d F Y', $news->date);
        }

        $arr_data['title'] = 'Home';
		$arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
		$arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['arr_corporate'] = $arr_corporate;
        $arr_data['arr_category'] = $arr_category;
        $arr_data['arr_news'] = $arr_news;

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

    public function ajax_send_email()
    {
        $json['status'] = 'success';

        try
        {
            $this->load->library('email');

            $this->email->from('no-reply@sungaibudi.co.id', 'Sungai Budi');
            $this->email->to($this->_setting->setting__system_email_sent_to);

            $arr_cc_email = explode(';', $this->_setting->setting__system_email_sent_cc);

            foreach ($arr_cc_email as $cc_email)
            {
                $cc_email = trim($cc_email);
            }

            $this->email->cc($arr_cc_email);
            $this->email->bcc('thompson@labelideas.co');

            if ($this->input->post('phone'))
            {
                $message = "Dear Admin Sungai Budi \n\nan email has contacted you\n\nName: {$this->input->post('name')}\nEmail: {$this->input->post('email')}\nphone: {$this->input->post('phone')}\nmessage: {$this->input->post('message')}\n\nThank you.";
            }
            else
            {
                $message = "Dear Admin Sungai Budi \n\nan email has contacted you\n\nName: {$this->input->post('name')}\nEmail: {$this->input->post('email')}\nmessage: {$this->input->post('message')}\n\nThank you.";
            }

            $this->email->subject("[Sungai Budi] Enquiry from {$this->input->post('email')} - {$this->input->post('subject')}");
            $this->email->message($message);

            if ($this->input->post('email') && $this->input->post('email') != '')
            {
                @$this->email->send();
            }
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
