<?php

defined('BASEPATH') or exit('No direct script access allowed');

class WhyChooseUs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/JSON_model');
    }
    public function index()
    {
        $data['view'] = 'admin/whychooseus';
        $data['title'] = 'Tại sao chọn chúng tôi';
        $data['dulieu'] = json_decode($this->JSON_model->get("WhyChooseUs")['Text'], true);

        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function edit()
    {
        $datas = [];

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $oldfile = $this->input->post('oldfile');

        $target_dir = "assets/images/whychooseus/";
        $image = [];
        for ($i = 0; $i < count($_FILES["image"]["name"]); $i++) {
            $target_file = $target_dir . basename($_FILES["image"]["name"][$i]);
            if (empty($_FILES["image"]["name"][$i])) {
                $image[$i] = $oldfile[$i];
            } else {
                move_uploaded_file($_FILES["image"]["tmp_name"][$i], $target_file);
                $image[$i] = base_url() . $target_file;
            }

            $data = [
                'Title' => $title[$i],
                'Content' => $content[$i],
                'Image' => $image[$i]
            ];
            array_push($datas, $data);
        }

        $datas = json_encode($datas);
        $this->JSON_model->edit("WhyChooseUs", $datas);
        redirect(base_url() . 'admin/whychooseus');
    }

    // public function add()
    // {
    //     $wcu = $this->JSON_model->get("WhyChooseUs");
    //     $datas = json_decode($wcu['Text']);

    //     if (is_null($datas)) {
    //         $datas = [];
    //     }

    //     //Xử lý ảnh
    //     $target_dir = "assets/images/whychooseus/";
    //     $target_file = $target_dir . basename($_FILES["image"]["name"]);
    //     move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    //     $content = $this->input->post('content');
    //     $title = $this->input->post('title');
    //     $image = base_url() . $target_file;

    //     $data = [
    //         "Image" => $image,
    //         "Title" => $title,
    //         "Content" => $content
    //     ];


    //     array_push($datas, $data);
    //     $datas = json_encode($datas);

    //     if ($this->JSON_model->edit("WhyChooseUs", $datas)) {
    //         echo "OK";
    //     } else {
    //         echo "NOT OK";
    //     }
    // }
}
        
    /* End of file  Partner.php */