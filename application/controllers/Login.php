<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    }
    public function index()
    {
        $data['view'] = 'login';
        $data['title'] = 'Đăng nhập';
        $this->load->view('home/header_footer', $data);
    }

    public function Login()
    {
        //Lấy dữ liệu người dùng nhập vào
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //Lấy dữ liệu account từ database
        $account = $this->Login_model->getAccount($username);

        //Kiểm tra đăng nhập
        if (is_null($account) == false) {
            if ($account['Password'] == $password) {
                //Khởi tạo session
                $sess_account = [
                    'username' => $username,
                    'role' => $account['Role'],
                    'user_links' => [
                        'Thông tin tài khoản' => '#',
                        'Đăng xuất' => base_url() . 'login/logout'
                    ]
                ];

                if ($account['Role'] == 1) {
                    $sess_account['user_links'] = ['Vào trang quản trị' => base_url() . 'admin'] + $sess_account['user_links'];
                }

                $this->session->set_userdata($sess_account);
                redirect(base_url());
            } else {
                $data['view'] = 'login';
                $data['title'] = 'Đăng nhập';
                $data['error_login'] = "Sai mật khẩu";
                $this->load->view('home/header_footer', $data, false);
            }
        } else {
            $data['view'] = 'login';
            $data['title'] = 'Đăng nhập';
            $data['error_login'] = "Tài khoản không tồn tại";
            $this->load->view('home/header_footer', $data, false);
        }
    }

    public function Logout()
    {
        //Huỷ session
        $this->session->sess_destroy();
        //Chuyển về trang chủ
        redirect(base_url());
    }

    public function Register()
    {
        //Lấy dữ liệu người dùng nhập vào
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cfpassword = $this->input->post('cfpassword');
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');

        //Kiểm tra xem đã tồn tại username đó chưa
        $chkaccount = $this->Login_model->getAccount($username);
        if (is_null($chkaccount)) {
            if ($password === $cfpassword) {
                if ($this->Login_model->createAccount($username, $password, $email, $phone) > 0) {
                    $data['error_register'] = 'Đăng ký thành công';
                    $data['active'] = 1;
                    $data['view'] = 'login';
                    $data['title'] = 'Đăng ký';
                    $this->load->view('home/header_footer', $data);
                }
            } else {
                $data['error_register'] = 'Xác nhận mật khẩu không đúng';
                $data['active'] = 1;
                $data['view'] = 'login';
                $data['title'] = 'Đăng ký';
                $this->load->view('home/header_footer', $data);
            }
        } else {
            $data['error_register'] = 'Tài khoản đã tồn tại';
            $data['active'] = 1;
            $data['view'] = 'login';
            $data['title'] = 'Đăng ký';
            $this->load->view('home/header_footer', $data);
        }
    }
}
        
    /* End of file  Login.php */