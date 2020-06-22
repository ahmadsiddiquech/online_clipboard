<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Forget_pass extends MX_Controller
{

function __construct() {
parent::__construct();
Modules::run('site_security/is_login');
Modules::run('site_security/has_permission');

}

    function index() {
        $this->manage();
    }

    function manage() {
        $data['news'] = $this->_get('forget_pass.id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function create() {
        $update_id = $this->uri->segment(4);
        if (is_numeric($update_id) && $update_id != 0) {
            $data['news'] = $this->_get_data_from_db($update_id);
        }
        // else {
        //     $data['news'] = $this->_get_data_from_post();
        // }
        
        $data['update_id'] = $update_id;
        $data['view_file'] = 'newsform';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function _get_data_from_db($update_id) {
        $where['forget_pass.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['email'] = $row->email;
            $data['password'] = $row->password;
            $data['status'] = $row->status;
        }
        if(isset($data))
            return $data;
    }

    function _get_data_from_post() {
        $data['email'] = $this->input->post('email');
        $data['password'] = $this->input->post('password');
        return $data;

    }

    function submit() {
            $update_id = $this->uri->segment(4);
            $data = $this->_get_data_from_post();
            if ($update_id != 0) {
                $id = $this->_update($update_id, $data);
            }
            else
            {
                $id = $this->_insert($data);
            }
            redirect(ADMIN_BASE_URL . 'forget_pass');
        }

    function delete() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'forget_pass/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'forget_pass/manage/' . '');
    }

    function change_status() {
        $id = $this->input->post('id');
        $status = $this->input->post('status');
        if ($status == PUBLISHED)
            $status = UN_PUBLISHED;
        else
            $status = PUBLISHED;
        $data = array('status' => $status);
        $status = $this->_update_id($id, $data);
        echo $status;
    }

    function detail() {
        $update_id = $this->input->post('id');
        $data['user'] = $this->_get_data_from_db($update_id);
        $this->load->view('detail', $data);
    }

    function _insert($data) {
        $this->load->model('mdl_forget_pass');
        return $this->mdl_forget_pass->_insert($data);
    }
	
    function _set_publish($arr_col) {
        $this->load->model('mdl_forget_pass');
        $this->mdl_forget_pass->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_forget_pass');
        $this->mdl_forget_pass->_set_unpublish($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_forget_pass');
        return $this->mdl_forget_pass->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_forget_pass');
        return $this->mdl_forget_pass->_get_by_arr_id($arr_col);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_forget_pass');
        $this->mdl_forget_pass->_update_id($id, $data);
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_forget_pass');
        $this->mdl_forget_pass->_update($arr_col, $data);
    }

    function _delete($arr_col) {       
        $this->load->model('mdl_forget_pass');
        $this->mdl_forget_pass->_delete($arr_col);
    }
}