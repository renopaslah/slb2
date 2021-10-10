<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StudentModel extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->_table_name = 'students';
    }

    public function read($where = [], $id = 0)
    {
        if($id){ // read by id
            $this->db->select('a.profile_id, a.id, a.nisn, DATE_FORMAT(b.date_of_birth, "%d-%m-%Y") date_of_birth')
            ->select('b.address, b.name')
            ->from($this->_table_name . ' a')
            ->join('profiles b', 'b.id = a.profile_id', 'left')
            ->where('a.id', $id);

            $data = $this->db->get()->row_array();

        }else{ // read all
            $this->db->select('a.id, a.nisn, a.profile_id')
            ->select('b.address, b.name, DATE_FORMAT(b.date_of_birth, "%d-%m-%Y") date_of_birth')
            ->from($this->_table_name . ' a')
            ->join('profiles b', 'b.id = a.profile_id', 'left')
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
