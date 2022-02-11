<?php
defined('BASEPATH') or exit('No direct script access allowed');
class user_access_models extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
       
    }

    public function signup($user){
        $this->db->insert('user',$user);
        $query = $this->db->insert_id('user');
        return $query;
    }
    public function admin_login($phon, $pass){
        $this->db->select('*');
        $this->db->where('phon',$phon);
        $this->db->where('password',$pass);
        $query = $this->db->get('admin');
        if($query->result() != null){
            return true;
        }
        else return false;
    }

    public function show_users_list($start_date, $end_date){
        $this->db->select('*');
        $this->db->where('created_at >=', $start_date);
        $this->db->where('created_at <=', $end_date);
        $query = $this->db->get('user');

        return $query->result();
    }
}