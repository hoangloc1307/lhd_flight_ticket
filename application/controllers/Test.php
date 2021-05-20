<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {

        $luggage['VJ'] = [
            '15kg' => 140000,
            '20kg' => 160000,
            '25kg' => 220000,
            '30kg' => 320000,
            '35kg' => 370000,
            '40kg' => 420000
        ];
        $luggage['QH'] = [
            '15kg' => 155000,
            '20kg' => 180000,
            '25kg' => 230000,
            '30kg' => 330000,
            '35kg' => 380000,
            '40kg' => 480000
        ];
        $luggage['VN'] = [
            '15kg' => 270000,
            '20kg' => 330000,
            '25kg' => 440000,
            '30kg' => 550000,
            '35kg' => 650000,
            '40kg' => 750000
        ];
        foreach ($luggage as $key => $value) {
            foreach ($value as $k => $v) {
                var_dump($k);
                var_dump($v);
            }
        }
    }
}
        
    /* End of file  Test.php */