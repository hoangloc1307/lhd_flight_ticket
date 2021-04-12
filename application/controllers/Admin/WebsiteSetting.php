<?php

defined('BASEPATH') or exit('No direct script access allowed');

class WebsiteSetting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/JSON_model');
    }
    public function index()
    {
        $data['view'] = 'admin/websitesetting';
        $data['title'] = 'Cài đặt website';

        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function Fetch()
    {
        if ($this->input->is_ajax_request()) {
            echo $this->JSON_model->get("WebsiteSetting")['Text'];
        }
    }

    public function Update()
    {
        if ($this->input->is_ajax_request()) {
            $address = $this->input->post('address');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            $datas = [
                'Address' => $address,
                'Email' => $email,
                'Phone' => $phone,
            ];
            $datas = json_encode($datas);

            if ($this->JSON_model->edit('WebsiteSetting', $datas)) {
                $data['response'] = 'success';
                $data['message'] = 'Cập nhật thành công';
            } else {
                $data['response'] = 'error';
                $data['message'] = 'Cập nhật thất bại';
            }
            echo json_encode($data);
        }
    }
}
        
    /* End of file  WebsiteSetting.php */