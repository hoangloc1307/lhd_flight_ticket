<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'admin/statistic';
        $data['title'] = 'Thống kê';
        $data['profit'] = $this->Database_model->StoreProcedures('TongLoiNhuan')[0]['Result'];
        $data['revenue'] = $this->Database_model->StoreProcedures('TongDoanhThu')[0]['Result'];
        $data['number_of_order'] = $this->Database_model->StoreProcedures('TongSoHoaDon')[0]['Result'];
        $data['payment_status_rate'] = $this->Database_model->StoreProcedures('ThongKeTiLeThanhToan');
        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function Filter() {
        if ($this->input->is_ajax_request()) {
            $status = $this->input->post('status');
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $date_end = date('Y-m-d', strtotime($date_end));
            $date_end = date("Y-m-d", strtotime(' +1 day'));
            $data = $this->Database_model->StoreProceduresWithParams('HoaDonTheoNgay', ['DateStart' => $date_start, 'DateEnd' => $date_end, 'STT' => $status]);
            echo json_encode($data);
        }
    }

    public function OrderInDay() {
        if ($this->input->is_ajax_request()) {
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $date_end = date('Y-m-d', strtotime($date_end));
            $date_end = date("Y-m-d", strtotime(' +1 day'));
            $data = $this->Database_model->StoreProceduresWithParams('ThongKeHoaDon', ['DateStart' => $date_start, 'DateEnd' => $date_end]);
            echo json_encode($data);
        }
    }
}
        
    /* End of file  Statistic.php */