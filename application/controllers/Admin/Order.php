<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'admin/order';
        $data['title'] = 'Hoá đơn';
        $data['orders'] = $this->Database_model->GetRecords('tbl_order', '', 'Order_ID DESC', '', '');

        $this->load->view('admin/master_layout', $data);
    }

    public function UpdateStatus() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('order_id');
            $where = "Order_ID = " . $id;
            if ($this->Database_model->UpdateRecord('tbl_order', $where, 'Status', 1) > 0) {
                echo json_encode("Xác nhận thành công");
            } else {
                echo json_encode("Xác nhận không thành công");
            }
        }
    }
}
        
    /* End of file  Login.php */