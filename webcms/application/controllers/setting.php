<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setting extends CI_Controller
{
	private $_setting;
	private $_user;
	private $_acl;

	public function __construct()
	{
		parent:: __construct();

		$user_id = $this->session->userdata('user_id');

		if ($user_id > 0)
		{
			$this->_user = $this->core_model->get('user', $user_id);
			$this->_setting = $this->setting_model->load();
			$this->_acl = $this->cms_function->generate_acl($this->_user->id);

			$this->_user->address = $this->cms_function->trim_text($this->_user->address);
			$this->_setting->company_address = $this->cms_function->trim_text($this->_setting->company_address);
			$this->_user->image_name = $this->cms_function->generate_image('user', $this->_user->id);
		}
		else
		{
			redirect(base_url() . 'login/');
		}
	}




	public function index()
	{
		$acl = $this->_acl;

		if (!isset($acl['setting']) || $acl['setting']->edit <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Setting';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('setting', $arr_data);
	}




	public function company()
	{
		$acl = $this->_acl;

		if (!isset($acl['company_details']) || $acl['company_details']->edit <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Company';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('company', $arr_data);
	}




	public function ajax_update()
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['setting']) || $acl['setting']->edit <= 0)
			{
				throw new Exception('You have no access to update Website Setting. Please contact your administrator.');
			}

			$setting_record = array();

			foreach ($_POST as $k => $v)
			{
				$setting_record[$k] = $this->security->xss_clean($v);
			}

			$query = '';

			foreach ($setting_record as $name => $value)
			{
				$this->setting_model->set($name, $value);
				$query .= $this->db->last_query() . "\n";
			}

			$setting_record['last_query'] = $query;

			$this->cms_function->system_log(0, 'setting', $setting_record, array(), 'setting');

			// delete other video
			$setting = $this->setting_model->load();

			$arr_file = scandir(FCPATH . 'video');

			foreach ($arr_file as $file)
			{
				if ($file == '.' || $file == '..')
				{
					continue;
				}

				if ($file != $setting->setting_website_video_1 && $file != $setting->setting_website_video_2)
				{
					unlink("video/{$file}");
				}
			}

			$this->db->trans_complete();
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

	public function ajax_upload_video()
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			$source_path = $_FILES['file']['tmp_name'];
			$ext = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);

			$filesize = ((filesize($source_path) / 1024) / 1024);

			if ($filesize > 5)
			{
				throw new Exception('Recommended filesize for image is 500kb.');
			}


			$target_path = 'video/' . $_FILES["file"]["name"];
			move_uploaded_file($source_path, $target_path);
			chmod($target_path, 0777);

			$json['video_name'] = $_FILES["file"]["name"];

			$this->db->trans_complete();
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
}
