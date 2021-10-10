<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		session_destroy();
		$data = [	
			'property' => [
				'template' => 'login',
				'title' => 'Login',
				'menu' => [
					// [
					// 	'label' => 'Home',
					// 	'href' => '#',
					// ],
				],
			],
			'data' => [],
		];

		$this->load->view('template', $data);
	}

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

	public function auth(){
		$this->load->model('UserModel', 'user');

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->user->read(['a.username' => $username]);
		
		if(count($user) == 1){
			// user ditemukan
			$level_id = $user[0]['level_id'];

			if(password_verify($this->input->post('password'), $user[0]['password'])){
				$this->session->set_userdata([
					'profile_id' => $user[0]['profile_id'],
					'is_login' => true,
					'level_id' => $level_id,
				]);

				if($level_id == 1){
					redirect('/student');
				}elseif($level_id == 2){
					redirect('/my_profile');
				}else{
					$this->index();
				}
				
			}else{
				$this->session->set_flashdata('info', 'Username dan password salah');
				$this->index();
			}
		}else{
			$this->session->set_flashdata('info', 'User tidak terdaftar');
			$this->index();
		}
	}

	// == == == == == == == == == == == == == == == == == == == == == == == == ==

	private function get_password($password){
        $password_enc = password_hash($password, PASSWORD_DEFAULT);
		return $password_enc;
	}
}
