<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('MenuModel', 'menu');
	}

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

	public function index()
	{
		$data = [			
			'property' => [
				'template' => 'admin',
				'title' => 'Admin',
				'menu' => $this->menu->read(),
			],
			'data' => [],
		];

		$this->load->view('template', $data);
	}
}
