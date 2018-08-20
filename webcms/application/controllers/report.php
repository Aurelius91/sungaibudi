<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
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

		// load cms_excel
		$this->load->library('cms_excel');
	}




		public function export_enquiry()
	{
		$arr_record = $this->_export_enquiry('Contact Us');

		$title = $this->_setting->system_company_name . ' - Contact Us Enquiry';
		$objPHPExcel = $this->cms_excel->create_excel($title);
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Contact Us Enquiry');
		$this->cms_excel->setautosize($objPHPExcel, array('A', 'B', 'C', 'D', 'E'));
		$this->cms_excel->setbold($objPHPExcel, array("A1"));
		$this->cms_excel->setmerge($objPHPExcel, array("A1:E1"));

		$row = 3;

		$objPHPExcel->getActiveSheet()->setCellValue("A{$row}", 'Date');
		$objPHPExcel->getActiveSheet()->setCellValue("B{$row}", 'Name');
		$objPHPExcel->getActiveSheet()->setCellValue("C{$row}", 'Email');
		$objPHPExcel->getActiveSheet()->setCellValue("D{$row}", 'Phone');
		$objPHPExcel->getActiveSheet()->setCellValue("E{$row}", 'Message');
		$this->cms_excel->setborder($objPHPExcel, "A{$row}", "E{$row}", '#000');
		$this->cms_excel->setbold($objPHPExcel, array("A{$row}", "B{$row}", "C{$row}", "D{$row}", "E{$row}"));

		$row += 1;

		if (count($arr_record['arr_enquiry']) > 0)
		{
			foreach ($arr_record['arr_enquiry'] as $enquiry)
			{
				$objPHPExcel->getActiveSheet()->setCellValue("A{$row}", $enquiry->date_display);
				$objPHPExcel->getActiveSheet()->setCellValue("B{$row}", $enquiry->name);
				$objPHPExcel->getActiveSheet()->setCellValue("C{$row}", $enquiry->email);
				$objPHPExcel->getActiveSheet()->setCellValueExplicit("D{$row}", $enquiry->phone);
				$objPHPExcel->getActiveSheet()->setCellValue("E{$row}", $enquiry->message);
				$this->cms_excel->setborder($objPHPExcel, "A{$row}", "E{$row}", '#000');

				$row += 1;
			}
		}
		else
		{
			$objPHPExcel->getActiveSheet()->setCellValue("A{$row}", 'No Data.');
			$this->cms_excel->setmerge($objPHPExcel, array("A{$row}:E{$row}"));
			$this->cms_excel->setborder($objPHPExcel, "A{$row}", "A{$row}", '#000');
		}

		$this->cms_excel->download_excel($objPHPExcel, $title);
	}




	private function _export_enquiry($type)
	{
		$this->db->where('type', $type);
		$arr_enquiry = $this->core_model->get('enquiry');

		foreach ($arr_enquiry as $enquiry)
		{
			$enquiry->date_display = ($enquiry->date != '') ? date('Y-m-d H:i:s', $enquiry->date) : '';
		}

		$arr_record = array();
		$arr_record['arr_enquiry'] = $arr_enquiry;

		return $arr_record;
	}
}