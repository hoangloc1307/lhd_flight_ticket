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

    public function Add() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $content = $this->input->post('content');

            $payment_method = $this->JSON_model->get('PaymentMethod');
            $payment_method = json_decode($payment_method['Text'], true);
            // if($payment_method)
            if (is_null($payment_method)) {
                $payment_method = [];
            }

            $isExists = false;
            foreach ($payment_method as $value) {
                if ($value['Name'] == $name) {
                    $isExists = true;
                    break;
                }
            }

            if (!$isExists) {
                $data = [
                    'Name' => $name,
                    'Content' => $content
                ];

                array_push($payment_method, $data);
                if ($this->JSON_model->edit('PaymentMethod', json_encode($payment_method))) {
                    echo json_encode("Thêm thành công");
                } else {
                    echo json_encode("Thêm thất bại");
                }
            } else {
                echo json_encode("Đã tồn tại phương thức " . $name);
            }
        }
    }

    public function Fetch() {
        $payment_method = $this->JSON_model->get('PaymentMethod');
        $payment_method = json_decode($payment_method['Text'], true);
        echo json_encode($payment_method);
    }

    public function Delete() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $payment_method = $this->JSON_model->get('PaymentMethod');
            $payment_method = json_decode($payment_method['Text'], true);
            foreach ($payment_method as $key => $value) {
                if ($value['Name'] == $name) {
                    unset($payment_method[$key]);
                    break;
                }
            }
            if ($this->JSON_model->edit('PaymentMethod', json_encode($payment_method))) {
                echo json_encode("Xoá thành công");
            } else {
                echo json_encode("Xoá thất bại");
            }
        }
    }

    public function Update() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $content = $this->input->post('content');
            $payment_method = $this->JSON_model->get('PaymentMethod');
            $payment_method = json_decode($payment_method['Text'], true);
            foreach ($payment_method as $key => $value) {
                if ($value['Name'] == $name) {
                    $payment_method[$key]['Content'] = $content;
                    break;
                }
            }
            if ($this->JSON_model->edit('PaymentMethod', json_encode($payment_method))) {
                echo json_encode("Sửa thành công");
            } else {
                echo json_encode("Sửa thất bại");
            }
        }
    }
}
        
    /* End of file  Partner.php */