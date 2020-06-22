<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_front extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert($data){
    	$table = 'players';
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function get_where_login($email,$password){
    	$table = 'players';
    	$this->db->select('email,phone,name,id');
        $this->db->where('status',1);
    	$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get($table);
    }

    function _get_where_validate($email){  
        $table = 'players';
        $this->db->where('email', $email);
        return $this->db->get($table);
    }

    function _get_email_password_for_reset(){  
        $table = 'forget_pass';
        $this->db->select('email,password');
        return $this->db->get($table);
    }

    function _update($arr_col, $data) {
        $table = 'players';
        $this->db->where($arr_col);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function _get_list_with_share_link($arr_col){
        $this->db->select('lists.*,list_items.*');
        $this->db->from('lists');
        $this->db->join("list_items", "list_items.list_id = lists.id", "full");
        $this->db->where($arr_col);
        return $this->db->get();
    }




//==================================================================
//=====================API Functions================================
//==================================================================
    function _get_user_login($where){
        $table = 'players';
        $this->db->where($where);
        $this->db->where('status', '1');
        return $this->db->get($table);
    }

    function _update_api_data($where,$table,$data){
        $this->db->where($where);
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    function _get_list_data($share_link,$password){
        $this->db->select('lists.*,list_items.*');
        $this->db->from('lists');
        $this->db->join("list_items", "list_items.list_id = lists.id", "full");
        $this->db->where('lists.share_link',$share_link);
        $this->db->where('lists.list_pass',$password);
        return $this->db->get();
    }

    function _insert_api_data($data,$table){
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function _delete_api_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table); 
    }



}
?>