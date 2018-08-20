<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller
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

		if (!isset($acl['product']) || $acl['product']->add <= 0)
		{
			redirect(base_url());
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Product';
		$arr_data['csrf'] = $this->cms_function->generate_csrf();
		$arr_data['arr_category'] = $this->_get_category();
		$arr_data['arr_corporate'] = $this->_get_corporate();

		$this->load->view('html', $arr_data);
		$this->load->view('product_add', $arr_data);
	}

	public function edit($product_id = 0)
	{
		$acl = $this->_acl;

		if ($product_id <= 0)
		{
			redirect(base_url());
		}

		if (!isset($acl['product']) || $acl['product']->edit <= 0)
		{
			redirect(base_url());
		}

		$product = $this->core_model->get('product', $product_id);
		$product->description = $this->cms_function->trim_text($product->description);
		$product->description_lang = $this->cms_function->trim_text($product->description_lang);
		$product->date_display = ($product->date != '' || $product->date <= 0) ? date('Y-m-d', $product->date) : '';
		$product->image_name = '';

		$this->db->where('product_id', $product->id);
		$arr_image = $this->core_model->get('image');

		if (count($arr_image) > 0)
		{
			$product->image_name = ($arr_image[0]->name != '') ? $arr_image[0]->name : $arr_image[0]->id . '.' . $arr_image[0]->ext;
		}

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Product';
		$arr_data['product'] = $product;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();
		$arr_data['arr_category'] = $this->_get_category();
		$arr_data['arr_corporate'] = $this->_get_corporate();

		$this->load->view('html', $arr_data);
		$this->load->view('product_edit', $arr_data);
	}

	public function view($page = 1, $filter = 'all', $query = '')
	{
		$acl = $this->_acl;

		if (!isset($acl['product']) || $acl['product']->list <= 0)
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
		$arr_product = $this->core_model->get('product');
		$arr_product_id = $this->cms_function->extract_records($arr_product, 'id');

		$arr_image_lookup = array();

		if (count($arr_product_id) > 0)
		{
			$this->db->where_in('product_id', $arr_product_id);
			$arr_image = $this->core_model->get('image');

			foreach ($arr_image as $image)
			{
				$arr_image_lookup[$image->product_id] = ($image->name != '') ? $image->name : $image->id . '.' . $image->ext;
			}
		}

		foreach ($arr_product as $product)
		{
			$product->image_name = (isset($arr_image_lookup[$product->id])) ? $arr_image_lookup[$product->id] : '';
			$product->date_display = ($product->date != '') ? date('d F Y', $product->date) : '';
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

		$count_product = $this->core_model->count('product');
		$count_page = ceil($count_product / $this->_setting->setting__limit_page);

		$arr_data['setting'] = $this->_setting;
		$arr_data['account'] = $this->_user;
		$arr_data['acl'] = $acl;
		$arr_data['type'] = 'Product';
		$arr_data['page'] = $page;
		$arr_data['count_page'] = $count_page;
		$arr_data['query'] = $query;
		$arr_data['filter'] = $filter;
		$arr_data['arr_product'] = $arr_product;
		$arr_data['csrf'] = $this->cms_function->generate_csrf();

		$this->load->view('html', $arr_data);
		$this->load->view('product', $arr_data);
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

			if (!isset($acl['product']) || $acl['product']->add <= 0)
			{
				throw new Exception('You have no access to add product. Please contact your administrator.');
			}

			$product_record = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
				{
					$image_id = $v;
				}
				else
				{
					$product_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$product_record = $this->cms_function->populate_foreign_field($product_record['category_id'], $product_record, 'category');
			$product_record = $this->cms_function->populate_foreign_field($product_record['corporate_id'], $product_record, 'corporate');

			$this->_validate_add($product_record);

			$product_id = $this->core_model->insert('product', $product_record);
			$product_record['id'] = $product_id;
			$product_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($product_record['id'], 'add', $product_record, array(), 'product');

			if ($image_id > 0)
			{
				$this->core_model->update('image', $image_id, array('product_id' => $product_id));
			}

			$json['product_id'] = $product_id;

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

	public function ajax_change_status($product_id)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($product_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['product']) || $acl['product']->edit <= 0)
			{
				throw new Exception('You have no access to edit product. Please contact your administrator.');
			}

			$old_product = $this->core_model->get('product', $product_id);

			$old_product_record = array();

			foreach ($old_product as $key => $value)
			{
				$old_product_record[$key] = $value;
			}

			$product_record = array();

			foreach ($_POST as $k => $v)
			{
				$product_record[$k] = ($k == 'date') ? strtotime($v) : $v;
			}

			$this->core_model->update('product', $product_id, $product_record);
			$product_record['id'] = $product_id;
			$product_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log('status', $product_record, $old_product_record, 'product');

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

	public function ajax_delete($product_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			$this->db->trans_start();

			if ($product_id <= 0)
			{
				throw new Exception();
			}

			if ($this->session->userdata('user_id') != $this->_user->id)
			{
				throw new Exception('Server Error. Please log out first.');
			}

			$acl = $this->_acl;

			if (!isset($acl['product']) || $acl['product']->delete <= 0)
			{
				throw new Exception('You have no access to delete product. Please contact your administrator.');
			}

			$product = $this->core_model->get('product', $product_id);
			$updated = $_POST['updated'];
			$product_record = array();

			foreach ($product as $k => $v)
			{
				if ($k == 'updated' && $v != $updated)
				{
					throw new Exception('This data has been updated by another product. Please refresh the page.');
				}
				else
				{
					$product_record[$k] = $v;
				}
			}

			$this->_validate_delete($product_id);

			$this->core_model->delete('product', $product_id);
			$product_record['id'] = $product->id;
			$product_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($product_record['id'], 'delete', $product_record, array(), 'product');


			// dihapus apabila tidak punya gambar
			$this->db->where('product_id', $product_id);
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

	public function ajax_edit($product_id)
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

			if (!isset($acl['product']) || $acl['product']->edit <= 0)
			{
				throw new Exception('You have no access to edit product. Please contact your administrator.');
			}

			$old_product = $this->core_model->get('product', $product_id);

			$old_product_record = array();

			foreach ($old_product as $key => $value)
			{
				$old_product_record[$key] = $value;
			}

			$product_record = array();
			$arr_product_access = array();
			$image_id = 0;

			foreach ($_POST as $k => $v)
			{
				if ($k == 'image_id')
                {
                    $image_id = $v;
                }
				else
				{
					$product_record[$k] = ($k == 'date') ? strtotime($v) : $v;
				}
			}

			$product_record = $this->cms_function->populate_foreign_field($product_record['category_id'], $product_record, 'category');
			$product_record = $this->cms_function->populate_foreign_field($product_record['corporate_id'], $product_record, 'corporate');

			$this->_validate_edit($product_id, $product_record);

			$this->core_model->update('product', $product_id, $product_record);
			$product_record['id'] = $product_id;
			$product_record['last_query'] = $this->db->last_query();

			$this->cms_function->system_log($product_record['id'], 'edit', $product_record, $old_product_record, 'product');

			if ($image_id > 0)
            {
                $this->db->where('product_id', $product_id);
                $arr_image = $this->core_model->get('image');

                foreach ($arr_image as $image)
                {
                    unlink("images/website/{$image->id}.{$image->ext}");

                    $this->core_model->delete('image', $image->id);
                }

                $this->core_model->update('image', $image_id, array('product_id' => $product_id));
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

	public function ajax_get($product_id = 0)
	{
		$json['status'] = 'success';

		try
		{
			if ($product_id <= 0)
			{
				throw new Exception();
			}

			$product = $this->core_model->get('product', $product_id);

			$json['product'] = $product;
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




	private function _get_category()
	{
		$this->db->order_by('id');
		return $this->core_model->get('category');
	}

	private function _get_corporate()
	{
		$this->db->order_by('id');
		return $this->core_model->get('corporate');
	}

	private function _validate_add($product_record)
	{
		$this->db->where('name', $product_record['name']);
		$count_user = $this->core_model->count('product');

		if ($count_user > 0)
		{
			throw new Exception('Name already exist.');
		}
	}

	private function _validate_delete($product_id)
	{
		$this->db->where('deletable <=', 0);
		$this->db->where('id', $product_id);
		$count_user = $this->core_model->count('product');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be deleted.');
		}
	}

	private function _validate_edit($product_id, $product_record)
	{
		$this->db->where('editable <=', 0);
		$this->db->where('id', $product_id);
		$count_user = $this->core_model->count('product');

		if ($count_user > 0)
		{
			throw new Exception('Data cannot be updated.');
		}

		$this->db->where('id !=', $product_id);
		$this->db->where('name', $product_record['name']);
		$count_user = $this->core_model->count('product');

		if ($count_user > 0)
		{
			throw new Exception('Name is already exist.');
		}
	}
}