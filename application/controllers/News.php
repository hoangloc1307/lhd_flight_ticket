<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/News_model');
    }

    public function view($link = null)
    {
        if (is_null($link)) {
            $data['title'] = 'Bài viết';
            $data['view'] = 'home/news';
            $data['news'] = $this->News_model->getNews();
        } else {
            $new = $this->News_model->getNews($link);
            $data['title'] = $new['Name'];
            $data['view'] = 'home/news_detail';
            $data['new'] = $new;
            $view = $new['View'];
            $this->News_model->update($new['News_ID'], ++$view);
        }
        $this->load->view('home/header_footer', $data, FALSE);
    }
}
        
    /* End of file  News.php */