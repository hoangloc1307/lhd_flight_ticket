<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Database_model');
        $this->load->model('admin/JSON_model');
    }
    public function index()
    {
        if (is_null($this->session->userdata('email'))) {
            redirect(base_url('login'));
        } else {
            if ($this->session->userdata('role') == 1) {
                $data['view'] = 'admin/dashboard';
                $data['title'] = 'Admin';
                $data['news'] = $this->Database_model->GetRecords('tbl_news', '', 'News_ID DESC', 10, 0);
                $data['orders'] = $this->Database_model->GetRecords('tbl_order', '', 'Order_ID DESC', 6, 0);
                $data['number_of_news'] = $this->Database_model->StoreProcedures('TongSoBaiViet')[0]['Result'];
                $data['number_of_customer'] = $this->Database_model->StoreProcedures('TongSoKhachHang')[0]['Result'];
                $data['number_of_order'] = $this->Database_model->StoreProcedures('TongSoHoaDon')[0]['Result'];
                $data['profit'] = $this->Database_model->StoreProcedures('TongLoiNhuan')[0]['Result'];
                $this->load->view('admin/master_layout', $data, FALSE);
            } else {
                redirect(base_url());
            }
        }
    }
}
        
    /* End of file  Admin.php */