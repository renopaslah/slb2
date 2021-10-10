<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->_table_name = 'users';
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function read($where = [], $id = 0)
    {
        if($id){ // read by id
            $this->db->select('a.username, a.profile_id, a.password, a.level_id')
            ->from($this->_table_name . ' a')
            ->where('a.id', $id);

            $data = $this->db->get()->row_array();

        }else{ // read all
            $this->db->select('a.username, a.profile_id, a.password, a.level_id')
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
