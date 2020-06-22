<?php 
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Account extends MX_Controller {
    function __construct() {
        parent::__construct();
        Modules::run('site_security/is_login_gamer');
    }
////////////////////////// FOR HOME PAGE /////////////////////


    function index() {
        $gamers_data = $this->session->userdata('gamers_data');
        $arr_col['id'] = $gamers_data['user_id'];
        $data['news'] = $this->_get($arr_col,'players')->result_array();
        $data['view_file'] = 'index';
        $data['module'] = 'account';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function lists(){
        $gamers_data = $this->session->userdata('gamers_data');
        $arr_col['player_id'] = $gamers_data['user_id'];
        $data['news'] = $this->_get($arr_col,'lists');
        $data['view_file'] = 'lists';
        $data['module'] = 'account';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function create_list(){
        $data['view_file'] = 'create_list';
        $data['module'] = 'account';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function submit_list(){
        $gamers_data = $this->session->userdata('gamers_data');
        $data['player_id'] = $gamers_data['user_id'];
        $data['list_name'] = $this->input->post('list_name');
        $data['list_pass'] = $this->input->post('list_pass');
        $share_link = Modules::run('front/get_random_chars',15);
        $data['share_link'] = $share_link;
        $this->_insert($data,'lists');
        redirect(BASE_URL.'account/lists');
    }

    function delete_list() {
        $arr_col['id'] = $this->input->post('id');
        $this->_delete($arr_col,'lists');
    }

    function delete_list_items() {
        $arr_col['id'] = $this->input->post('id');
        $this->_delete($arr_col,'list_items');
    }

    function create_list_items(){
        $data['view_file'] = 'create_list_items';
        $data['module'] = 'account';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function submit_list_item(){
        $data['list_id'] = $this->uri->segment(3);
        $data['page_title'] = $this->input->post('page_title');
        $data['page_url'] = $this->input->post('page_url');
        $this->_insert($data,'list_items');
        redirect(BASE_URL.'account/create_list_items/'.$data['list_id']);
    }

    function list_items(){
        $arr_col['list_id'] = $this->uri->segment(3);
        $data['news'] = $this->_get($arr_col,'list_items');
        $data['view_file'] = 'list_items';
        $data['module'] = 'account';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }


    function update(){
        $data['phone'] = $this->input->post('phone');
        $data['name'] = $this->input->post('name');
        $gamers_data = $this->session->userdata('gamers_data');
        $id = $gamers_data['user_id'];
        $this->_update($data,$id);
        redirect(BASE_URL.'account');
    }

    function update_password(){
        $data['password'] = md5($this->input->post('password'));
        $gamers_data = $this->session->userdata('gamers_data');
        $id = $gamers_data['user_id'];
        $this->_update($data,$id);
        redirect(BASE_URL.'account');
    }

    function share_link() {
        $arr_col['id'] = $this->input->post('id');
        $list = $this->_get($arr_col,'lists')->result_array();
        foreach ($list as $key => $value) {
            $share_link['share_link'] = BASE_URL.'front/get_list_password/'.$value['share_link'];
            $share_link['list_pass'] = $value['list_pass'];
        }
        $data['user'] = $share_link;
        $this->load->view('share_link', $data);
    }

//==============================================================================
//==============================================================================


    function _update($data,$id) {
        $this->load->model('mdl_account');
        $this->mdl_account->_update($data,$id);
    }

    function _get($arr_col,$table) {
        $this->load->model('mdl_account');
        return $this->mdl_account->_get($arr_col,$table);
    }

    function _insert($data,$table) {
        $this->load->model('mdl_account');
        return $this->mdl_account->_insert($data,$table);
    }

    function _delete($arr_col,$table) {       
        $this->load->model('mdl_account');
        $this->mdl_account->_delete($arr_col,$table);
    }

}
?>