<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_model extends CI_Model
{    

    public function __construct()
    {
        parent::__construct();
    }

    public function getWhere($selector, $condition, $tablename)
    {
        $this->db->select($selector);
        $this->db->from($tablename);
        $where = '(' . $condition . ')';
        $this->db->where($where);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function check_login($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where('email', $email);
        $this->db->where('password', $pass);
        $result = $this->db->get();
        return $result->result_array();
    }

    public function get_page_counter()
    {
        $this->db->select('*');
        $this->db->from('site_visitor');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function update_page_counter($data)
    {
        $this->db->update('site_visitor', $data);
    }

    public function get_somobay_counter()
    {
        $this->db->select('count(*) as total_somitee');
        $this->db->from('somitee_info');
        $result = $this->db->get();
        return $result->result_array();
    }

    public function match_user_phone($phone_no)
    {

        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('user_phone', $phone_no);

        $result = $this->db->get();
        return $result->result_array();
    }

}

?>