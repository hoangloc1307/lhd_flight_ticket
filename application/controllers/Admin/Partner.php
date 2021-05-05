<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Partner extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $data['view'] = 'admin/partner';
        $data['title'] = 'Đối tác';

        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function Add() {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            $image = $this->input->post('image');
            echo json_encode($name . ' - ' . $image);
        }
    }
}
        
    /* End of file  Partner.php */