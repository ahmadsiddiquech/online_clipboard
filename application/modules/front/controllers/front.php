<?php 
if ( ! defined('BASEPATH')) 
    exit('No direct script access allowed');

class Front extends MX_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library("pagination");
        $this->load->helper("url");
    }
////////////////////////// FOR HOME PAGE /////////////////////


    function index() {
        $data['view_file'] = 'index';
        $data['module'] = 'front';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function register(){
        $data['email'] = $this->input->post('email');
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['password'] = md5($this->input->post('password'));
        date_default_timezone_set('Asia/Karachi');
        $data['join_date'] = date('Y-m-d H:i');
        $id = $this->insert($data);
        $data['user_id'] = $id;
        if (!empty($id)) {
            $gamers_data['email'] = $data['email'];
            $gamers_data['name'] = $data['name'];
            $gamers_data['phone'] = $data['phone'];
            $gamers_data['user_id'] = $data['user_id'];
            $this->session->set_userdata('gamers_data', $gamers_data);
            redirect(BASE_URL.'account');
        }
        else{
            redirect(BASE_URL);
        }
    }

    function login(){
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $row = $this->get_where_login($email,$password)->row();
        if (!empty($row)) {
            $data['email'] = $row->email;
            $data['name'] = $row->name;
            $data['phone'] = $row->phone;
            $data['user_id'] = $row->id;
            $this->session->set_userdata('gamers_data', $data);
            $this->session->set_flashdata('success','Logged in Succesfully');
            redirect(BASE_URL.'account/lists');
        }
        else{
            $this->session->set_flashdata('error','Invalid username or password');
            redirect(BASE_URL);
        }
    }

    function logout(){
        $this->session->unset_userdata('gamers_data');
        redirect(BASE_URL);
    }


    function validate (){
        $email = $this->input->post('email');
        $query = $this->_get_where_validate($email);
        if ($query->num_rows() > 0) {
            echo '1';
        }
        else {
            echo '0';
        }

    }

    function forgot_password(){
        $data['view_file'] = 'forgot_password';
        $data['module'] = 'front';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function submit_forgot_password(){
        $data['email'] = $this->input->post('email');
        $query = $this->_get_where_validate($data['email']);
        
        if ($query->num_rows() == 1) {
            $data['password'] = $this->get_random_chars(8);
            $email_pass = $this->_get_email_password_for_reset()->result_array();
            $email = $email_pass[0]['email'];
            $password = $email_pass[0]['password'];
        
            $to = $data['email'];
            $subject = "Password Reset";
            $from = $email;
            $email_message = "Password for your account has been reset. Your new password is ".$data['password'];

            //SMTP Code
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.googlemail.com';
            $config['smtp_port'] = '465';
            // $config['smtp_timeout'] = '60';

            $config['smtp_user'] = $email;
            $config['smtp_pass'] = $password;

            $config['charset'] = 'utf-8';
            $config['newline'] = "\r\n";
            $config['mailtype'] = 'html';
            $config['wordwrap'] = TRUE;
            $this->load->library('email',$config);
            $this->email->initialize($config);
            // $this->email->set_mailtype("html");
            $this->email->from($from);
            $this->email->to($to);
            $this->email->subject($subject);
            $this->email->message($email_message);
            // $this->email->set_newline("\r\n");
            $arr_col['email'] = $data['email'];
            $data1['password'] = md5($data['password']);
            $check = $this->_update($arr_col,$data1);
            if ($check == 1) {
                $this->email->send();
            }
            // echo $this->email->print_debugger();
        }
        $data['view_file'] = 'forgot_password_sent';
        $data['module'] = 'front';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }


    function get_random_chars($leng = 8){
    
        $chars = "123456789AaBbCcDdEeFfGgHhJjKkLlMmNnPpQqRrSsTtUuVvWwXxYyZz";
        
        srand((double)microtime()*1000000);
        $i = 0;
        $code = '' ;
        while ($i <= $leng) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $code = $code . $tmp;
            $i++;
        }
        return $code;
    }

    function get_list_password(){
        $data['view_file'] = 'share_link_list_password';
        $data['module'] = 'front';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }

    function get_list(){
        $arr_col['lists.share_link'] = $this->uri->segment(3);
        $arr_col['lists.list_pass'] = $this->input->post('list_pass');
        $data['news'] = $this->_get_list_with_share_link($arr_col);
        $data['view_file'] = 'share_link_list';
        $data['module'] = 'front';
        $data['header_file'] = 'header';
        $data['footer_file'] = 'footer';
        $this->load->module('template');
        $this->template->front($data);
    }


//=================================================
    function insert($data) {
        $this->load->model('mdl_front');
        return $this->mdl_front->insert($data);
    }

    function get_where_login($email,$password) {
        $this->load->model('mdl_front');
        return $this->mdl_front->get_where_login($email,$password);
    }

    function _get_where_validate($email){
        $this->load->model('mdl_front');
        return $this->mdl_front->_get_where_validate($email);
    }

    function _get_email_password_for_reset(){
        $this->load->model('mdl_front');
        return $this->mdl_front->_get_email_password_for_reset();
    }

    function _update($arr_col, $data) {
        $this->load->model('mdl_front');
        return $this->mdl_front->_update($arr_col, $data);
    }

    function _get_list_with_share_link($arr_col){
        $this->load->model('mdl_front');
        return $this->mdl_front->_get_list_with_share_link($arr_col);
    }



//==================================================================
//=====================API Functions================================
//==================================================================


    function login_api(){
        $status = false;
        $message = '';
        $where['email'] = $this->input->post('email');
        $where['password'] = md5($this->input->post('password'));

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $token = $this->get_random_chars(15);
            $data['token'] = $token;
            $this->_update_api_data($where,'players',$data);
            foreach ($login_data as $key => $value) {
                $data['user_id'] = $value['id'];
                $data['email'] = $value['email'];
                $data['name'] = $value['name'];
                $data['phone'] = $value['phone'];
                $data['join_date'] = $value['join_date'];
                $data['token'] = $token;
            }
        }
        if (isset($data) && !empty($data)) {
            $status = true;
            $final_data[] = $data;
            $message = 'Login Succesful';
        }
        else{
            $message = 'Invalid Email or Password';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message,  'data'=>$final_data));
    }

    function register_api(){
        $status = false;
        $message = '';
        $data['email'] = $this->input->post('email');
        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('phone');
        $data['password'] = md5($this->input->post('password'));
        date_default_timezone_set('Asia/Karachi');
        $data['join_date'] = date('Y-m-d H:i');
        $token = $this->get_random_chars(15);
        $data['token'] = $token;
        $id = $this->insert($data);
        $data['user_id'] = $id;
        if (!empty($id)) {
            $status = true;
            $final_data[] = $data;
            $message = 'Registration Succesful';
        }
        else{
            $message = 'Registration unsuccesful';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message,  'data'=>$final_data));
    }

    function logout_api(){
        $status = false;
        $message = '';
        $where['id'] = $this->input->post('user_id');
        $data['token'] = '';
        
        $affected_rows = $this->_update_api_data($where,'players',$data);
        
        if (isset($affected_rows) && !empty($affected_rows) && $affected_rows == 1) {
            $status = true;
            $message = 'Logged Out';
        }
        else{
            $status = false;
            $message = 'Invalid User Id';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message));
    }

    function get_list_api(){
        $status = false;
        $message = '';
        $where['token'] = $this->input->post('token');
        $share_link = $this->input->post('share_link');
        $share_link = explode("/",$share_link);
        $share_link = $share_link[6];
        $password = $this->input->post('password');

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $list = $this->_get_list_data($share_link,$password)->result_array();
            if (isset($list) && !empty($list)) {
                $data['list_name'] = $list[0]['list_name'];
                foreach ($list as $key => $value) {
                    $data1['page_title'] = $value['page_title'];
                    $data1['page_url'] = $value['page_url'];
                    $data['list_items'][] = $data1;
                }
            }
            if (isset($data) && !empty($data)) {
            $status = true;
            $final_data[] = $data;
            $message = 'Succesful';
            }
            else{
                $status = false;
                $message = 'Invalid Share Link or Password';
            }
        }
        else{
            $status = false;
            $message = 'Invalid Token';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message,  'data'=>$final_data));
    }

    function create_list_api(){
        $status = false;
        $message = '';
        $where['token'] = $this->input->post('token');
        $data['player_id'] = $this->input->post('user_id');
        $data['list_name'] = $this->input->post('list_name');
        $data['list_pass'] = $this->input->post('list_pass');
        $data['share_link'] = $this->get_random_chars(15);

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $check = $this->_insert_api_data($data,'lists');
            if (isset($check) && !empty($check)) {
                $data1['share_link'] = BASE_URL.'front/get_list_password/'.$data['share_link'];
                $data1['list_pass'] = $data['list_pass'];
                $data1['list_id'] = $check;
            }
            if (isset($data1) && !empty($data1)) {
                $status = true;
                $final_data[] = $data1;
                $message = 'Succesful';
            }
            else{
                $status = false;
                $message = 'Error';
            }
        }
        else{
            $status = false;
            $message = 'Invalid Token';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message,  'data'=>$final_data));
    }

    function create_list_item_api(){
        $status = false;
        $message = '';
        $where['token'] = $this->input->post('token');
        $data['list_id'] = $this->input->post('list_id');
        $data['page_title'] = $this->input->post('page_title');
        $data['page_url'] = $this->input->post('page_url');

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $check = $this->_insert_api_data($data,'list_items');
            if (isset($check) && !empty($check)) {
                $status = true;
                $message = 'Item Added Succesfully';
            }
            else{
                $status = false;
                $message = 'Error';
            }
        }
        else{
            $status = false;
            $message = 'Invalid Token';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message));
    }

    function delete_list(){
        $status = false;
        $message = '';
        $where['token'] = $this->input->post('token');
        $where1['list_id'] = $this->input->post('list_id');
        $where1['player_id'] = $this->input->post('user_id');

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $check = $this->_delete_api_data($where1,'lists');
            if (isset($check) && !empty($check)) {
                $status = true;
                $message = 'Deleted';
            }
            else{
                $status = false;
                $message = 'Error';
            }
        }
        else{
            $status = false;
            $message = 'Invalid Token';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message));
    }

    function delete_list_item(){
        $status = false;
        $message = '';
        $where['token'] = $this->input->post('token');
        $where1['list_id'] = $this->input->post('list_id');
        $where1['list_item_id'] = $this->input->post('list_item_id');

        $login_data = $this->_get_user_login($where)->result_array();
        if(isset($login_data) && !empty($login_data)){
            $check = $this->_delete_api_data($where1,'list_items');
            if (isset($check) && !empty($check)) {
                $status = true;
                $message = 'Deleted';
            }
            else{
                $status = false;
                $message = 'Error';
            }
        }
        else{
            $status = false;
            $message = 'Invalid Token';
        }
        header('Content-Type: application/json');
        echo json_encode(array('status'=>$status, 'message' => $message));
    }





//===========================================================
//==========================helper function==================
//===========================================================




    function _get_user_login($where){
        $this->load->model('mdl_front');
        return $this->mdl_front->_get_user_login($where);
    }

    function _update_api_data($where,$table,$data){
        $this->load->model('mdl_front');
        return $this->mdl_front->_update_api_data($where,$table,$data);
    }

    function _get_list_data($share_link,$password){
        $this->load->model('mdl_front');
        return $this->mdl_front->_get_list_data($share_link,$password);
    }

    function _insert_api_data($data,$table){
        $this->load->model('mdl_front');
        return $this->mdl_front->_insert_api_data($data,$table);
    }

}
?>