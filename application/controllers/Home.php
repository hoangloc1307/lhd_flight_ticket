<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['view'] = 'home/home';
        $data['title'] = 'Trang chủ';

        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Home.php */