<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Statistic extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'admin/statistic';
        $data['title'] = 'Thống kê';

        $this->load->view('admin/master_layout', $data, FALSE);
    }
}
        
    /* End of file  Statistic.php */