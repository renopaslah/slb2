<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_profile extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MenuModel', 'menu');
		$this->load->model('ProfileModel', 'profile');
		$this->load->model('ExtracurricularModel', 'extra');
	}

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

	public function index()
	{
		$data = [			
			'property' => [
				'template' => 'my_profile',
				'title' => 'Profilku',
				'menu' => $this->menu->read(),
			],
			'data' => [
				'profile' => $this->profile->read([], $this->session->userdata('profile_id')),
				'extra' => $this->extra->read(),
			],
		];

		$this->load->view('template', $data);
	}
}
