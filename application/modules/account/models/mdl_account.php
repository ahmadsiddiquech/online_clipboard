<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mdl_account extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function _update($data,$id){
    	$table = 'players';
    	$this->db->where('id',$id);
        $this->db->update($table,$data);
    }

    function _get($arr_col,$table){
        $this->db->where($arr_col);
        return $this->db->get($table);
    }

    function _insert($data,$table) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    function _delete($arr_col,$table) {
        $this->db->where($arr_col);
        $this->db->delete($table);
    }
}
