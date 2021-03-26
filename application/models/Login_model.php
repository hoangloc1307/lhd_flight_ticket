<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function getAccount($username)
    {
        $this->db->where('username', $username);
        $data = $this->db->get('tbl_account');
        return $data->row_array();
    }

    public function createAccount($username, $password, $email, $phone)
    {
        $tbl_account = [
            'Username' => $username,
            'Password' => $password,
            'Role' => 2
        ];

        $this->db->insert('tbl_account', $tbl_account);
        $account_id = $this->db->insert_id();

        $tbl_customer = [
            'Email' => $email,
            'Phone' => $phone,
            'Account_ID' => $account_id
        ];

        $this->db->insert('tbl_customer', $tbl_customer);
        return $this->db->insert_id();
    }
}
                        
/* End of file Login_model.php */