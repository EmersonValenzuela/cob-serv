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
					'<script src="' . base_url() . 'dist/js/crr.js"></script>',
					'<script>
					$(".modal").addClass("active")
					$(".modal-content").addClass("active")
					$(".modal").removeClass("remove")
					$(".modal-content").removeClass("remove")
					</script>'
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
				'<link href="' . base_url() . 'dist/css/pages/crr.css" rel="stylesheet">'

			);

			$data['scripts'] = array(
				'<script src="' . base_url() . 'dist/js/pages/cropper.js"></script>',
				'<script src="' . base_url() . 'dist/js/pages/profile.js"></script>'

			);
			$rowData = $this->Admin_model->auth_user_login(array('id_user' => $this->session->userdata('user_id')));

			$data['r'] = $rowData;

			$this->template->load('admin/template', 'admin/pages/profile', $data);
		}

		public function upProfile()
		{	
			$data = array(
				
			);
			echo json_encode($data);
			exit();
		}

		public function uploadCrop()
		{
			$data = $_POST["image"];

			$image_array_1 = explode(";", $data);

			$image_array_2 = explode(",", $image_array_1[1]);

			$data = base64_decode($image_array_2[1]);

			$imageName = 'assets/images/fingerprint/' . time() . '.png';

			file_put_contents($imageName, $data);

			
			echo $imageName;
		}

		public function upImage()
		{
			$data = $_POST["im"];
			$row = $this->Admin_model->update(array('signature_user' => $data), $this->session->userdata('user_id'), 'tbl_users');

			$r = $this->session->set_userdata('user_signature', $data);
			echo $r;
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


			echo $imageName;
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
