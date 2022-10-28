<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dace extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		check_login_user();
		$this->load->model('Dace_model');
	}

	public function list($var = null)
	{

		$data['title'] = 'Lista Dace';

		$data['list'] = $this->Dace_model->list_dace(array('user_formdace' => $this->session->userdata('user_id')));

		$data['links'] = array(
			'<link href="' . base_url() . 'assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">',
			'<link href="' . base_url() . 'assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css" rel="stylesheet">',
			'<link href="' . base_url() . 'assets/node_modules/prism/prism.css" rel="stylesheet">',

		);
		$data['scripts'] = array(
			'<script src="' . base_url() . 'assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>',
			'<script src="' . base_url() . 'assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>',
			'<script src="' . base_url() . 'buttons/1.5.1/js/dataTables.buttons.min.js"></script>',
			'<script src="' . base_url() . 'buttons/1.5.1/js/buttons.flash.min.js"></script>',
			'<script src="' . base_url() . 'ajax/libs/jszip/3.1.3/jszip.min.js"></script>',
			'<script src="' . base_url() . 'ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>',
			'<script src="' . base_url() . 'ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>',
			'<script src="' . base_url() . 'buttons/1.5.1/js/buttons.html5.min.js"></script>',
			'<script src="' . base_url() . 'buttons/1.5.1/js/buttons.print.min.js"></script>',
			'<script src="' . base_url() . 'dist/js/datatable.js"></script>'

		);
		$this->template->load('admin/template', 'admin/dace/list_dace', $data);
	}

	public function formDace()
	{
		$data['title'] = 'Formulario Dace';
		$data['range1'] = $this->Dace_model->get_ranges(array('category_range' => '1'));
		$data['range2'] = $this->Dace_model->get_ranges(array('category_range' => '2'));
		$data['range3'] = $this->Dace_model->get_ranges(array('category_range' => '3'));
		$data['links'] = array(
			'<link href="' . base_url() . 'assets/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet">'
		);
		$data['scripts'] = array(
			'<script src="' . base_url() . 'assets/node_modules/dropify/dist/js/dropify.min.js"></script>',
			'<script>$(document).ready(function() {$(".dropify").dropify();});</script>'
		);


		$this->template->load('admin/template', 'admin/dace/formDace', $data);
	}

	public function addForm()
	{

		$x = bin2hex(openssl_random_pseudo_bytes(16));

		/* data user */

		$name_user = $this->input->post('name_user');
		$last_name_user = $this->input->post('last_name_user');
		$cip_user = $this->input->post('cip_user');
		$range_user = $this->input->post('range_user');
		$email_user = $this->input->post('email_user');
		$phone_user = $this->input->post('phone_user');
		$tel_user = $this->input->post('tel_user');
		$assignmen = $this->input->post('assignment');
		$obs_user = $this->input->post('observation_user');
		$assig_type = $this->input->post('customRadio');



		if ($_FILES['img_tit']['name'] != "") {

			$config['upload_path'] = 'assets/images/fingerprint/';
			$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';

			$image_tit = date('dmYhis') . '_' . rand(0, 99999) . "." . pathinfo($_FILES['img_tit']['name'], PATHINFO_EXTENSION);

			$config['file_name'] = $image_tit;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('img_tit')) {
				$error = array('error' => $this->upload->display_errors());

				var_dump($error) . "<br>";
			}
		}


		if ($_FILES['img_con']['name'] != "") {

			$config['upload_path'] = 'assets/images/fingerprint/';
			$config['allowed_types'] = 'jpg|png|jpeg|PNG|JPG|JPEG';

			$image_con = date('dmYhis') . '_' . rand(0, 99999) . "." . pathinfo($_FILES['img_con']['name'], PATHINFO_EXTENSION);

			$config['file_name'] = $image_con;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('img_con')) {
				$error = array('error' => $this->upload->display_errors());

				var_dump($error) . "<br>";
			}
		}

		$data_form = array(
			'user_formdace' => $this->session->userdata('user_id'),
			'token_formdace' => $x,
			'observation_user' => $obs_user,
			'assignment' => $assignmen,
			'assignment_type' => $assig_type,
			'img_tit' => $image_tit,
			'img_con' => $image_con,
			'date_create_dace' => date(DATE_W3C)

		);

		$this->Dace_model->insert($data_form, 'tbl_form_dace');


		/* data spouse */

		$name_spouse = $this->input->post('name_spouse');
		$lastname_spouse = $this->input->post('lastname_spouse');
		$cip_spouse = $this->input->post('cip_spouse');
		$dni_spouse = $this->input->post('dni_spouse');
		$range_spouse = $this->input->post('range_spouse');
		$obs_spouse = $this->input->post('observation_spouse');

		$data_spouse = array(
			'user' => $this->session->userdata('user_id'),
			'name_spouse' => $name_spouse,
			'lastname_spouse' => $lastname_spouse,
			'cip_spouse' => $cip_spouse,
			'dni_spouse' => $dni_spouse,
			'range_spouse' => $range_spouse,
			'obser_spouse' => $obs_spouse,
			'token_formdace' => $x
		);

		$this->Dace_model->insert($data_spouse, 'tbl_spouse_user');

		/* data sons (Data Array)*/

		$name_son = $this->input->post('name_son');
		$lastname_son = $this->input->post('lastname_son');
		$cip_son = $this->input->post('cip_son');
		$dni_son = $this->input->post('dni_son');
		$observations = $this->input->post('observations');

		for ($i = 0; $i < count($name_son); $i++) {
			$data_sons = array(
				'name_son_user' => $name_son[$i],
				'user' => $this->session->userdata('user_id'),
				'lastname_son_user' => $lastname_son[$i],
				'cip_son_user' => $cip_son[$i],
				'dni_son_user' => $dni_son[$i],
				'observations' => $observations[$i],
				'token_formdace' => $x
			);
			$this->Dace_model->insert($data_sons, 'tbl_sons_user');
		}

		/* data workplace */
		$unit_workplace = $this->input->post('unit_workplace');
		$greatunit_workplace = $this->input->post('greatunit_workplace');
		$core_workplace = $this->input->post('core_workplace');

		$data_workplace = array(
			'user' => $this->session->userdata('user_id'),
			'unit_workplace_user' => $unit_workplace,
			'greatunit_workplace_user' => $greatunit_workplace,
			'core_workplace_user' => $core_workplace,
			'token_formdace' => $x
		);

		$this->Dace_model->insert($data_workplace, 'tbl_workplace_user');

		/* data gguu placement */
		$unit_gguu = $this->input->post('unit_gguu_placement');
		$greatunit_ggu = $this->input->post('greatunit_gguu_placement');
		$core_gguu = $this->input->post('core_gguu_placement');

		$data_gguu = array(
			'user' => $this->session->userdata('user_id'),
			'unit_gguu_placement' => $unit_gguu,
			'greatunit_gguu_placement' => $greatunit_ggu,
			'core_gguu_placement' => $core_gguu,
			'token_formdace' => $x
		);

		$this->Dace_model->insert($data_gguu, 'tbl_gguu_placement');

		/* data ze placement */
		$unit_ze = $this->input->post('unit_ze_placement');
		$greatunit_ze = $this->input->post('greatunit_ze_placement');
		$core_ze = $this->input->post('core_ze_placement');

		$data_ze = array(
			'user' => $this->session->userdata('user_id'),
			'unit_ze_placement' => $unit_ze,
			'greatunit_ze_placement' => $greatunit_ze,
			'core_ze_placement' => $core_ze,
			'token_formdace' => $x
		);

		$this->Dace_model->insert($data_ze, 'tbl_ze_placement');

		/* data  request home (Data Array)*/
		$day_request = $this->input->post('day_request_home');
		$month_request = $this->input->post('month_request_home');
		$year_request = $this->input->post('year_request_home');

		for ($i = 0; $i < count($day_request); $i++) {
			$data_request_home = array(
				'user' => $this->session->userdata('user_id'),
				'day_request_home' => $day_request[$i],
				'month_request_home' => $month_request[$i],
				'year_request_home' => $year_request[$i],
				'token_formdace' => $x
			);
			$this->Dace_model->insert($data_request_home, 'tbl_request_home');
		}

		/* data occupancy home (Data Array)*/
		$from_occupancy = $this->input->post('from_occupancy_home');
		$to_occupancy = $this->input->post('to_occupancy_home');

		for ($i = 0; $i < count($from_occupancy); $i++) {
			$data_occupancy_home = array(
				'user' => $this->session->userdata('user_id'),
				'from_occupancy_home' => $from_occupancy[$i],
				'to_occupancy_home' => $to_occupancy[$i],
				'token_formdace' => $x
			);
			$this->Dace_model->insert($data_occupancy_home, 'tbl_occupancy_home');
		}

		/* data priorities dace (Data Array)*/
		$first_priority = $this->input->post('first_priority_dace');
		$second_priority = $this->input->post('second_priority_dace');
		$third_priority = $this->input->post('third_priority_dace');

		$data_priorities = array(
			'user' => $this->session->userdata('user_id'),
			'first_priority_dace' => $first_priority,
			'second_priority_dace' => $second_priority,
			'third_priority_dace' => $third_priority,
			'token_formdace' => $x
		);

		$this->Dace_model->insert($data_priorities, 'tbl_priorities_dace');
	}

	public function editForm($token = "")
	{
		$data['title'] = 'Formulario Dace Editar';
		$data['range1'] = $this->Dace_model->get_ranges(array('category_range' => '1'));
		$data['range2'] = $this->Dace_model->get_ranges(array('category_range' => '2'));
		$data['range3'] = $this->Dace_model->get_ranges(array('category_range' => '3'));
		$data['links'] = array(
			'<link href="' . base_url() . 'assets/node_modules/dropify/dist/css/dropify.min.css" rel="stylesheet">'
		);
		$data['scripts'] = array(
			'<script src="' . base_url() . 'assets/node_modules/dropify/dist/js/dropify.min.js"></script>',
			'<script>$(document).ready(function() {$(".dropify").dropify();});</script>'
		);
		
		$data['user'] = $this->Dace_model->auth_row('tbl_users', array('id_user' => $this->session->userdata('user_id')));

		$data['spous'] = $this->Dace_model->auth_row('tbl_spouse_user', array('user' => $this->session->userdata('user_id')));

		$data['dace'] = $this->Dace_model->auth_row('tbl_form_dace', array('token_formdace' => $token));

		$data['sons'] = $this->Dace_model->get_data('tbl_sons_user', array('token_formdace' => $token));

		$data['workplace'] = $this->Dace_model->auth_row('tbl_workplace_user', array('token_formdace' => $token));

		$data['gguu'] = $this->Dace_model->auth_row('tbl_gguu_placement', array('token_formdace' => $token));

		$data['ze'] = $this->Dace_model->auth_row('tbl_ze_placement', array('token_formdace' => $token));

		$data['pr'] = $this->Dace_model->auth_row('tbl_priorities_dace', array('token_formdace' => $token));

		$row_request = $this->Dace_model->validate('tbl_request_home', array('user' => $this->session->userdata('user_id')));


		if ($row_request <= 0) {
			$data['rows_request'] = 0;
		} else {
			$data['rows_request'] = 1;
			$data['request_home'] = $this->Dace_model->get_data('tbl_request_home', array('token_formdace' => $token));;
		}
		
		$request_occupancy  = $this->Dace_model->validate('tbl_occupancy_home', array('token_formdace' => $token));

		if ($request_occupancy <= 0) {
			$data['rows_occupancy'] = 0;
		} else {
			$data['rows_occupancy'] = 1;
			$data['occupancy_home'] = $this->Dace_model->get_data('tbl_occupancy_home', array('token_formdace' => $token));
		}

		$this->template->load('admin/template', 'admin/dace/edit_dace', $data);



	}

	public function pdf_dace($token)
	{
		$data['user'] = $this->Dace_model->auth_row('tbl_users', array('id_user' => $this->session->userdata('user_id')));

		$data['spous'] = $this->Dace_model->auth_row('tbl_spouse_user', array('user' => $this->session->userdata('user_id')));

		$data['dace'] = $this->Dace_model->auth_row('tbl_form_dace', array('token_formdace' => $token));

		$data['sons'] = $this->Dace_model->get_data('tbl_sons_user', array('token_formdace' => $token));

		$data['workplace'] = $this->Dace_model->auth_row('tbl_workplace_user', array('token_formdace' => $token));

		$data['gguu'] = $this->Dace_model->auth_row('tbl_gguu_placement', array('token_formdace' => $token));

		$data['ze'] = $this->Dace_model->auth_row('tbl_ze_placement', array('token_formdace' => $token));

		$row_request = $this->Dace_model->validate('tbl_priorities_dace', array('user' => $this->session->userdata('user_id')));

		$data['pr'] = $this->Dace_model->auth_row('tbl_priorities_dace', array('token_formdace' => $token));


		if ($row_request <= 0) {
			$data['rows_request'] = 0;
		} else {
			$data['rows_request'] = 1;
			$data['request_home'] = $this->Dace_model->get_data('tbl_request_home', array('token_formdace' => $token));;
		}

		$request_occupancy  = $this->Dace_model->validate('tbl_occupancy_home', array('token_formdace' => $token));

		if ($request_occupancy <= 0) {
			$data['rows_occupancy'] = 0;
		} else {
			$data['rows_occupancy'] = 1;
			$data['occupancy_home'] = $this->Dace_model->get_data('tbl_occupancy_home', array('token_formdace' => $token));
		}
		$this->load->view("admin/dace/pdf_dace", $data);
	}
}
