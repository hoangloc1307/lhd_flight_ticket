<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $subject = "Đặt vé thành công";

        $message = "TEST";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'flightticketlhd@gmail.com',
            'smtp_pass' => '{!P@ss123!}',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from('flightticketlhd@gmail.com', 'LHD Flight Ticket');
        $this->email->to('hoangloc1307@gmail.com');
        $this->email->subject($subject);
        $this->email->message($message);
        if (!$this->email->send()) {
            show_error($this->email->print_debugger());
        } else {
            echo "True";
        }
    }
}
        
    /* End of file  Mail.php */