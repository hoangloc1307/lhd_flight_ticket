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

    public function Edit()
    {
        $datas = [];

        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $image = $this->input->post('image');

        for ($i = 0; $i < 4; $i++) {
            $data = [
                'Title' => $title[$i],
                'Content' => $content[$i],
                'Image' => $image[$i]
            ];
            array_push($datas, $data);
        }

        $datas = json_encode($datas);
        $this->JSON_model->edit("WhyChooseUs", $datas);
        redirect(base_url('admin/whychooseus'));
    }
}
        
    /* End of file  Partner.php */