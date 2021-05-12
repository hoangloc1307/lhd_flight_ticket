<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Account_model');
        $this->load->model('Admin/JSON_model');
        $this->load->model('Database_model');
    }
    public function index() {
        $data['view'] = 'home/info';
        $data['title'] = 'Thông tin tài khoản';
        $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);


        //Lấy thông tin tài khoản
        $data['user_info'] = $this->Account_model->GetInfoUser($this->session->userdata('email'));
        //Lấy các hoá đơn đã đặt
        $where = 'Customer_ID = ' . $data['user_info']['Customer_ID'];
        $data['orders'] = $this->Database_model->GetRecords('tbl_order', $where, 'Order_ID DESC', '', '');

        $this->load->view('home/header_footer', $data);
    }

    public function ChangePassword() {
        if ($this->input->is_ajax_request()) {
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            $where = "Email = '" . $this->session->userdata("email") . "'";
            $account = $this->Database_model->GetRecord('tbl_account', $where);
            if ($account['Password'] == md5($old_password)) {
                if ($this->Database_model->UpdateRecord('tbl_account', $where, 'Password', md5($new_password))) {
                    echo json_encode("Đổi mật khẩu thành công");
                } else {
                    echo json_encode("Đổi mật khẩu thất bại");
                }
            } else {
                echo json_encode("Mật khẩu cũ không chính xác");
            }
        }
    }

    function SendForgetPasswordMail($code, $to) {
        $subject = "Mật khẩu đăng nhập LHD";
        $from = 'LHD Flight Ticket';

        $message = "<!DOCTYPE html><html lang='en' style='font-family: Arial, Helvetica, sans-serif;font-size: 14px;'><head></head><body style='margin: 0;padding: 0;box-sizing: border-box;'>";
        $message .= "<p>Mật khẩu mới của bạn là: <b>" . $code . "</b></p>";
        $message .= "<p style='color: red;'>Vui lòng đăng nhập và đổi mật khẩu ngay lập tức. <a href='" . base_url('login') . "'>Đăng nhập</a><p>";
        $message .= "</body></html>";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'lhdflightticket@gmail.com',
            'smtp_pass' => 'P@ss123456',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function ForgetPassword() {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $code = create_oder_code() . create_oder_code();
            $this->SendForgetPasswordMail($code, $email);
            $where = "Email = '" . $email . "'";
            if ($this->Database_model->UpdateRecord('tbl_account', $where, 'Password', md5($code))) {
                echo json_encode("Vui lòng kiểm tra email để lấy mật khẩu mới");
            } else {
                echo json_encode("Khôi phục mật khẩu thất bại");
            }
        } else {
            $data['view'] = 'forget_password';
            $data['title'] = 'Quên mật khẩu';
            $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
            $this->load->view('home/header_footer', $data);
        }
    }

    public function Verification() {
        $data['view'] = 'verification';
        $this->load->view('home/header_footer', $data);
    }
}
        
    /* End of file  Account.php */