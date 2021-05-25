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
        if (!is_null($this->session->userdata('email'))) {
            $data['view'] = 'home/info';
            $data['title'] = 'Thông tin tài khoản';
            $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);


            //Lấy thông tin tài khoản
            $data['user_info'] = $this->Account_model->GetInfoUser($this->session->userdata('email'));
            //Lấy các hoá đơn đã đặt
            $where = 'Customer_ID = ' . $data['user_info']['Customer_ID'];
            $data['orders'] = $this->Database_model->GetRecords('tbl_order', $where, 'Order_ID DESC', '', '');

            $this->load->view('home/header_footer', $data);
        } else {
            redirect(base_url("login"));
        }
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
        $subject = "Mã xác thực quên mật khẩu";

        $message = "<!DOCTYPE html><html lang='en' style='font-family: Arial, Helvetica, sans-serif;font-size: 14px;'><head></head><body style='margin: 0;padding: 0;box-sizing: border-box;'>";
        $message .= "<p>Mã xác thực của bạn là: <b>" . $code . "</b></p>";
        $message .= "</body></html>";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'lhdflightticket@gmail.com',
            'smtp_pass' => 'P@ss123456',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from('lhdflightticket@gmai.com', 'LHD Flight Ticket');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function ForgetPassword() {
        if (isset($_POST['submit-button'])) {
            $code = create_oder_code();
            $email = $this->input->post('email');

            $where = "Email = '" . $email . "'";
            $account = $this->Database_model->GetRecord('tbl_account', $where);

            if (!is_null($account)) {
                $tempdata = [
                    'email_forget' => $email,
                    'code' => $code
                ];
                $this->session->set_tempdata($tempdata, NULL, 300);
                $this->SendForgetPasswordMail($code, $email);
                $data['view'] = 'verification';
                $data['title'] = 'Nhập mã xác thực';
            } else {
                $this->session->set_tempdata('alert', 'Email không tồn tại', 3);
                $data['view'] = 'forget_password';
                $data['title'] = 'Quên mật khẩu';
            }
            $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
            $this->load->view('home/header_footer', $data);
        } else {
            $data['view'] = 'forget_password';
            $data['title'] = 'Quên mật khẩu';
            $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
            $this->load->view('home/header_footer', $data);
        }
    }

    public function RestorePassword() {
        if ($this->input->is_ajax_request()) {
            $email = $this->session->tempdata('email_forget');
            $password = $this->input->post('password');

            $where = "Email = '" . $email . "'";
            if ($this->Database_model->UpdateRecord('tbl_account', $where, 'Password', md5($password))) {
                echo json_encode("Khôi phục mật khẩu thành công");
            } else {
                echo json_encode("Khôi phục mật khẩu thất bại");
            }
        }
    }
}
        
    /* End of file  Account.php */