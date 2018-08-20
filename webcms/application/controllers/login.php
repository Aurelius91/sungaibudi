<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
	private $_setting;

	public function __construct()
	{
		parent:: __construct();

		$this->_setting = $this->setting_model->load();
	}




	public function index()
	{
		$arr_data['csrf'] = $this->cms_function->generate_csrf();
		$arr_data['setting'] = $this->_setting;

		$this->load->view('login', $arr_data);
	}




	public function ajax_login()
	{
		$json['status'] = 'success';

		try
		{
			$this->load->helper('security');

			$username = $this->security->xss_clean($this->input->post('username'));
			$password = md5($this->security->xss_clean($this->input->post('password')));

			$this->db->select('id, name');
			$this->db->where("BINARY username = '{$username}'", null, false);
			$this->db->where("BINARY password = '{$password}'", null, false);
			$this->db->where('active >', 0);
			$arr_user = $this->core_model->get('user');

			if (count($arr_user) > 0)
			{
				$this->session->set_userdata('user_id', $arr_user[0]->id);
				$this->session->set_userdata('user_name', $arr_user[0]->name);
			}
			else
			{
				throw new Exception('Wrong Username or Password.');
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
}