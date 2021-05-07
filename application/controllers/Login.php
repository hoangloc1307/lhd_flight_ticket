<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index() {
        $data['view'] = 'login';
        $data['title'] = 'Đăng nhập';
        $this->load->model('Admin/JSON_model');
        $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
        $this->load->view('home/header_footer', $data);
    }

    public function Login() {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $account = $this->Login_model->getAccount($email);
            if (is_null($account) == false) {
                if ($account['Password'] == md5($password)) {
                    $sess_account = [
                        'email' => $email,
                        'role' => $account['Role'],
                        'user_links' => [
                            'Thông tin tài khoản' => base_url() . 'account',
                            'Đăng xuất' => base_url() . 'login/logout'
                        ]
                    ];
                    if ($account['Role'] == 1) {
                        // $sess_account['user_links'] = ['Vào trang quản trị' => base_url() . 'admin'] + $sess_account['user_links'];
                        $sess_account['user_links'] = [
                            'Vào trang quản trị' => base_url() . 'admin',
                            'Đăng xuất' => base_url() . 'login/logout'
                        ];
                    }
                    $this->session->set_userdata($sess_account);
                    echo json_encode("OK");
                } else {
                    echo json_encode("Sai mật khẩu");
                }
            } else {
                echo json_encode("Tài khoản không tồn tại");
            }
        }
    }

    public function Logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function Register() {
        if ($this->input->is_ajax_request()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $phone = $this->input->post('phone');

            $chkaccount = $this->Login_model->getAccount($email);
            if (is_null($chkaccount)) {
                if ($this->Login_model->createAccount($email, $password, $phone) > 0) {
                    echo json_encode("OK");
                }
            } else {
                echo json_encode("Tài khoản đã tồn tại");
            }
        }
    }
}
        
    /* End of file  Login.php */