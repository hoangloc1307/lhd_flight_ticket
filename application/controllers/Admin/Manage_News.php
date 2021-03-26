<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manage_News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/News_model');
    }
    public function index($add = NULL)
    {
        //Load trang tất cả tin tức hoặc trang thêm mới tin tức
        if (is_null($add)) {
            $data['title'] = 'Bài viết';
            $data['view'] = 'admin/news';
            $data['news'] = $this->News_model->getNews();
            $this->load->view('admin/master_layout', $data, FALSE);
        } else {
            $data['title'] = 'Thêm bài viết';
            $data['view'] = 'admin/news_add';
            $this->load->view('admin/master_layout', $data, FALSE);
        }
    }

    public function view($link = NULL)
    {
        $data['news_item'] = $this->News_model->getNews($link);

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $data['view'] = 'admin/news';
        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function add()
    {
        $target_dir = "assets/images/news/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $image = base_url() . $target_file;
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $content = $this->input->post('content');
        $linkcustom = $this->input->post('linkcustom');

        $this->load->model('Admin/News_model');
        $result = $this->News_model->addNews($name, $description, $content, $image, $linkcustom);
        if ($result > 0) {
            echo "Thành công";
        } else {
            echo "Thất bại";
        }
    }
}
        
    /* End of file  News.php */