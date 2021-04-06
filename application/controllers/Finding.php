<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Finding extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['view'] = 'home/finding';
        $data['title'] = 'Tìm chuyến bay';

        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Finding.php */