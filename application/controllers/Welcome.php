<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 public function __construct() {
		parent::__construct();
		$this->load->model('M_welcome', 'model');
		$this->load->helpers('url');
		$this->load->library('session');
	 }
	public function index($id = FALSE)
	{
		if ($id == false) {
			$data['home_post'] = $this->model->read();
			$this->load->view('header');
			$this->load->view('home', vars: $data);
			$this->load->view('footer');
		} else {
			$data['post'] = $this->model->read($id);
			$this->load->view('header');
			$this->load->view('post', vars: $data);
			$this->load->view('footer');
		}
	}

	public function create() {
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description','required');

		if( $this->form_validation->run() == FALSE ) {
			$this->load->view('header');
			$this->load->view('create');
			$this->load->view('footer');
		} else {
			$id = uniqid('item', true);

			$config['upload_path'] = './upload/post';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '100000';
			$config['file_ext_tolower'] = TRUE;
			$config['filename'] = str_replace('.', '_', $id);

			$this->load->library('upload', $config);

			if( $this->upload->do_upload('image1') == FALSE ) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('welcome/index');
			} else {
				$filename = $this->upload->data('file_name');
				$this->model->create($id, $filename);
				redirect('');
			}
		}
	}
}
