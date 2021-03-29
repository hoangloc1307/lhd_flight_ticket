<?php

defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
{
    public function getNews($link = null)
    {
        if (is_null($link)) {
            $query = $this->db->get('tbl_news');
            return $query->result_array();
        }

        $where = "LinkCustom = '" . $link . "' OR LinkDefault = '" . $link . "'";
        $this->db->where($where);
        $query = $this->db->get('tbl_news');
        return $query->row_array();
    }

    public function addNews($name, $description, $content, $image, $linkcustom)
    {
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
            'View' => 0
        ];

        $this->db->insert('tbl_news', $data);
        return $this->db->insert_id();
    }

    public function update($id, $view)
    {
        $this->db->where('News_ID', $id);
        $data = ['View' => $view];
        $this->db->update('tbl_news', $data);
    }

    public function getNewsCategory($id = NULL)
    {
        if (is_null($id)) {
            $query = $this->db->get('tbl_news_category');
            return $query->result_array();
        }

        $this->db->where($id, 'News_Category_ID ');
        $query = $this->db->get('tbl_news_category');
        return $query->row_array();
    }
}
                        
/* End of file News_model.php */