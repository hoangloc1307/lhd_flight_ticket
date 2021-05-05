<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Finding extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        if (isset($_POST['search-flight'])) {
            $api_key = 'RC6NqrKRWls95AuEi0Ukv2nTGSAd9tSy';
            $api_secret = 'dWcLwAsq8o0zIyJS';

            //Lấy access token
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://test.api.amadeus.com/v1/security/oauth2/token',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => 'client_id=%20' . $api_key . '&client_secret=' . $api_secret . '&grant_type=client_credentials',
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response, true);
            $access_token = $response['access_token'];

            // Lấy dữ liệu chuyến bay
            if (!is_null($access_token)) {
                //Tạo Authorization
                $access_token = 'Bearer ' . $response['access_token'];
                $auth = "Authorization : " . $access_token;

                //Lấy dữ liệu nhập vào
                $type = $this->input->post('ftype');
                $origin = substr($this->input->post('forigin'), -4, 3);
                $destination = substr($this->input->post('fdestination'), -4, 3);
                $departure = $this->input->post('fdepartment');
                $return = $this->input->post('freturn');
                $adults = $this->input->post('fadult');
                $children = $this->input->post('fchildren');
                $infants = $this->input->post('finfants');
                $class = $this->input->post('fclass');
                $maxprice = $this->input->post('fmaxprice');

                //Custom
                $max = '3';
                $nonstop = 'false';

                //Lấy chuyến đi
                $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
                $url .= '?currencyCode=VND';
                $url .= '&originLocationCode=' . $origin;
                $url .= '&destinationLocationCode=' . $destination;
                $url .= '&departureDate=' . $departure;
                $url .= '&adults=' . $adults;
                if ($children > 0) {
                    $url .= '&children=' . $children;
                }
                if ($infants > 0) {
                    $url .= '&infants=' . $infants;
                }
                if ($class != 'ALL') {
                    $url .= '&travelClass=' . $class;
                }
                if ($maxprice != "") {
                    $url .= '&maxPrice=' . $maxprice;
                }
                if ($max != '0') {
                    $url .= '&max=' . $max;
                }
                $url .= '&nonStop=' . $nonstop;

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array($auth)
                ));

                $response_go = curl_exec($curl);

                curl_close($curl);

                //Tạo url lấy chuyến về nếu mà chọn khứ hồi
                if ($type == 'roundtrip') {
                    $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
                    $url .= '?currencyCode=VND';
                    $url .= '&originLocationCode=' . $destination;
                    $url .= '&destinationLocationCode=' . $origin;
                    $url .= '&departureDate=' . $return;
                    $url .= '&adults=' . $adults;
                    if ($children > 0) {
                        $url .= '&children=' . $children;
                    }
                    if ($infants > 0) {
                        $url .= '&infants=' . $infants;
                    }
                    if ($class != 'ALL') {
                        $url .= '&travelClass=' . $class;
                    }
                    if ($maxprice != "") {
                        $url .= '&maxPrice=' . $maxprice;
                    }
                    if ($max != '0') {
                        $url .= '&max=' . $max;
                    }
                    $url .= '&nonStop=' . $nonstop;

                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array($auth)
                    ));

                    $response_back = curl_exec($curl);

                    curl_close($curl);
                }

                $data['user_input'] = json_encode([
                    'type' => $type,
                    'origin' => $origin,
                    'destination' => $destination,
                    'departure' => $departure,
                    'return' => $return,
                    'adults' => $adults,
                    'children' => $children,
                    'infants' => $infants,
                    'class' => $class,
                    'maxprice' => $maxprice
                ]);
                $data['view'] = 'home/finding';
                $data['title'] = 'Tìm chuyến bay';
                $data['flight_data'] = $response_go;
                if ($type == 'roundtrip') {
                    $data['flight_data2'] = $response_back;
                }
                $this->load->model('Admin/JSON_model');
                $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
                $this->load->view('home/header_footer', $data);
            }
        } else {
            show_404();
        }
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

            //Lưu dữ diệu vào database
            $data = [
                'Order_Code' => $order_code,
                'Order_Detail' => json_encode($order),
                'Customer_ID' => $customer['Customer_ID']
            ];

            if ($this->Database_model->InsertRecord('tbl_order', $data) > 0) {
                echo json_encode("Đặt vé thành công");
            } else {
                echo json_encode("Đặt vé không thành công");
            }
        }
    }
}
        
    /* End of file  Finding.php */