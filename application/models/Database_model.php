<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Database_model extends CI_Model {

    public function GetRecords($table, $where = '', $order = '', $limit = '', $offset = 0, $numberofRecords = false) {
        if ($where != '') {
            $this->db->where($where);
        }
        if ($order != '') {
            $this->db->order_by($order);
        }
        if ($limit != '') {
            $this->db->limit($limit, $offset);
        }
        $result = $this->db->get($table);
        if ($numberofRecords == true) {
            return $result->num_rows();
        }
        return $result->result_array();
    }

    public function GetRecord($table, $where = '') {
        if ($where != '') {
            $this->db->where($where);
        }
        $result = $this->db->get($table);
        return $result->row_array();
    }

    public function InsertRecord($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function UpdateRecord($table, $where, $column, $value) {
        $this->db->where($where);
        $this->db->set($column, $value);
        return $this->db->update($table);
    }

    public function UpdateRecordMultiColumn($table, $where, $data) {
        $this->db->where($where);
        $this->db->set($data);
        return $this->db->update($table);
    }
}
                        
/* End of file Database_model.php */