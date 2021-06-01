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
            $status = $this->input->post('status');
            $date_start = $this->input->post('date_start');
            $date_end = $this->input->post('date_end');
            $date_end = date("Y-m-d", strtotime($date_end . ' +1 day'));

            $line_data = $this->Database_model->StoreProceduresWithParams('ThongKeHoaDon', ['DateStart' => $date_start, 'DateEnd' => $date_end, 'STT' => $status]);
            $date1 = new DateTime($date_start);
            $date2 = new DateTime($date_end);
            $diff = $date1->diff($date2);

            $arrs = [];
            for ($i = 0; $i < $diff->days; $i++) {
                $start = date("d/m/Y", strtotime($date_start . " +$i day"));
                $arr = [];
                for ($j = 0; $j < count($line_data); $j++) {
                    if ($start == $line_data[$j]['Date']) {
                        array_push($arr, $start);
                        array_push($arr, (int)$line_data[$j]['Total']);
                        break;
                    }
                    if ($j == count($line_data) - 1) {
                        if ($start == $line_data[$j]['Date']) {
                            array_push($arr, $start);
                            array_push($arr, (int)$line_data[$j]['Total']);
                        } else {
                            array_push($arr, $start);
                            array_push($arr, 0);
                        }
                    }
                }
                array_push($arrs, $arr);
            }
            $data['line_data'] = $arrs;

            $pie_data = $this->Database_model->StoreProceduresWithParams('ThongKeTiLeThanhToan', ['DateStart' => $date_start, 'DateEnd' => $date_end]);
            $data['pie_data'] = $pie_data;

            $bar_data = $this->Database_model->StoreProceduresWithParams('ThongKeDoanhThu', ['DateStart' => $date_start, 'DateEnd' => $date_end]);
            $data['bar_data'] = $bar_data;

            echo json_encode($data);
        }
    }
}
        
    /* End of file  Statistic.php */