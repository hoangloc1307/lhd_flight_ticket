<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account_model extends CI_Model {

    public function GetInfoUser($email) {
        $this->db->select('Customer_ID ,Name, Phone, Address, tbl_customer.Email');
        $this->db->from('tbl_customer');
        $this->db->join('tbl_account', 'tbl_account.Email = tbl_customer.Email', 'inner');
        $this->db->where('tbl_customer.Email', $email);
        $query = $this->db->get();
        return $query->row_array();
    }
}
                        
/* End of file Account_model.php */