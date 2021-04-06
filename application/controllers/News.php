<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/News_model');
    }

    public function View($link = null)
    {
        //Nếu không chỉ định link sẽ hiển thị tất cả bài viết.
        if (is_null($link)) {
            $data['title'] = 'Bài viết';
            $data['view'] = 'home/news';
            $data['news'] = $this->News_model->GetNews(); //Lấy tất cả bài viết.
            $data['news_category'] = $this->News_model->GetNewsCategory();
        } else {
            //Lấy danh mục với link chỉ định.
            $news_category = $this->News_model->GetNewsCategory($link);

            //Không có danh mục nào trùng với link chỉ định thì tìm bài viết.
            if (is_null($news_category)) {
                //Lấy bài viết trùng với link chỉ định.
                $news = $this->News_model->GetNews($link);
                //Nếu link chỉ định không trùng với link của bài viết nào thì hiển thị trang 404.
                if (is_null($news)) {
                    show_404();
                }
                //Lấy bài viết liên quan.
                $id_category = $news['Category'];
                $related_news = $this->News_model->GetNews($link, $id_category);

                $data['title'] = $news['Name'];
                $data['view'] = 'home/news_detail';
                $data['news'] = $news;
                $data['related_news'] = $related_news;
                //Cập nhật lượt xem bài viết.
                $view = $news['View'];
                $this->News_model->UpdateView($news['News_ID'], ++$view);
            } else {
                //Lấy bài viết có danh mục trùng với danh mục đang chọn.
                $news = $this->News_model->GetNews($link, $news_category['News_Category_ID']);
                $data['title'] = $news_category['Name'];
                $data['view'] = 'home/news_category';
                $data['news'] = $news;
            }
        }

        $this->load->view('home/header_footer', $data, FALSE);
    }
}
        
    /* End of file  News.php */