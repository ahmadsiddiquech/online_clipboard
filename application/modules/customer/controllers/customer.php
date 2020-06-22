<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Customer extends MX_Controller
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
        $data['news'] = $this->_get('players.id desc');
        $data['view_file'] = 'news';
        $this->load->module('template');
        $this->template->admin($data);
    }
    
    function _get_data_from_db($update_id) {
        $where['players.id'] = $update_id;
        $query = $this->_get_by_arr_id($where);
        foreach ($query->result() as
                $row) {
            $data['id'] = $row->id;
            $data['join_date'] = $row->join_date;
            $data['phone'] = $row->phone;
            $data['email'] = $row->email;
            $data['name'] = $row->name;
            $data['status'] = $row->status;
        }
        if(isset($data))
            return $data;
    }

    function delete() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id,'players');
    }

    function delete_list() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id,'lists');
    }

    function delete_list_item() {
        $delete_id = $this->input->post('id');
        $this->_delete($delete_id,'list_items');
    }

    function lists(){
        $where['player_id'] = $this->uri->segment(4);
        $data['news'] = $this->_get_table($where,'lists');
        $data['view_file'] = 'lists';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function list_items(){
        $where['list_id'] = $this->uri->segment(4);
        $data['news'] = $this->_get_table($where,'list_items');
        $data['view_file'] = 'list_items';
        $this->load->module('template');
        $this->template->admin($data);
    }

    function set_publish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_publish($where);
        $this->session->set_flashdata('message', 'Post published successfully.');
        redirect(ADMIN_BASE_URL . 'customer/manage/' . '');
    }

    function set_unpublish() {
        $update_id = $this->uri->segment(4);
        $where['id'] = $update_id;
        $this->_set_unpublish($where);
        $this->session->set_flashdata('message', 'Post un-published successfully.');
        redirect(ADMIN_BASE_URL . 'customer/manage/' . '');
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

    function list_detail() {
        $where['id'] = $this->input->post('id');
        $list = $this->_get_table($where,'lists')->result_array();
        foreach ($list as $key => $value) {
            $share_link['share_link'] = BASE_URL.'front/get_list_password/'.$value['share_link'];
            $share_link['list_pass'] = $value['list_pass'];
            $share_link['list_name'] = $value['list_name'];
        }
        $data['user'] = $share_link;
        $this->load->view('list_detail', $data);
    }

    function list_item_detail() {
        $where['list_id'] = $this->input->post('id');
        $list = $this->_get_table($where,'list_items')->result_array();
        foreach ($list as $key => $value) {
            $share_link['page_url'] = $value['page_url'];
            $share_link['page_title'] = $value['page_title'];
        }
        $data['user'] = $share_link;
        $this->load->view('list_item_detail', $data);
    }
	
    function _set_publish($arr_col) {
        $this->load->model('mdl_customer');
        $this->mdl_customer->_set_publish($arr_col);
    }

    function _set_unpublish($arr_col) {
        $this->load->model('mdl_customer');
        $this->mdl_customer->_set_unpublish($arr_col);
    }

    function _get($order_by) {
        $this->load->model('mdl_customer');
        return $this->mdl_customer->_get($order_by);
    }

    function _get_by_arr_id($arr_col) {
        $this->load->model('mdl_customer');
        return $this->mdl_customer->_get_by_arr_id($arr_col);
    }

    function _update_id($id, $data) {
        $this->load->model('mdl_customer');
        $this->mdl_customer->_update_id($id, $data);
    }

    function _delete($arr_col,$table) {       
        $this->load->model('mdl_customer');
        $this->mdl_customer->_delete($arr_col,$table);
    }

    function _get_table($arr_col,$table) {
        $this->load->model('mdl_customer');
        return $this->mdl_customer->_get_table($arr_col,$table);
    }
}