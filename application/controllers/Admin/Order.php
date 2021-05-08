<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Database_model');
    }
    public function view($order_id = null) {
        if (is_null($order_id)) {
            $data['view'] = 'admin/order';
            $data['title'] = 'Hoá đơn';
            $data['orders'] = $this->Database_model->GetRecords('tbl_order', '', 'Order_ID DESC', '', '');
        } else {
            $data['view'] = 'admin/order_detail';
            $data['title'] = 'Chi tiết hoá đơn';
            $where = "Order_ID = '" . $order_id . "'";
            $data['order'] = $this->Database_model->GetRecord('tbl_order', $where);
        }

        $this->load->view('admin/master_layout', $data);
    }

    function SendBookingSuccessMail($order_code, $order, $to) {
        $subject = "Đặt vé thành công";
        $from = 'FLD Flight Ticket';

        $message = "<!DOCTYPE html><html lang='en' style='font-family: Arial, Helvetica, sans-serif;font-size: 14px;'><head></head><body style='margin: 0;padding: 0;box-sizing: border-box;'>";
        $message .= "<section style='background: #f9f9f9;padding: 30px 0;'>";
        $message .= "<div style='max-width: 480px;margin: 0 auto;background: #fff;border-radius: 6px;'>";
        $message .= "<div style='padding: 24px;background: #17699a;font-size: 24px;color: #fff;border-radius: 6px 6px 0 0;'>Cảm ơn bạn đã đặt vé</div>";
        $message .= "<div style='padding: 12px;color: #777;'>";
        $message .= "<div class='greeting'>";
        $message .= "<p>" . $order['contact_name'] . "</p>";
        $message .= "<p>Đơn hàng " . $order_code . " đã được đặt thành công và chúng tôi đang xử lý</p>";
        $message .= "</div>";
        $message .= "<div class='order-detail'>";
        $message .= "<h4 style='color: #17699a;font-size: 18px;'>[Đơn hàng] <span>" . $order_code . "</span> <span>" . $order['booking_datetime'] . "</span></h4>";
        $message .= "<table style='width: 100%;text-align: left;border: 1px solid #ccc;line-height: 1.6;'><tbody>";
        $message .= "<tr><th style='padding: 6px;'>Loại vé</th><td style='padding: 6px;'>" . ($order['type'] == 'oneway' ? 'Một chiều' : 'Khứ hồi') . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Điểm đi</th><td style='padding: 6px;'>" . $order['origin'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Điểm đến</th><td style='padding: 6px;'>" . $order['destination'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Ngày khởi hành</th><td style='padding: 6px;'>" . $order['departure_date'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Giờ khởi hành</th><td style='padding: 6px;'>" . $order['departure_time'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Người lớn</th><td style='padding: 6px;'>" . $order['adults'] . " x " . $order['adults_price'] . "</td></tr>";
        if (array_key_exists("children", $order)) {
            $message .= "<tr><th style='padding: 6px;'>Trẻ em</th><td style='padding: 6px;'>" . $order['children'] . " x " . $order['children_price'] . "</td></tr>";
        }
        if (array_key_exists("infants", $order)) {
            $message .= "<tr><th style='padding: 6px;'>Em bé</th><td style='padding: 6px;'>" . $order['infants'] . " x " . $order['infants_price'] . "</td></tr>";
        }
        $message .= "<tr><th>Phương thức thanh toán</th><td>" . $order['payment_method'] . "</td></tr>";
        $message .= "<tr><th>Tổng cộng</th><td>" . $order['total_price'] . " VND</td></tr>";
        $message .= "</tbody></table>";
        $message .= "<h4>Thông tin thanh toán</h4>";
        $message .= "<div style='padding: 0 12px;border: 1px solid #ccc;'>";
        $message .= "<p>" . $order['contact_name'] . "</p>";
        $message .= "<p>" . $order['contact_phone'] . "</p>";
        $message .= "<p>" . $order['contact_address'] . "</p>";
        $message .= "<p>" . $order['contact_mail'] . "</p>";
        $message .= "<p>" . $order['contact_note'] . "</p>";
        $message .= "</div></div>";
        $message .= "<a style='text-decoration: none;color: #034166;padding: 12px;display: block;text-align: center;' href='" . base_url() . "'>Flight Ticket</a>";
        $message .= "</div></div></section></body>";
        $message .= "</html>";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => '',
            'smtp_pass' => '',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($from);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function CreateOrder() {
        if ($this->input->is_ajax_request()) {
            $this->load->model('Database_model');

            $order = $this->input->post('dulieu');

            //Kiểm tra xem thông tin khách hàng này đã có chưa
            $where = "Email = '" . $order['contact_mail'] . "'";
            $customer = $this->Database_model->GetRecord('tbl_customer', $where);

            //Nếu chưa có thì tạo mới
            if (is_null($customer)) {
                $customer_data = [
                    'Name' => $order['contact_name'],
                    'Address' => $order['contact_address'],
                    'Phone' => $order['contact_phone'],
                    'Email' => $order['contact_mail']
                ];
                $this->Database_model->InsertRecord('tbl_customer', $customer_data);
            } else {
                //
            }

            //Lấy thông tin khách hàng vừa mới tạo
            $customer = $this->Database_model->GetRecord('tbl_customer', $where);

            //Tạo mã đặt vé
            $order_code = create_oder_code();

            //Kiểm tra mã đặt vé
            $where = "'Order_Code' = '" . $order_code . "'";
            $order_code_database = $this->Database_model->GetRecord('tbl_order', $where);
            if (!is_null($order_code_database)) {
                while ($order_code == $order_code_database['Order_Code']) {
                    $order_code = create_oder_code();
                    $where = "'Order_Code' = '" . $order_code . "'";
                    $order_code_database = $this->Database_model->GetRecord('tbl_order', $where)['Order_Code'];
                }
            }

            //Dữ liệu chi tiết chuyến bay
            $flight_detail['departure_date'] = $order['departure_date'];
            $flight_detail['departure_time'] = $order['departure_time'];
            if ($order['type'] == 'roundtrip') {
                $flight_detail['return_date'] = $order['return_date'];
                $flight_detail['return_time'] = $order['return_time'];
            }
            $flight_detail['flight_detail'] = $order['flight_detail'];

            //Dữ liệu thông tin thanh toán
            $payment_info['adults'] = $order['adults'];
            $payment_info['adults_baseprice'] = $order['adults_baseprice'];
            $payment_info['adults_price'] = $order['adults_price'];
            $payment_info['adults_names'] = $order['adults_names'];
            if (array_key_exists("children", $order)) {
                $payment_info['children'] = $order['children'];
                $payment_info['children_baseprice'] = $order['children_baseprice'];
                $payment_info['children_price'] = $order['children_price'];
                $payment_info['children_names'] = $order['children_names'];
            }
            if (array_key_exists("infants", $order)) {
                $payment_info['infants'] = $order['infants'];
                $payment_info['infants_baseprice'] = $order['infants_baseprice'];
                $payment_info['infants_price'] = $order['infants_price'];
                $payment_info['infants_names'] = $order['infants_names'];
            }
            $payment_info['total_price'] = $order['total_price'];
            $payment_info['contact_name'] = $order['contact_name'];
            $payment_info['contact_phone'] = $order['contact_phone'];
            $payment_info['contact_mail'] = $order['contact_mail'];
            $payment_info['contact_address'] = $order['contact_address'];
            $payment_info['contact_note'] = $order['contact_note'];

            //Dữ liệu lưu vào database
            $data = [
                'Order_Code' => $order_code,
                'Booking_DateTime' => $order['booking_datetime'],
                'Type' => $order['type'],
                'Origin' => $order['origin'],
                'Destination' => $order['destination'],
                'Flight_Detail' => json_encode($flight_detail),
                'Customer_ID' => $customer['Customer_ID'],
                'Payment_Method' => $order['payment_method'],
                'Payment_Info' => json_encode($payment_info),
                'Status' => 0
            ];

            if ($this->Database_model->InsertRecord('tbl_order', $data) > 0) {
                $this->SendBookingSuccessMail($order_code, $order, $order['contact_mail']);
                echo json_encode("Đặt vé thành công");
            } else {
                echo json_encode("Đặt vé không thành công");
            }
        }
    }

    public function UpdateStatus() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('order_id');
            $where = "Order_ID = " . $id;
            if ($this->Database_model->UpdateRecord('tbl_order', $where, 'Status', 1) > 0) {
                echo json_encode("Xác nhận thành công");
            } else {
                echo json_encode("Xác nhận không thành công");
            }
        }
    }
    public function ViewDetailOrder() {
        $data['view'] = 'admin/order_detail';
        $this->load->view('admin/master_layout', $data);
    }
}
        
    /* End of file  Login.php */
