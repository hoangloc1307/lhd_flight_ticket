<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    function BookingSuccess($order_code) {
        $subject = "Đặt vé thành công";
        $message = "Bạn đã đặt thành công đơn hàng " . $order_code;
        $from = 'FLD Flight Ticket';
        $to = 'hoangloc13070@gmail.com';

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hoangloc1307@gmail.com', // change it to yours
            'smtp_pass' => 'Hoangloc137*', // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($from); // change it to yours
        $this->email->to($to); // change it to yours
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }
}
        
    /* End of file  Mail.php */