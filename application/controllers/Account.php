<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['view'] = 'home/info';
        $data['title'] = 'Thông tin tài khoản';
        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Account.php */