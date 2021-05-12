<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin/JSON_model');
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'home/home';
        $data['title'] = 'Trang chủ';
        if (is_null($this->session->userdata('email'))) {
            $sess_account = [
                'user_links' => [
                    'Đăng nhập / Đăng ký' => base_url() . 'login'
                ]
            ];
            $this->session->set_userdata($sess_account);
        }


        $data['whychooseus'] = json_decode($this->JSON_model->get('WhyChooseUs')['Text'], true);
        $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
        $data['partners'] = json_decode($this->JSON_model->get('Partner')['Text'], true);
        $data['hot_places'] = $this->Database_model->GetRecords('tbl_news', "Category = '28'", 'News_ID DESC', 6);

        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Home.php */