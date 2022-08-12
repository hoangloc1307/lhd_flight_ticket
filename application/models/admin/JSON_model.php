<?php

defined('BASEPATH') or exit('No direct script access allowed');

class JSON_model extends CI_Model
{
    public function get($name)
    {
        $this->db->where('Name', $name);
        $data = $this->db->get('tbl_json');
        return $data->row_array();
    }
    public function edit($name, $text)
    {
        $data = [
            "Name" => $name,
            "Text" => $text
        ];
        $this->db->where('Name', $name);
        return $this->db->update('tbl_json', $data);
    }
}
                        
/* End of file JSON_model.php */