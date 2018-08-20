<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller
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
        $header_id = 5;
        $page = 1;

        $arr_data['title'] = 'Career';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['page'] = $page;
        $arr_data['arr_career_lookup'] = $this->_get_career($page);
        $arr_data['count_page'] = $this->_count_page();
        $arr_data['arr_slideshow'] = $this->cms_function->generate_slideshow('Career');
        $this->load->view('career', $arr_data);
    }

    public function page($page = 1)
    {
        $header_id = 5;
        $arr_data['title'] = 'Career';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['page'] = $page;
        $arr_data['arr_career_lookup'] = $this->_get_career($page);
        $arr_data['count_page'] = $this->_count_page();
        $this->load->view('career', $arr_data);
    }

    public function detail($url_name = '')
    {
        if ($url_name == '')
        {
            redirect(base_url() . 'career');
        }

        $this->db->where('url_name', $url_name);
        $arr_career = $this->core_model->get('career');

        if(count($arr_career) <= 0)
        {
            redirect(base_url() . 'career');
        }

        $career = $arr_career[0];

        $header_id = 5;
        $arr_data['title'] = 'Career';
        $arr_data['setting'] = $this->_setting;
        $arr_data['lang'] = $this->_lang;
        $arr_data['arr_header'] = $this->cms_function->generate_header();
        $arr_data['header_id'] = $header_id;
        $arr_data['arr_section'] = $this->cms_function->generate_section($header_id);
        $arr_data['metatag'] = $this->cms_function->generate_metatag($header_id);
        $arr_data['csrf'] = $this->cms_function->generate_csrf();
        $arr_data['career'] = $career;
        $this->load->view('careerdetail', $arr_data);
    }

    public function ajax_upload_cv($career_id = 0, $name = '', $phone = '', $email = '')
    {
        $json['status'] = 'success';

        try
        {
            if ($career_id <= 0)
            {
                throw new Exception();
            }

            $career = $this->core_model->get('career', $career_id);

            $source_path = $_FILES['file']['tmp_name'];
            $ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

            $filesize = ((filesize($source_path) / 1024) / 1024);

            if ($filesize > 2)
            {
                throw new Exception('Recommended filesize for file is 2mb.');
            }

            $target_path = 'tmp/' . $_FILES["file"]["name"];
            move_uploaded_file($source_path, $target_path);
            chmod($target_path, 0777);

            $name = urldecode($name);
            $phone = urldecode($phone);
            $email = urldecode($email);

            $this->load->library('email');

            $this->email->from('no-reply@sungaibudi.co.id', 'Sungai Budi Career');
            $this->email->to($this->_setting->setting__system_email2_sent_to);

            $arr_cc_email = explode(';', $this->_setting->setting__system_email2_sent_cc);

            foreach ($arr_cc_email as $cc_email)
            {
                $cc_email = trim($cc_email);
            }

            $this->email->cc($arr_cc_email);

            $message ="Dear Admin HRD Sungai Budi \n\n Someone has sent CV to you\n\nName: {$name} \nEmail: {$email} \nPhone Number: {$phone} \nVacancy: {$career->name}\n\nThank you.";

            $this->email->subject("Job Applications from {$email} - {$name}");
            $this->email->message($message);
            $this->email->attach('tmp/' . $_FILES["file"]["name"]);

            if ($email != '')
            {
                @$this->email->send();

                unlink("tmp/{$_FILES["file"]["name"]}");
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

    public function ajax_load_page($page)
    {
        $json['status'] = 'success';

        try
        {
            $arr_career_lookup = $this->_get_career($page);

            $arr_record = array();
            $arr_record['lang'] = $this->_lang;
            $arr_record['setting'] = $this->_setting;
            $arr_record['arr_career_lookup'] = $arr_career_lookup;
            $arr_record['count_page'] = $this->_count_page();
            $template = $this->load->view('career-template', $arr_record, true);

            $json['template'] = $template;
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

    /* End Public Function Area */

    private function _count_page()
    {
        $count_career = $this->core_model->count('career');
        return ceil($count_career / 4);
    }

    private function _get_career($page)
    {
        $date_now = time();

        $this->db->where('date <=', $date_now);
        $this->db->where('date_to >=', $date_now);
        $this->db->order_by('name ASC');
        $this->db->limit(4, ($page - 1) * 4);
        $arr_career = $this->core_model->get('career');

        $arr_career_lookup = array();
        $number = 0;

        foreach ($arr_career as $career)
        {
            $arr_career_lookup[$number][] = clone $career;

            if (count($arr_career_lookup[$number]) >= 2)
            {
                $number += 1;
            }
        }

        return $arr_career_lookup;
    }
}
