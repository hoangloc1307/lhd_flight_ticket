<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Manage_News extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/News_model');
    }


    /*-------------------------------------------------------------------------------*/
    /*----------------------------------- BÀI VIẾT ----------------------------------*/
    /*-------------------------------------------------------------------------------*/

    public function Index()
    {
        $data['title'] = 'Bài viết';
        $data['view'] = 'admin/news';
        $this->load->view('admin/master_layout', $data, FALSE);
    }

    public function Fetch()
    {
        echo json_encode($this->News_model->GetNewsWithCategory());
    }

    public function Add()
    {
        if (isset($_POST['submit'])) {
            $target_dir = "assets/images/news/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

            $image = $target_file;
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $content = $this->input->post('content');
            $linkcustom = $this->input->post('linkcustom');
            $category = $this->input->post('category');

            $this->load->model('Admin/News_model');
            $result = $this->News_model->AddNews($name, $description, $content, $image, $linkcustom, $category);
            if ($result > 0) {
                $this->session->set_tempdata('add_alert', '<p class="success">Thêm thành công</p>', 1);
                redirect(base_url() . 'admin/news');
            } else {
                $this->session->set_tempdata('add_alert', '<p class="error">Thêm thất bại</p>', 1);
                redirect(base_url() . 'admin/news');
            }
        } else {
            $data['category'] = $this->News_model->GetNewsCategory();
            $data['view'] = 'admin/news_add';
            $this->load->view('admin/master_layout', $data, FALSE);
        }
    }

    public function Delete()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            if ($this->News_model->DeleteNews($id)) {
                $data['response'] = "success";
                $data['message'] = "Xoá thành công";
            } else {
                $data['response'] = "error";
                $data['message'] = "Xoá thất bại";
            }
        }
        echo json_encode($data);
    }



    /*-------------------------------------------------------------------------------*/
    /*------------------------------ DANH MỤC BÀI VIẾT ------------------------------*/
    /*-------------------------------------------------------------------------------*/

    public function Category()
    {
        $data['view'] = 'admin/category';
        $data['title'] = 'Danh mục bài viết';
        $this->load->view('admin/master_layout', $data, false);
    }


    public function FetchCategory()
    {
        if ($this->input->is_ajax_request()) {
            $categories = $this->News_model->GetNewsCategory();
            echo json_encode($categories);
        }
    }

    public function AddCategory()
    {
        if ($this->input->is_ajax_request()) {
            $name = $this->input->post('name');
            if ($this->News_model->AddNewsCategory($name)) {
                $data['response'] = "success";
                $data['message'] = "Thêm thành công";
            } else {
                $data['response'] = "error";
                $data['message'] = "Thêm thất bại";
            }
        }
        echo json_encode($data);
    }

    public function DeleteCategory()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            if ($this->News_model->DeleteNewsCategory($id)) {
                $data['response'] = "success";
                $data['message'] = "Xoá thành công";
            } else {
                $data['response'] = "error";
                $data['nessage'] = "Xoá thất bại";
            }
        }
        echo json_encode($data);
    }

    public function EditCategory()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');

            if ($category = $this->News_model->GetNewsCategoryByID($id)) {
                $data['response'] = "success";
                $data['category'] = $category;
            } else {
                $data['response'] = "error";
            }
        }
        echo json_encode($data);
    }

    public function UpdateCategory()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('id');
            $name = $this->input->post('name');

            if ($category = $this->News_model->EditNewsCategory($id, $name)) {
                $data['response'] = "success";
                $data['message'] = 'Sửa thành công';
            } else {
                $data['response'] = "error";
                $data['message'] = 'Sửa thất bại';
            }
        }
        echo json_encode($data);
    }
}
        
    /* End of file  News.php */