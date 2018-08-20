<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller
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

		if (!isset($acl['news']) || $acl['news']->add <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'News';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('news_add', $arr_data);
	}

	public function edit($news_id = 0)
	{
		$acl = $this->_acl;

		if ($news_id <= 0)
		{
			redirect(base_url());
		}

		if (!isset($acl['news']) || $acl['news']->edit <= 0)
		{
			redirect(base_url());
		}

		$news = $this->core_model->get('news', $news_id);
		$news->description = $this->cms_function->trim_text($news->description);
		$news->description_lang = $this->cms_function->trim_text($news->description_lang);
		$news->date_display = ($news->date != '' || $news->date <= 0) ? date('Y-m-d', $news->date) : '';
		$news->image_name = '';

		$this->db->where('news_id', $news->id);
		$arr_image = $this->core_model->get('image');

		if (count($arr_image) > 0)
		{
			$news->image_name = ($arr_image[0]->name != '') ? $arr_image[0]->name : $arr_image[0]->id . '.' . $arr_image[0]->ext;
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'News';
		$arr_data['news'] = $news;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('news_edit', $arr_data);
	}

	public function view($page = 1, $filter = 'all', $query = '')
	{
		$acl = $this->_acl;

		if (!isset($acl['news']) || $acl['news']->list <= 0)
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
			$news->date_display = ($news->date != '') ? date('d F Y', $news->date) : '';
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

		$count_news = $this->core_model->count('news');
		$count_page = ceil($count_news / $this->_setting->setting__limit_page);

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'News';
		$arr_data['page'] = $page;
		$arr_data['count_page'] = $count_page;
		$arr_data['query'] = $query;
		$arr_data['filter'] = $filter;
		$arr_data['arr_news'] = $arr_news;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('news', $arr_data);
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

			if (!isset($acl['news']) || $acl['news']->add <= 0)
			{
				throw new Exception('You have no access to add news. Please contact your administrator.');
			}

			$news_record = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
				{
					$image_id = $v;
				}
				else
				{
					$news_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$news_record['url_name'] = str_replace(array('.', ',', '&', '?', '!', '/', '(', ')', '+'), '' , strtolower($news_record['name']));
            $news_record['url_name'] = preg_replace("/[\s_]/", "-", $news_record['url_name']);

			$this->_validate_add($news_record);

			$news_id = $this->core_model->insert('news', $news_record);
			$news_record['id'] = $news_id;
			$news_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($news_record['id'], 'add', $news_record, array(), 'news');

			if ($image_id > 0)
			{
				$this->core_model->update('image', $image_id, array('news_id' => $news_id));
			}

			$json['news_id'] = $news_id;

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

	public function ajax_change_status($news_id)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($news_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['news']) || $acl['news']->edit <= 0)
			{
				throw new Exception('You have no access to edit news. Please contact your administrator.');
			}

			$old_news = $this->core_model->get('news', $news_id);

			$old_news_record = array();

			foreach ($old_news as $key => $value)
			{
				$old_news_record[$key] = $value;
			}

			$news_record = array();

			foreach ($_POST as $k => $v)
			{
				$news_record[$k] = ($k == 'date') ? strtotime($v) : $v;
			}

			$this->core_model->update('news', $news_id, $news_record);
			$news_record['id'] = $news_id;
			$news_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log('status', $news_record, $old_news_record, 'news');

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

	public function ajax_delete($news_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($news_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['news']) || $acl['news']->delete <= 0)
			{
				throw new Exception('You have no access to delete news. Please contact your administrator.');
			}

			$news = $this->core_model->get('news', $news_id);
			$updated = $_POST['updated'];
			$news_record = array();

			foreach ($news as $k => $v)
			{
				if ($k == 'updated' && $v != $updated)
				{
					throw new Exception('This data has been updated by another news. Please refresh the page.');
				}
				else
				{
					$news_record[$k] = $v;
				}
			}

			$this->_validate_delete($news_id);

			$this->core_model->delete('news', $news_id);
			$news_record['id'] = $news->id;
			$news_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($news_record['id'], 'delete', $news_record, array(), 'news');


			// dihapus apabila tidak punya gambar
			$this->db->where('news_id', $news_id);
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

	public function ajax_edit($news_id)
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

			if (!isset($acl['news']) || $acl['news']->edit <= 0)
			{
				throw new Exception('You have no access to edit news. Please contact your administrator.');
			}

			$old_news = $this->core_model->get('news', $news_id);

			$old_news_record = array();

			foreach ($old_news as $key => $value)
			{
				$old_news_record[$key] = $value;
			}

			$news_record = array();
			$arr_news_access = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
                {
                    $image_id = $v;
                }
				else
				{
					$news_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$news_record['url_name'] = str_replace(array('.', ',', '&', '?', '!', '/', '(', ')', '+'), '' , strtolower($news_record['name']));
            $news_record['url_name'] = preg_replace("/[\s_]/", "-", $news_record['url_name']);

			$this->_validate_edit($news_id, $news_record);

			$this->core_model->update('news', $news_id, $news_record);
			$news_record['id'] = $news_id;
			$news_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($news_record['id'], 'edit', $news_record, $old_news_record, 'news');

			if ($image_id > 0)
            {
                $this->db->where('news_id', $news_id);
                $arr_image = $this->core_model->get('image');

                foreach ($arr_image as $image)
                {
                    unlink("images/website/{$image->id}.{$image->ext}");

                    $this->core_model->delete('image', $image->id);
                }

                $this->core_model->update('image', $image_id, array('news_id' => $news_id));
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

	public function ajax_get($news_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			if ($news_id <= 0)
			{
				throw new Exception();
			}

			$news = $this->core_model->get('news', $news_id);

			$json['news'] = $news;
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




	private function _validate_add($news_record)
	{
		$this->db->where('name', $news_record['name']);
		$count_user = $this->core_model->count('news');

		if ($count_user > 0)
		{
			throw new Exception('Name already exist.');
		}
	}

	private function _validate_delete($news_id)
	{
		$this->db->where('deletable <=', 0);
		$this->db->where('id', $news_id);
		$count_user = $this->core_model->count('news');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be deleted.');
		}
	}

	private function _validate_edit($news_id, $news_record)
	{
		$this->db->where('editable <=', 0);
		$this->db->where('id', $news_id);
		$count_user = $this->core_model->count('news');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be updated.');
		}

		$this->db->where('id !=', $news_id);
		$this->db->where('name', $news_record['name']);
		$count_user = $this->core_model->count('news');

		if ($count_user > 0)
		{
			throw new Exception('Name is already exist.');
		}
	}
}