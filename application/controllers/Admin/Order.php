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
            $data['orders'] = $this->Database_model->GetRecords('tbl_order', '', 'Order_ID DESC', '5', '');
        } else {
            $data['view'] = 'admin/order_detail';
            $data['title'] = 'Chi tiết hoá đơn';
            $where = "Order_ID = '" . $order_id . "'";
            $data['order'] = $this->Database_model->GetRecord('tbl_order', $where);
        }

        $this->load->view('admin/master_layout', $data);
    }

    public function ViewMore() {
        if ($this->input->is_ajax_request()) {
            $offset = $this->input->post('offset');
            $result = $this->Database_model->GetRecords('tbl_order', '', 'Order_ID DESC', '5', $offset);
            echo json_encode($result);
        }
    }

    public function Search() {
        if ($this->input->is_ajax_request()) {
            $keyword = $this->input->post("keyword");
            $this->load->model("Database_model");
            $where = "Order_Code LIKE '" . $keyword . "%' or Order_Code LIKE '%" . $keyword . "%' or Order_Code LIKE '%" . $keyword . "' or Order_Code LIKE '" . $keyword . "'";
            $result = $this->Database_model->GetRecords("tbl_order", $where, "Order_ID DESC", "", "");
            if (!empty($result)) {
                echo json_encode($result);
            } else {
                echo json_encode("Không tìm thấy kết quả!");
            }
        }
    }

    function SendBookingSuccessMail($order_code, $order, $to) {
        $subject = "Đặt vé thành công";

        $message = '<!DOCTYPE html>';
        $message .= '<html lang="en" style="font-family: Arial, Helvetica, sans-serif; font-size: 12px">';
        $message .= '<head></head>';
        $message .= '<body style="margin: 0; padding: 0; box-sizing: border-box">';
        $message .= '<section>';
        $message .= '<div style="max-width: 100%; background: #fff; border-radius: 6px;">';
        $message .= '<div style="padding: 24px;background: #17699a; font-size: 24px; color: #fff;">Cảm ơn bạn đã đặt vé</div>';
        $message .= '<div style="padding: 12px; color: #777">';
        $message .= '<div class="greeting">';
        $message .= '<p>Xin chào '. $order["contact_name"] .'</p>';
        $message .= '<p> Đơn hàng <span style="color: #f29018">'. $order_code .'</span> đã được đặt thành công và chúng tôi đang xử lý </p>';
        $message .= '</div>';
        $message .= '<div class="order-detail">';

        $message .= '<h4 style="color: #17699a; font-size: 18px">[Đơn hàng] ';
        $message .= '<span style="color: #f29018">'. $order_code .'</span> '. $order["booking_datetime"];
        $message .= '</h4>';

        $message .= '<h5 style="font-weight: 700; font-size: 16px; text-transform: uppercase; margin-bottom: 12px;">Thông tin chung</h5>';
        $message .= '<table style="width: 100%; text-align: left; border: 1px solid #ccc; line-height: 1.6; border-collapse: collapse;">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Loại vé </th>';
        $message .= '<td style="padding: 6px">'. ($order["type"]=="roundtrip"?"Khứ hồi": "Một chiều").'</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Hạng</th>';
        $message .= '<td style="padding: 6px">'. $order["class"] .'</td>';
        $message .= '</tr>';
        $message .= '<tr style="border-bottom: 1px solid #ccc">';
        $message .= '<th style="padding: 6px">Phương thức thanh toán</th>';
        $message .= '<td style="padding: 6px">'. $order["payment_method"] .'</td>';
        $message .= '</tr>';
        for ($i = 0; $i < $order["adults"]; $i++) {
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Người lớn '. (int)$i+1 .'</th>';
            $message .= '<td style="padding: 6px; font-style: italic; font-weight: 700;">'. $order["adults_names"][$i] .'</td>'; 
            $message .= '</tr>';
            $message .= '<tr style="border-bottom: 1px solid #ccc">';
            $message .= '<td style="padding: 6px; font-weight: bold"> Giá vé: <p style="font-weight: 400; margin: 0;">'. number_format($order["adults_baseprice"] + $order["adults_fee"], 0, ".", ".") .' VND</p></td>';
            foreach ($order["adults_luggage"][$i] as $key => $value) {
                $message .= '<td style="padding: 6px; font-weight: bold"> Hành lý: <p style="font-weight: 400; margin: 0;">('.$key.') '. number_format($value, 0, ".", ".") .' VND</p></td>';
            }
            $message .= '</tr>';
        }
        

        if (array_key_exists("children", $order)) {
            for ($i = 0; $i < $order["children"]; $i++) {
                $message .= '<tr>';
                $message .= '<th style="padding: 6px">Trẻ em '. (int)$i+1 .'</th>';
                $message .= '<td style="padding: 6px; font-style: italic; font-weight: 700;">'. $order["children_names"][$i] .' ('. $order["children_dob"][$i] .')</td>';
                $message .= '</tr>';
                $message .= '<tr style="border-bottom: 1px solid #ccc">';
                $message .= '<td style="padding: 6px; font-weight: bold"> Giá vé: <p style="font-weight: 400; margin: 0;">'. number_format($order["children_baseprice"] + $order["children_fee"], 0, ".", ".") .' VND</p></td>';
                foreach ($order["children_luggage"][$i] as $key => $value) {
                    $message .= '<td style="padding: 6px; font-weight: bold"> Hành lý: <p style="font-weight: 400; margin: 0;">('.$key.') '. number_format($value, 0, ".", ".") .' VND</p></td>';
                }
                $message .= '</tr>';
            }
        }

        if (array_key_exists("infants", $order)) {
            for ($i = 0; $i < $order["infants"]; $i++) {
                $message .= '<tr>';
                $message .= '<th style="padding: 6px">Em bé '. (int)$i+1 .'</th>';
                $message .= '<td style="padding: 6px; font-style: italic; font-weight: 700;">'. $order["infants_names"][$i] .' ('. $order["infants_dob"][$i] .')</td>';
                $message .= '</tr>';
                $message .= '<tr style="border-bottom: 1px solid #ccc">';
                $message .= '<td style="padding: 6px; font-weight: bold"> Giá vé: <p style="font-weight: 400; margin: 0;">'. number_format($order["infants_baseprice"] + $order["infants_fee"], 0, ".", ".") .' VND</p></td>';
                $message .= '<td></td>';
                $message .= '</tr>';
            }
        }

        $message .= '<tr style="border-top: 2px dashed #ccc;">';
        $message .= '<th style="padding: 12px 6px; text-transform: uppercase; font-size: 16px; color: #034166;">Tổng cộng</th>';
        $message .= '<td style="padding: 6px; font-weight: bold; font-size: 16px; color: #034166; text-align: left;"> '. number_format($order["total_price"], 0, ".", ".") .' VND</td>';
        $message .= '</tr>';
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '</tbody>';
        $message .= '</table>';

        $message .= '<h5 style="font-weight: 700; font-size: 16px; text-transform: uppercase; margin-bottom: 12px;">Vé đi</h5>';
        $message .= '<table style="width: 100%; text-align: left; border: 1px solid #ccc; line-height: 1.6; border-collapse: collapse;">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Điểm đi</th>';
        $message .= '<td style="padding: 6px">'. city_by_iata($order["origin"]) .' ('.$order["origin"].')</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Sân bay</th>';
        $message .= '<td style="padding: 6px">'. airport_by_iata($order["origin"]) .'</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Điểm đến</th>';
        $message .= '<td style="padding: 6px">'. city_by_iata($order["destination"]) .' ('.$order["destination"].')</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Ngày khởi hành</th>';
        $message .= '<td style="padding: 6px">'. $order["departure_date"] .'</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Giờ khởi hành</th>';
        $message .= '<td style="padding: 6px">'. $order["departure_time"] .'</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Ngày đến nơi</th>';
        $message .= '<td style="padding: 6px">Chưa có dữ liệu</td>';
        $message .= '</tr>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Giờ đến nơi</th>';
        $message .= '<td style="padding: 6px">Chưa có dữ liệu</td>';
        $message .= '</tr>';
        $message .= '</tbody>';
        $message .= '</table>';

        if($order["type"] == "roundtrip") {
            $message .= '<h5 style="font-weight: 700; font-size: 16px; text-transform: uppercase; margin-bottom: 12px;">Vé về</h5>';
            $message .= '<table style="width: 100%; text-align: left; border: 1px solid #ccc; line-height: 1.6; border-collapse: collapse;">';
            $message .= '<tbody>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Điểm đi</th>';
            $message .= '<td style="padding: 6px">'. city_by_iata($order["destination"]) .' ('.$order["destination"].')</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Sân bay</th>';
            $message .= '<td style="padding: 6px">'. airport_by_iata($order["destination"]) .'</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Điểm đến</th>';
            $message .= '<td style="padding: 6px">'. city_by_iata($order["origin"]) .' ('.$order["origin"].')</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Ngày khởi hành</th>';
            $message .= '<td style="padding: 6px">'. $order["return_date"] .'</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Giờ khởi hành</th>';
            $message .= '<td style="padding: 6px">'. $order["return_time"] .'</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Ngày đến nơi</th>';
            $message .= '<td style="padding: 6px">Chưa có dữ liệu</td>';
            $message .= '</tr>';
            $message .= '<tr>';
            $message .= '<th style="padding: 6px">Giờ đến nơi</th>';
            $message .= '<td style="padding: 6px">Chưa có dữ liệu</td>';
            $message .= '</tr>';
            $message .= '</tbody>';
            $message .= '</table>';
        }

        $message .= '<h5 style="font-weight: 700; font-size: 16px; text-transform: uppercase; margin-bottom: 12px;">Chi tiết chặng bay</h5>';
        $message .= '<div style="overflow-x: auto;">';
        $message .= '<table style="width: 100%; min-width: 768px; text-align: center; border: 1px solid #ccc; line-height: 1.6; border-collapse: collapse;">';
        $message .= '<tbody>';
        $message .= '<tr>';
        $message .= '<th style="padding: 6px">Mã chuyến bay</th>';
        $message .= '<th style="padding: 6px">Điểm đi</th>';
        $message .= '<th style="padding: 6px">Điểm đến</th>';
        $message .= '<th style="padding: 6px">Ngày cất cánh</th>';
        $message .= '<th style="padding: 6px">Thời gian cất cánh</th>';
        $message .= '<th style="padding: 6px">Ngày hạ cánh</th>';
        $message .= '<th style="padding: 6px">Thời gian hạ cánh</th>';
        $message .= '</tr>';
        for($i = 0; $i < count($order["flight_detail"]); $i++) {
            $message .= '<tr>';
            $message .= '<td style="padding: 6px">'. $order["flight_detail"][$i]["carrierCode"] . $order["flight_detail"][$i]["number"]. '</td>';
            $message .= '<td style="padding: 6px">'. city_by_iata($order["flight_detail"][$i]["from"]) .' ('. $order["flight_detail"][$i]["from"] .')</td>'; 
            $message .= '<td style="padding: 6px">'. city_by_iata($order["flight_detail"][$i]["to"]) .' ('. $order["flight_detail"][$i]["to"] .')</td>'; 
            $message .= '<td style="padding: 6px">'. $order["flight_detail"][$i]["departure_date"] .'</td>';
            $message .= '<td style="padding: 6px">'. $order["flight_detail"][$i]["departure_time"] .'</td>';
            $message .= '<td style="padding: 6px">'. $order["flight_detail"][$i]["arrival_date"] .'</td>';
            $message .= '<td style="padding: 6px">'. $order["flight_detail"][$i]["arrival_time"] .'</td>';
            $message .= '</tr>';
        }
        $message .= '</tbody>';
        $message .= '</table>';
        $message .= '</div>';

        $message .= '<h5 style="font-weight: 700; font-size: 16px; text-transform: uppercase; margin-bottom: 12px;">Thông tin liên hệ</h5>';
        $message .= '<div style="padding: 0 12px; border: 1px solid #ccc">';
        $message .= '<p>Họ tên: ' . $order["contact_name"] . '</p>';
        $message .= '<p>Số điện thoại: ' . $order["contact_phone"] . '</p>';
        $message .= '<p>Địa chỉ: ' . $order["contact_address"] . '</p>';
        $message .= '<p>Email: ' . $order["contact_mail"] . '</p>';
        $message .= '<p>Ghi chú: ' . $order["contact_note"] . '</p>';
        $message .= '</div>';
        $message .= '</div>';
        $message .= '<a style="text-decoration: none;color: #034166;padding: 12px; display: block;text-align: center;" href="' . base_url() . '">Flight Ticket</a>';
        $message .= '</div>';
        $message .= '</section>';
        $message .= '</body>';
        $message .= '</html>';

    
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'flightticketlhd@gmail.com',
            'smtp_pass' => '{!P@ss123!}',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from('flightticketlhd@gmail.com', 'LHD Flight Ticket');
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
            $payment_info['adults_fee'] = $order['adults_fee'];
            $payment_info['adults_names'] = $order['adults_names'];
            $payment_info['adults_luggage'] = $order['adults_luggage'];
            if (array_key_exists("children", $order)) {
                $payment_info['children'] = $order['children'];
                $payment_info['children_baseprice'] = $order['children_baseprice'];
                $payment_info['children_fee'] = $order['children_fee'];
                $payment_info['children_names'] = $order['children_names'];
                $payment_info['children_luggage'] = $order['children_luggage'];
                $payment_info['children_dob'] = $order['children_dob'];
            }
            if (array_key_exists("infants", $order)) {
                $payment_info['infants'] = $order['infants'];
                $payment_info['infants_baseprice'] = $order['infants_baseprice'];
                $payment_info['infants_fee'] = $order['infants_fee'];
                $payment_info['infants_names'] = $order['infants_names'];
                $payment_info['infants_dob'] = $order['infants_dob'];
            }
            $payment_info['total_price'] = $order['total_price'];
            $payment_info['old_price'] = $order['old_price'];
            $payment_info['contact_name'] = $order['contact_name'];
            $payment_info['contact_phone'] = $order['contact_phone'];
            $payment_info['contact_mail'] = $order['contact_mail'];
            $payment_info['contact_address'] = $order['contact_address'];
            $payment_info['contact_note'] = $order['contact_note'];

            //Dữ liệu lưu vào database
            $data = [
                'Order_Code' => $order_code,
                'Booking_DateTime' => date_format(date_create($order['booking_datetime']), "Y-m-d H:i:s"),
                'Type' => $order['type'],
                'Class' => $order['class'],
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

    public function SendSuccessPaymentMail($order, $to) {
        $subject = "Thanh toán thành công";

        $payment_info = json_decode($order['Payment_Info'], true);
        $flight_detail = json_decode($order['Flight_Detail'], true);

        $message = "<!DOCTYPE html><html lang='en' style='font-family: Arial, Helvetica, sans-serif;font-size: 14px;'><head></head><body style='margin: 0;padding: 0;box-sizing: border-box;'>";
        $message .= "<section style='background: #f9f9f9;padding: 30px 0;'>";
        $message .= "<div style='max-width: 480px;margin: 0 auto;background: #fff;border-radius: 6px;'>";
        $message .= "<div style='padding: 24px;background: #17699a;font-size: 24px;color: #fff;border-radius: 6px 6px 0 0;'>Thanh toán thành công</div>";
        $message .= "<div style='padding: 12px;color: #777;'>";
        $message .= "<div class='greeting'>";
        $message .= "<p>Xin chào " . $payment_info['contact_name'] . ",</p>";
        $message .= "<p>Đơn hàng " . $order['Order_Code'] . " đã được thanh toán thành công</p>";
        $message .= "</div>";
        $message .= "<div class='order-detail'>";
        $message .= "<h4 style='color: #17699a;font-size: 18px;'>[Đơn hàng] <span>" . $order['Order_Code'] . "</span> <span>" . $order['Booking_DateTime'] . "</span></h4>";
        $message .= "<table style='width: 100%;text-align: left;border: 1px solid #ccc;line-height: 1.6;'><tbody>";
        $message .= "<tr><th style='padding: 6px;'>Loại vé</th><td style='padding: 6px;'>" . ($order['Type'] == 'oneway' ? 'Một chiều' : 'Khứ hồi') . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Điểm đi</th><td style='padding: 6px;'>" . $order['Origin'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Điểm đến</th><td style='padding: 6px;'>" . $order['Destination'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Ngày khởi hành</th><td style='padding: 6px;'>" . $flight_detail['departure_date'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Giờ khởi hành</th><td style='padding: 6px;'>" . $flight_detail['departure_time'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Người lớn</th><td style='padding: 6px;'>" . $payment_info['adults'] . " x " . number_format($payment_info['adults_baseprice'], 0, ".", ".") . "</td></tr>";
        if (array_key_exists("children", $payment_info)) {
            $message .= "<tr><th style='padding: 6px;'>Trẻ em</th><td style='padding: 6px;'>" . $payment_info['children'] . " x " . number_format($payment_info['children_price'], 0, ".", ".") . "</td></tr>";
        }
        if (array_key_exists("infants", $payment_info)) {
            $message .= "<tr><th style='padding: 6px;'>Em bé</th><td style='padding: 6px;'>" . $payment_info['infants'] . " x " . number_format($payment_info['infants_price'], 0, ".", ".") . "</td></tr>";
        }
        $message .= "<tr><th style='padding: 6px;'>Phương thức thanh toán</th><td style='padding: 6px;'>" . $order['Payment_Method'] . "</td></tr>";
        $message .= "<tr><th style='padding: 6px;'>Tổng cộng</th><td style='padding: 6px; font-weight: bold;'>" . number_format($payment_info['total_price'], 0, ".", ".") . " VND</td></tr>";
        $message .= "</tbody></table>";
        $message .= "<h4>Thông tin thanh toán</h4>";
        $message .= "<div style='padding: 0 12px;border: 1px solid #ccc;'>";
        $message .= "<p>Họ tên: " . $payment_info['contact_name'] . "</p>";
        $message .= "<p>Số điện thoại: " . $payment_info['contact_phone'] . "</p>";
        $message .= "<p>Địa chỉ: " . $payment_info['contact_address'] . "</p>";
        $message .= "<p>Email: " . $payment_info['contact_mail'] . "</p>";
        $message .= "<p>Ghi chú: " . $payment_info['contact_note'] . "</p>";
        $message .= "</div></div>";
        $message .= "<a style='text-decoration: none;color: #034166;padding: 12px;display: block;text-align: center;' href='" . base_url() . "'>Flight Ticket</a>";
        $message .= "</div></div></section></body>";
        $message .= "</html>";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'flightticketlhd@gmail.com',
            'smtp_pass' => '{!P@ss123!}',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->from('flightticketlhd@gmail.com', 'LHD Flight Ticket');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $this->email->send();
    }

    public function UpdateStatus() {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->post('order_id');
            $where = "Order_ID = " . $id;
            if ($this->Database_model->UpdateRecord('tbl_order', $where, 'Status', 1) > 0) {
                $order = $this->Database_model->GetRecord('tbl_order', $where);
                $order_mail = json_decode($order['Payment_Info'], true);
                $this->SendSuccessPaymentMail($order, $order_mail['contact_mail']);
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