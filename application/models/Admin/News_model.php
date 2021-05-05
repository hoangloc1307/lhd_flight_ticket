<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model {

    /* Hàm lấy bài viết:
    1 - Trả về tất cả bài viết nếu không chỉ định $link.
    2 - Trả về bài viết với link được chỉ định nếu không chỉ định $category.
    3 - Trả về danh sách các bài viết có cùng danh mục nếu cả hai biến được chỉ định.
    */
    public function GetNews($link = null, $category = null, $limit = null) {
        if (is_null($link)) {
            if (!is_null($limit)) {
                $this->db->limit($limit, 0);
            }
            $query = $this->db->get('tbl_news');
            return $query->result_array();
        } else {
            if (is_null($category)) {
                $where = "LinkCustom = '" . $link . "' OR LinkDefault = '" . $link . "'";
                $this->db->where($where);
                $query = $this->db->get('tbl_news');
                return $query->row_array();
            } else {
                $where = "Category = '" . $category . "' AND LinkDefault <> '" . $link . "' AND LinkCustom <> '" . $link . "'";
                $this->db->where($where);
                $this->db->order_by('News_ID', 'DESC');
                if (!is_null($limit)) {
                    $this->db->limit($limit, 0);
                }
                $query = $this->db->get('tbl_news');
                return $query->result_array();
            }
        }
    }

    public function GetNewsWithCategory($limit = null, $offset = null) {
        $this->db->select('News_ID, tbl_news.Name, Image, Date, View, Category, tbl_news_category.Name as Category');
        $this->db->from('tbl_news');
        $this->db->join('tbl_news_category', 'tbl_news_category.News_Category_ID = tbl_news.Category', 'left');
        if (!(is_null($limit) && is_null($offset))) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    //Hàm thêm bài viết mới.
    public function AddNews($name, $description, $content, $image, $linkcustom, $category) {
        date_default_timezone_set('Etc/GMT+5');
        $datetime = date("Y-m-d h:i:s");

        $data = [
            'Name' => $name,
            'Description' => $description,
            'Content' => $content,
            'Image' => $image,
            'Date' => $datetime,
            'LinkDefault' =>  vietdecode($name),
            'LinkCustom' => $linkcustom,
            'View' => 0,
            'Category' => $category
        ];

        $this->db->insert('tbl_news', $data);
        return $this->db->insert_id();
    }

    //Hàm cập nhật lượt xem bài viết.
    public function UpdateView($id, $view) {
        $this->db->where('News_ID', $id);
        $data = ['View' => $view];
        $this->db->update('tbl_news', $data);
    }

    /*Hàm lấy danh mục bài viết
    1 - Trả về tát cả danh mục nếu không chỉ định $link.
    2 - Trả về danh mục có link được chỉ định nếu chỉ định $link.
    */
    public function GetNewsCategory($link = NULL) {
        if (is_null($link)) {
            $query = $this->db->get('tbl_news_category');
            return $query->result_array();
        }

        $this->db->where('Link', $link);
        $query = $this->db->get('tbl_news_category');
        return $query->row_array();
    }

    public function DeleteNews($id) {
        $this->db->where('News_ID', $id);
        return $this->db->delete('tbl_news');
    }

    public function AddNewsCategory($name) {
        $data = [
            'Name' => $name,
            'Link' => vietdecode($name)
        ];
        $this->db->insert('tbl_news_category', $data);
        return $this->db->insert_id();
    }

    public function DeleteNewsCategory($id) {
        $this->db->where('News_Category_ID', $id);
        return $this->db->delete('tbl_news_category');
    }

    public function GetNewsCategoryByID($id) {
        $this->db->where('News_Category_ID', $id);
        $query = $this->db->get('tbl_news_category');
        return $query->row_array();
    }

    public function EditNewsCategory($id, $name) {
        $data = [
            'Name' => $name,
            'Link' => vietdecode($name)
        ];
        $this->db->where('News_Category_ID', $id);
        return $this->db->update('tbl_news_category', $data);
    }

    public function TotalNews() {
        $query = $this->db->get('tbl_news');
        return $query->num_rows();
    }
} /* End of file News_model.php */