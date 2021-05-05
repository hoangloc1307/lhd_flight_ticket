<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['view'] = 'admin/order';
        $data['title'] = 'Hoá đơn';
        $this->load->view('admin/master_layout', $data);
    }
}
        
    /* End of file  Login.php */