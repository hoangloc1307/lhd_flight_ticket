<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Database_model");
    }
    public function index()
    {       
        $data['view'] = 'admin/customer';
        $data['title'] = 'Khách hàng';
        $this->load->view('admin/master_layout', $data, FALSE); 
    }

    public function fetch() {
        if ($this->input->is_ajax_request()) {

            $offset = $this->input->post("offset");
            $data = $this->Database_model->GetRecords("tbl_customer", "", "Customer_ID Desc", 10, $offset);
            echo json_encode($data);
        }
    }

    public function Search() {
        if ($this->input->is_ajax_request()) {
            $keyword = $this->input->post("keyword");
            $this->load->model("Database_model");
            $where = "Name LIKE '" . $keyword . "%' or Name LIKE '%" . $keyword . "%' or Name LIKE '%" . $keyword . "' or Name LIKE '" . $keyword . "'";
            $result = $this->Database_model->GetRecords("tbl_customer", $where, "Name DESC", "", "");
            if (!empty($result)) {
                echo json_encode($result);
            } else {
                echo json_encode("Không tìm thấy kết quả!");
            }
        }
    }
}
        
    /* End of file  Customer.php */
        
                            