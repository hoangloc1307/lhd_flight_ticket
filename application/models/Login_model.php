<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getAccount($email) {
        $this->db->where('Email', $email);
        $data = $this->db->get('tbl_account');
        return $data->row_array();
    }

    public function createAccount($email, $password, $phone) {
        $tbl_account = [
            'Email' => $email,
            'Password' => md5($password),
            'Role' => 2
        ];
        $this->db->insert('tbl_account', $tbl_account);
        if ($this->db->insert_id()) {
            $tbl_customer = [
                'Email' => $email,
                'Phone' => $phone
            ];
        }
        $this->db->insert('tbl_customer', $tbl_customer);
        return $this->db->insert_id();
    }
}
                        
/* End of file Login_model.php */