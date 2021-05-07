<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->model('Admin/JSON_model');
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'home/info';
        $data['title'] = 'Thông tin tài khoản';
        $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);


        //Lấy thông tin tài khoản
        $data['user_info'] = $this->Account_model->GetInfoUser($this->session->userdata('email'));
        //Lấy các hoá đơn đã đặt
        $where = 'Customer_ID = ' . $data['user_info']['Customer_ID'];
        $data['orders'] = $this->Database_model->GetRecords('tbl_order', $where, 'Order_ID DESC', '', '');

        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Account.php */