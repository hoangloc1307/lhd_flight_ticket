<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/JSON_model');
    }
    public function index()
    {
        $data['view'] = 'admin/partner';
        $data['title'] = 'Đối tác';
        $partner = $this->JSON_model->get('Partner');
        $partner = json_decode($partner['Text'], true);
        $data['partners'] = $partner;
        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function Add()
    {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $image = $this->input->post('image');

            // $target_dir = "assets/images/partner/";
            // $target_file = $target_dir . basename($_FILES["image"]["name"]);
            // move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            $partner = $this->JSON_model->get('Partner');
            $partner = json_decode($partner['Text'], true);

            if (is_null($partner)) {
                $partner = [];
            }

            $isExists = false;
            foreach ($partner as $value) {
                if ($value['Name'] == $name) {
                    $isExists = true;
                    break;
                }
            }

            if (!$isExists) {
                $data = [
                    'Name' => $name,
                    'Image' => $image
                ];

                array_push($partner, $data);
                if ($this->JSON_model->edit('Partner', json_encode($partner))) {
                    echo json_encode("Thêm thành công");
                } else {
                    echo json_encode("Thêm thất bại");
                }
            } else {
                echo json_encode("Đã tồn tại đối tác " . $name);
            }
        }
    }

    public function Delete()
    {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $partner = $this->JSON_model->get('Partner');
            $partner = json_decode($partner['Text'], true);
            foreach ($partner as $key => $value) {
                if ($value['Name'] == $name) {
                    unset($partner[$key]);
                    break;
                }
            }
            if ($this->JSON_model->edit('Partner', json_encode($partner))) {
                echo json_encode("Xoá thành công");
            } else {
                echo json_encode("Xoá thất bại");
            }
        }
    }
}
        
    /* End of file  Partner.php */