<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if (is_null($this->session->userdata('username'))) {
            redirect(base_url() . 'login');
        } else {
            if ($this->session->userdata('role') == 1) {
                $data['view'] = 'admin/dashboard';
                $data['title'] = 'Admin';
                $this->load->view('admin/master_layout', $data, FALSE);
            } else {
                redirect(base_url());
            }
        }
    }
}
        
    /* End of file  Admin.php */