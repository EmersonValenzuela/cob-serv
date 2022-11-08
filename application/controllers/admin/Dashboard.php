	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Dashboard extends CI_Controller
	{

		public function __construct()
		{

			parent::__construct();
			check_login_user();
			$this->load->model('Admin_model');
		}

		public function index()
		{
			$data['title'] = 'Inicio';

			$data['links'] = array(
				'<link href="' . base_url() . 'dist/css/pages/cropper.css" rel="stylesheet">'
			);

			$rowData = $this->Admin_model->auth_user_login(array('id_user' => $this->session->userdata('user_id')));
			$data['scripts'] = array();
			if ($this->session->userdata('user_signature') == "1") {

				$data['scripts'] = array(
					'<script src="' . base_url() . 'dist/js/pages/cropper.js"></script>',
					'<script src="' . base_url() . 'dist/js/crr.js"></script>'

				);
			} else {
				$data['scripts'] = array(
					'<script src="' . base_url() . 'dist/js/pages/cropper.js"></script>',
					'<script src="' . base_url() . 'dist/js/crr.js"></script>',

				);
			}

			$this->template->load('admin/template', 'admin/pages/home', $data);
		}

		public function profile()
		{
			$data['title'] = 'Perfil';
			$data['links'] = array(
				'<link href="' . base_url() . 'dist/css/pages/cropper.css" rel="stylesheet">',
				'<link href="' . base_url() . 'dist/css/pages/crr.css" rel="stylesheet">',
				'<link href="https://cdnjs.cloudflare.com/ajax/libs/hopscotch/0.2.5/css/hopscotch.min.css" rel="stylesheet">'
			);

			$data['scripts'] = array(
				'<script src="https://cdnjs.cloudflare.com/ajax/libs/hopscotch/0.2.5/js/hopscotch.min.js"></script>',
				'<script src="' . base_url() . 'dist/js/pages/cropper.js"></script>',
				'<script src="' . base_url() . 'dist/js/pages/profile.js"></script>'



			);
			$rowData = $this->Admin_model->auth_user_login(array('id_user' => $this->session->userdata('user_id')));

			$data['r'] = $rowData;

			$this->template->load('admin/template', 'admin/pages/profile', $data);
		}

		public function upProfile()
		{
			$a = array(
				'name_user' => $this->input->post('name'),
				'lastname_user' => $this->input->post('lastname'),
				'email_user' => $this->input->post('correo')
			);
			$this->Admin_model->update($a, $this->session->userdata('user_id'), 'tbl_users');

			$b = array(
				'user_name' => $this->input->post('name'),
				'user_lastname' => $this->input->post('lastname'),
				'user_email' => $this->input->post('correo')
			);

			$this->session->set_userdata($b);

			echo json_encode('a');
			exit();
		}


		public function upImgUser()
		{
			$data = $_POST["image"];

			$image_array_1 = explode(";", $data);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data = base64_decode($image_array_2[1]);

			$imageName = 'assets/images/users/' . time() . '.png';

			file_put_contents($imageName, $data);

			$row = $this->Admin_model->update(array('img_user' => $imageName), $this->session->userdata('user_id'), 'tbl_users');
			$r = $this->session->set_userdata('user_img_profile', $imageName);


			$jsonData['status'] = 1;
			$jsonData['img'] = $imageName;


			//Mostrando mi respuesta en formato Json
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($jsonData);
		}

		public function upImgDni()
		{
			$data = $_POST["image"];
			$jsonData = array();
			$image_array_1 = explode(";", $data);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data = base64_decode($image_array_2[1]);

			$imageName = 'assets/images/cip/' . time() . '.png';

			file_put_contents($imageName, $data);

			$row = $this->Admin_model->update(array('dni_image_user' => $imageName), $this->session->userdata('user_id'), 'tbl_users');
			$r = $this->session->set_userdata('user_img_dni', $imageName);


			$jsonData['status'] = 1;
			$jsonData['img'] = $imageName;


			//Mostrando mi respuesta en formato Json
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($jsonData);
		}

		public function upImgCip()
		{
			$data = $_POST["image"];

			$image_array_1 = explode(";", $data);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data = base64_decode($image_array_2[1]);

			$imageName = 'assets/images/cip/' . time() . '.png';

			file_put_contents($imageName, $data);

			$row = $this->Admin_model->update(array('cip_image_user' => $imageName), $this->session->userdata('user_id'), 'tbl_users');
			$r = $this->session->set_userdata('user_img_cip', $imageName);


			$jsonData['status'] = 1;
			$jsonData['img'] = $imageName;


			//Mostrando mi respuesta en formato Json
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($jsonData);
		}
		public function upImgSign()
		{
			$data = $_POST["image"];

			$image_array_1 = explode(";", $data);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data = base64_decode($image_array_2[1]);

			$imageName = 'assets/images/fingerprint/' . time() . '.png';

			file_put_contents($imageName, $data);

			$row = $this->Admin_model->update(array('signature_user' => $imageName), $this->session->userdata('user_id'), 'tbl_users');
			$r = $this->session->set_userdata('user_signature', $imageName);



			$jsonData['status'] = 1;
			$jsonData['img'] = $imageName;


			//Mostrando mi respuesta en formato Json
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($jsonData);
		}

		public function vld()
		{
			$vld = $this->input->post('vld');

			$row = $this->Admin_model->update(array('cod_validation_user' => $vld), $this->session->userdata('user_id'), 'tbl_users');
			$this->session->set_userdata('cod_validation', $vld);

			
			$jsonData['status'] = 200;
			$jsonData['v'] = $vld;


			//Mostrando mi respuesta en formato Json
			header('Content-type: application/json; charset=utf-8');
			echo json_encode($jsonData);
		}

		public function logout()
		{

			$array_items = array('user_id', 'user_type', 'user_name', 'user_email', 'user_phone', 'user_cip', 'user_dni', 'is_user_login', 'user_signature', 'user_img_dni', 'user_img_cip', 'user_img_profile', 'user_range');

			$this->session->unset_userdata($array_items);

			if (isset($_SERVER['HTTP_REFERER']))
				redirect($_SERVER['HTTP_REFERER']);
			else
				redirect('/', 'refresh');
		}

		public function example()
		{
			# code..
			$this->load->view('admin/pages/example');
		}
	}
