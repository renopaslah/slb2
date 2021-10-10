<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfileModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table_name = 'profiles';
    }

    public function read($where = [], $id = 0)
    {
        if($id){ // read by id
            $this->db->select('a.address, a.id, a.name, DATE_FORMAT(a.date_of_birth, "%d-%m-%Y") date_of_birth')
            ->from($this->_table_name . ' a')
            ->where('a.id', $id);

            $data = $this->db->get()->row_array();

        }else{ // read all
            $this->db->select('a.address, a.id, a.name, DATE_FORMAT(a.date_of_birth, "%d-%m-%Y") date_of_birth')
            ->from($this->_table_name . ' a')
            ->where($where);

            $data = $this->db->get()->result_array();
        }

        return $data;
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function save($data)
    {
        return $this->xsave($data);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==
    
    public function delete($id = 0)
    {
        return $this->xdelete($id);
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==
}
