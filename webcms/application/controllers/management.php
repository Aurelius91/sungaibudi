<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller
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




	public function add()
	{
		$acl = $this->_acl;

		if (!isset($acl['management']) || $acl['management']->add <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'management';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('management_add', $arr_data);
	}

	public function edit($management_id = 0)
	{
		$acl = $this->_acl;

		if ($management_id <= 0)
		{
			redirect(base_url());
		}

		if (!isset($acl['management']) || $acl['management']->edit <= 0)
		{
			redirect(base_url());
		}

		$management = $this->core_model->get('management', $management_id);
		$management->description = $this->cms_function->trim_text($management->description);
		$management->description_lang = $this->cms_function->trim_text($management->description_lang);
		$management->date_display = ($management->date != '' || $management->date <= 0) ? date('Y-m-d', $management->date) : '';
		$management->image_name = '';

		$this->db->where('management_id', $management->id);
		$arr_image = $this->core_model->get('image');

		if (count($arr_image) > 0)
		{
			$management->image_name = ($arr_image[0]->name != '') ? $arr_image[0]->name : $arr_image[0]->id . '.' . $arr_image[0]->ext;
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Management';
		$arr_data['management'] = $management;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('management_edit', $arr_data);
	}

	public function view($page = 1, $filter = 'all', $query = '')
	{
		$acl = $this->_acl;

		if (!isset($acl['management']) || $acl['management']->list <= 0)
		{
			redirect(base_url());
		}

		$query = ($query != '') ? base64_decode($query) : '';

		if ($query != '')
		{
			$this->db->like('name', $query);
		}

		if ($filter == 'all')
		{
			$this->db->like('name', $query);
		}
		else
		{
			$this->db->like($filter, $query);
		}

		$this->db->limit($this->_setting->setting__limit_page, ($page - 1) * $this->_setting->setting__limit_page);
		$this->db->order_by("id DESC");
		$arr_management = $this->core_model->get('management');
		$arr_management_id = $this->cms_function->extract_records($arr_management, 'id');

		$arr_image_lookup = array();

		if (count($arr_management_id) > 0)
		{
			$this->db->where_in('management_id', $arr_management_id);
			$arr_image = $this->core_model->get('image');

			foreach ($arr_image as $image)
			{
				$arr_image_lookup[$image->management_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
			}
		}

		foreach ($arr_management as $management)
		{
			$management->image_name = (isset($arr_image_lookup[$management->id])) ? $arr_image_lookup[$management->id] : '';
			$management->date_display = ($management->date != '') ? date('d F Y', $management->date) : '';
		}

		if ($query != '')
		{
			$this->db->like('name', $query);
		}

		if ($filter == 'all')
		{
			$this->db->like('name', $query);
		}
		else
		{
			$this->db->like($filter, $query);
		}

		$count_management = $this->core_model->count('management');
		$count_page = ceil($count_management / $this->_setting->setting__limit_page);

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'management';
		$arr_data['page'] = $page;
		$arr_data['count_page'] = $count_page;
		$arr_data['query'] = $query;
		$arr_data['filter'] = $filter;
		$arr_data['arr_management'] = $arr_management;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('management', $arr_data);
	}




	public function ajax_add()
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

			if (!isset($acl['management']) || $acl['management']->add <= 0)
			{
				throw new Exception('You have no access to add management. Please contact your administrator.');
			}

			$management_record = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
				{
					$image_id = $v;
				}
				else
				{
					$management_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$management_record['url_name'] = str_replace(array('.', ',', '&', '?', '!', '/', '(', ')', '+'), '' , strtolower($management_record['name']));
            $management_record['url_name'] = preg_replace("/[\s_]/", "-", $management_record['url_name']);

			$this->_validate_add($management_record);

			$management_id = $this->core_model->insert('management', $management_record);
			$management_record['id'] = $management_id;
			$management_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($management_record['id'], 'add', $management_record, array(), 'management');

			if ($image_id > 0)
			{
				$this->core_model->update('image', $image_id, array('management_id' => $management_id));
			}

			$json['management_id'] = $management_id;

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

	public function ajax_change_status($management_id)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($management_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['management']) || $acl['management']->edit <= 0)
			{
				throw new Exception('You have no access to edit management. Please contact your administrator.');
			}

			$old_management = $this->core_model->get('management', $management_id);

			$old_management_record = array();

			foreach ($old_management as $key => $value)
			{
				$old_management_record[$key] = $value;
			}

			$management_record = array();

			foreach ($_POST as $k => $v)
			{
				$management_record[$k] = ($k == 'date') ? strtotime($v) : $v;
			}

			$this->core_model->update('management', $management_id, $management_record);
			$management_record['id'] = $management_id;
			$management_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log('status', $management_record, $old_management_record, 'management');

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

	public function ajax_delete($management_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($management_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['management']) || $acl['management']->delete <= 0)
			{
				throw new Exception('You have no access to delete management. Please contact your administrator.');
			}

			$management = $this->core_model->get('management', $management_id);
			$updated = $_POST['updated'];
			$management_record = array();

			foreach ($management as $k => $v)
			{
				if ($k == 'updated' && $v != $updated)
				{
					throw new Exception('This data has been updated by another management. Please refresh the page.');
				}
				else
				{
					$management_record[$k] = $v;
				}
			}

			$this->_validate_delete($management_id);

			$this->core_model->delete('management', $management_id);
			$management_record['id'] = $management->id;
			$management_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($management_record['id'], 'delete', $management_record, array(), 'management');


			// dihapus apabila tidak punya gambar
			$this->db->where('management_id', $management_id);
            $arr_image = $this->core_model->get('image');

            foreach ($arr_image as $image)
            {
                unlink("images/website/{$image->id}.{$image->ext}");

                $this->core_model->delete('image', $image->id);
            }
            //////////

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

	public function ajax_edit($management_id)
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

			if (!isset($acl['management']) || $acl['management']->edit <= 0)
			{
				throw new Exception('You have no access to edit management. Please contact your administrator.');
			}

			$old_management = $this->core_model->get('management', $management_id);

			$old_management_record = array();

			foreach ($old_management as $key => $value)
			{
				$old_management_record[$key] = $value;
			}

			$management_record = array();
			$arr_management_access = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
                {
                    $image_id = $v;
                }
				else
				{
					$management_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$management_record['url_name'] = str_replace(array('.', ',', '&', '?', '!', '/', '(', ')', '+'), '' , strtolower($management_record['name']));
            $management_record['url_name'] = preg_replace("/[\s_]/", "-", $management_record['url_name']);

			$this->_validate_edit($management_id, $management_record);

			$this->core_model->update('management', $management_id, $management_record);
			$management_record['id'] = $management_id;
			$management_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($management_record['id'], 'edit', $management_record, $old_management_record, 'management');

			if ($image_id > 0)
            {
                $this->db->where('management_id', $management_id);
                $arr_image = $this->core_model->get('image');

                foreach ($arr_image as $image)
                {
                    unlink("images/website/{$image->id}.{$image->ext}");

                    $this->core_model->delete('image', $image->id);
                }

                $this->core_model->update('image', $image_id, array('management_id' => $management_id));
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

	public function ajax_get($management_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			if ($management_id <= 0)
			{
				throw new Exception();
			}

			$management = $this->core_model->get('management', $management_id);

			$json['management'] = $management;
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




	private function _validate_add($management_record)
	{
		$this->db->where('name', $management_record['name']);
		$count_user = $this->core_model->count('management');

		if ($count_user > 0)
		{
			throw new Exception('Name already exist.');
		}
	}

	private function _validate_delete($management_id)
	{
		$this->db->where('deletable <=', 0);
		$this->db->where('id', $management_id);
		$count_user = $this->core_model->count('management');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be deleted.');
		}
	}

	private function _validate_edit($management_id, $management_record)
	{
		$this->db->where('editable <=', 0);
		$this->db->where('id', $management_id);
		$count_user = $this->core_model->count('management');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be updated.');
		}

		$this->db->where('id !=', $management_id);
		$this->db->where('name', $management_record['name']);
		$count_user = $this->core_model->count('management');

		if ($count_user > 0)
		{
			throw new Exception('Name is already exist.');
		}
	}
}