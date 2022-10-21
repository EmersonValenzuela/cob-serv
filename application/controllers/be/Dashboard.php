<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		check_login_user();
		$this->load->model('Be_model');
	}

	public function index()
	{
		$data['title'] = 'Registros';
		$data['links'] = array();
		$data['scripts'] = array();

		$u = $this->Be_model->record('tbl_data_univ');
		$i = $this->Be_model->record('tbl_data_institute');
		$b = $this->Be_model->record('tbl_data_britanico');
		$t = $u + $i + $b;

		$record = array(
			'das' => $t,
			'dace' => $this->Be_model->record('tbl_form_dace')
		);

		$data['record'] = $record;

		$data['list'] = $this->Be_model->list_dace();

		$data['univ'] = $this->Be_model->get_univ_list();
		$data['inst'] = $this->Be_model->get_inst_list();
		$data['brit'] = $this->Be_model->get_brit_list();

		$this->template->load('be/template', 'be/dashboard', $data);
	}
	public function logout()
	{

		$array_items = array('user_id', 'user_type', 'user_name', 'user_email', 'user_phone', 'user_cip', 'user_dni', 'is_user_login');

		$this->session->unset_userdata($array_items);

		if (isset($_SERVER['HTTP_REFERER']))
			redirect($_SERVER['HTTP_REFERER']);
		else
			redirect('/', 'refresh');
	}
}
