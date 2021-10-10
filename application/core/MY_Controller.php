<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->login_check();
    }
    // == == == == == == == == == == == == == == == == == == == == == == == == ==
    private function login_check()
    {
        if(!$this->session->userdata('is_login')){
            redirect(base_url('index.php/login'));
        }
    }
}