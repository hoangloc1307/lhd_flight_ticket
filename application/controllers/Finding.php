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
        $ftype = $this->input->post('ftype');
        $forigin = $this->input->post('forigin');
        $fdestination = $this->input->post('fdestination');
        $fdepartment = $this->input->post('fdepartment');
        $freturn = $this->input->post('freturn');
        $fadult = $this->input->post('fadult');
        $fchildren = $this->input->post('fchildren');
        $finfants = $this->input->post('finfants');

        $data['fdata'] = [
            'type' => $ftype,
            'origin' => $forigin,
            'destination' => $fdestination,
            'department' => $fdepartment,
            'return' => $freturn,
            'adult' => $fadult,
            'children' => $fchildren,
            'infants' => $finfants
        ];
        $data['view'] = 'home/finding';
        $data['title'] = 'Tìm chuyến bay';

        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Finding.php */