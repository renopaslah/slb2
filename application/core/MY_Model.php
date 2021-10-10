<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Model extends CI_Model
{
    protected $_table_name;

    // == == == == == == == == == == == == == == == == == == == == == == == == ==

    public function xsave($data)
    {
        if(array_key_exists("id", $data)){ // update
            $this->db->where('id', $data['id']);
            $save = $this->db->update($this->_table_name, $data);
        }else{ // save
            $save = $this->db->insert($this->_table_name, $data);
        }

        return $save;
    }

    // == == == == == == == == == == == == == == == == == == == == == == == == ==
    
    public function xdelete($id)
    {
        $delete = $this->db->where(['id' => $id])->delete($this->_table_name);
        
        return $delete;
    }
}