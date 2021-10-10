<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MenuModel extends MY_Model
{
    public function read(){
        if($this->session->userdata('level_id') == 1){
            return $this->admin();
        }elseif($this->session->userdata('level_id') == 2){
            return $this->student();
        }else{
            return [];
        }
    }

    private function admin()
    {
        $data = [
            [
                'label' => 'Siswa',
                'href' => base_url('index.php/student'),
            ],
            [
                'label' => 'Admin',
                'href' => base_url('index.php/admin'),
            ],
            [
                'label' => 'Ekstrakurikuler',
                'href' => base_url('index.php/extracurricular'),
            ],
            [
                'label' => 'Profilku',
                'href' => base_url('index.php/my_profile'),
            ],
        ];

        return $data;
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==
    
    private function student()
    {
        $data = [
            [
                'label' => 'Profilku',
                'href' => '#',
            ],
        ];

        return $data;
    }

    // = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = =
}
