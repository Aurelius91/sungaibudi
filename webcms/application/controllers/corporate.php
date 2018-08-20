<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corporate extends CI_Controller
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

		if (!isset($acl['corporate']) || $acl['corporate']->add <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Corporate';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('corporate_add', $arr_data);
	}

	public function edit($corporate_id = 0)
	{
		$acl = $this->_acl;

		if ($corporate_id <= 0)
		{
			redirect(base_url());
		}

		if (!isset($acl['corporate']) || $acl['corporate']->edit <= 0)
		{
			redirect(base_url());
		}

		$corporate = $this->core_model->get('corporate', $corporate_id);
		$corporate->image_name = '';

		$this->db->where('corporate_id', $corporate->id);
		$arr_image = $this->core_model->get('image');

		if (count($arr_image) > 0)
		{
			$corporate->image_name = ($arr_image[0]->name != '') ? $arr_image[0]->name : $arr_image[0]->id . '.' . $arr_image[0]->ext;
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Corporate';
		$arr_data['corporate'] = $corporate;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('corporate_edit', $arr_data);
	}

	public function view($page = 1, $filter = 'all', $query = '')
	{
		$acl = $this->_acl;

		if (!isset($acl['corporate']) || $acl['corporate']->list <= 0)
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
		$arr_corporate = $this->core_model->get('corporate');
		$arr_corporate_id = $this->cms_function->extract_records($arr_corporate, 'id');

		$arr_image_lookup = array();

		if (count($arr_corporate_id) > 0)
		{
			$this->db->where_in('corporate_id', $arr_corporate_id);
			$arr_image = $this->core_model->get('image');

			foreach ($arr_image as $image)
			{
				$arr_image_lookup[$image->corporate_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
			}
		}

		foreach ($arr_corporate as $corporate)
		{
			$corporate->image_name = (isset($arr_image_lookup[$corporate->id])) ? $arr_image_lookup[$corporate->id] : '';
			$corporate->date_display = ($corporate->date != '') ? date('d F Y', $corporate->date) : '';
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

		$count_corporate = $this->core_model->count('corporate');
		$count_page = ceil($count_corporate / $this->_setting->setting__limit_page);

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Corporate';
		$arr_data['page'] = $page;
		$arr_data['count_page'] = $count_page;
		$arr_data['query'] = $query;
		$arr_data['filter'] = $filter;
		$arr_data['arr_corporate'] = $arr_corporate;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('corporate', $arr_data);
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

			if (!isset($acl['corporate']) || $acl['corporate']->add <= 0)
			{
				throw new Exception('You have no access to add corporate. Please contact your administrator.');
			}

			$corporate_record = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
				{
					$image_id = $v;
				}
				else
				{
					$corporate_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$this->_validate_add($corporate_record);

			$corporate_id = $this->core_model->insert('corporate', $corporate_record);
			$corporate_record['id'] = $corporate_id;
			$corporate_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($corporate_record['id'], 'add', $corporate_record, array(), 'corporate');

			if ($image_id > 0)
			{
				$this->core_model->update('image', $image_id, array('corporate_id' => $corporate_id));
			}

			$json['corporate_id'] = $corporate_id;

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

	public function ajax_change_status($corporate_id)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($corporate_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['corporate']) || $acl['corporate']->edit <= 0)
			{
				throw new Exception('You have no access to edit corporate. Please contact your administrator.');
			}

			$old_corporate = $this->core_model->get('corporate', $corporate_id);

			$old_corporate_record = array();

			foreach ($old_corporate as $key => $value)
			{
				$old_corporate_record[$key] = $value;
			}

			$corporate_record = array();

			foreach ($_POST as $k => $v)
			{
				$corporate_record[$k] = ($k == 'date') ? strtotime($v) : $v;
			}

			$this->core_model->update('corporate', $corporate_id, $corporate_record);
			$corporate_record['id'] = $corporate_id;
			$corporate_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log('status', $corporate_record, $old_corporate_record, 'corporate');

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

	public function ajax_delete($corporate_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($corporate_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['corporate']) || $acl['corporate']->delete <= 0)
			{
				throw new Exception('You have no access to delete corporate. Please contact your administrator.');
			}

			$corporate = $this->core_model->get('corporate', $corporate_id);
			$updated = $_POST['updated'];
			$corporate_record = array();

			foreach ($corporate as $k => $v)
			{
				if ($k == 'updated' && $v != $updated)
				{
					throw new Exception('This data has been updated by another corporate. Please refresh the page.');
				}
				else
				{
					$corporate_record[$k] = $v;
				}
			}

			$this->_validate_delete($corporate_id);

			$this->core_model->delete('corporate', $corporate_id);
			$corporate_record['id'] = $corporate->id;
			$corporate_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($corporate_record['id'], 'delete', $corporate_record, array(), 'corporate');


			// dihapus apabila tidak punya gambar
			$this->db->where('corporate_id', $corporate_id);
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

	public function ajax_edit($corporate_id)
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

			if (!isset($acl['corporate']) || $acl['corporate']->edit <= 0)
			{
				throw new Exception('You have no access to edit corporate. Please contact your administrator.');
			}

			$old_corporate = $this->core_model->get('corporate', $corporate_id);

			$old_corporate_record = array();

			foreach ($old_corporate as $key => $value)
			{
				$old_corporate_record[$key] = $value;
			}

			$corporate_record = array();
			$arr_corporate_access = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
                {
                    $image_id = $v;
                }
				else
				{
					$corporate_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$this->_validate_edit($corporate_id, $corporate_record);

			$this->core_model->update('corporate', $corporate_id, $corporate_record);
			$corporate_record['id'] = $corporate_id;
			$corporate_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($corporate_record['id'], 'edit', $corporate_record, $old_corporate_record, 'corporate');
			$this->cms_function->update_foreign_field(array('product'), $corporate_record, 'corporate');

			if ($image_id > 0)
            {
                $this->db->where('corporate_id', $corporate_id);
                $arr_image = $this->core_model->get('image');

                foreach ($arr_image as $image)
                {
                    unlink("images/website/{$image->id}.{$image->ext}");

                    $this->core_model->delete('image', $image->id);
                }

                $this->core_model->update('image', $image_id, array('corporate_id' => $corporate_id));
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

	public function ajax_get($corporate_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			if ($corporate_id <= 0)
			{
				throw new Exception();
			}

			$corporate = $this->core_model->get('corporate', $corporate_id);

			$json['corporate'] = $corporate;
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




	private function _validate_add($corporate_record)
	{
		$this->db->where('name', $corporate_record['name']);
		$count_user = $this->core_model->count('corporate');

		if ($count_user > 0)
		{
			throw new Exception('Name already exist.');
		}
	}

	private function _validate_delete($corporate_id)
	{
		$this->db->where('deletable <=', 0);
		$this->db->where('id', $corporate_id);
		$count_user = $this->core_model->count('corporate');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be deleted.');
		}
	}

	private function _validate_edit($corporate_id, $corporate_record)
	{
		$this->db->where('editable <=', 0);
		$this->db->where('id', $corporate_id);
		$count_user = $this->core_model->count('corporate');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be updated.');
		}

		$this->db->where('id !=', $corporate_id);
		$this->db->where('name', $corporate_record['name']);
		$count_user = $this->core_model->count('corporate');

		if ($count_user > 0)
		{
			throw new Exception('Name is already exist.');
		}
	}
}