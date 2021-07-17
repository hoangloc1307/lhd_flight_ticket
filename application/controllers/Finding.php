<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Finding extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/JSON_model');
    }
    public function index()
    {
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
                $max = '20';
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
                $url .= '&travelClass=' . $class;
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
                    $url .= '&travelClass=' . $class;
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

                $data['websitesetting'] = json_decode($this->JSON_model->get('WebsiteSetting')['Text'], true);
                $data['payment_method'] = json_decode($this->JSON_model->get('PaymentMethod')['Text'], true);
                $this->load->view('home/header_footer', $data);
            }
        } else {
            show_404();
        }
    }

    public function GetLuggage()
    {
        $luggage['VJ'] = [
            '7kg' => 0,
            '15kg' => 140000,
            '20kg' => 160000,
            '25kg' => 220000,
            '30kg' => 320000,
            '35kg' => 370000,
            '40kg' => 420000
        ];
        $luggage['QH'] = [
            '7kg' => 0,
            '15kg' => 155000,
            '20kg' => 180000,
            '25kg' => 230000,
            '30kg' => 330000,
            '35kg' => 380000,
            '40kg' => 480000
        ];
        $luggage['VN'] = [
            '7kg' => 0,
            '15kg' => 270000,
            '20kg' => 330000,
            '25kg' => 440000,
            '30kg' => 550000,
            '35kg' => 650000,
            '40kg' => 750000
        ];
        $luggage['OTHER'] = [
            '7kg' => 0
        ];

        if ($this->input->is_ajax_request()) {
            $iata = $this->input->post('iata');
            switch ($iata) {
                case 'VJ':
                    echo json_encode($luggage['VJ']);
                    break;
                case 'QH':
                    echo json_encode($luggage['QH']);
                    break;
                case 'VN':
                    echo json_encode($luggage['VN']);
                    break;
                default:
                    echo json_encode($luggage['OTHER']);
            }
        }
    }
}
        
    /* End of file  Finding.php */