<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->output->set_status_header('404');

        // Make sure you actually have some view file named 404.php
        $this->load->view('404');
    }
}
        
    /* End of file  Error404.php */