<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/JSON_model');
    }
    public function index() {
        $data['view'] = 'admin/payment';
        $data['title'] = 'Phương thức thanh toán';
        $this->load->view('admin/master_layout', $data, FALSE);
    }

}
        
    /* End of file  Partner.php */