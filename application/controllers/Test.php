<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
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
                $access_token = 'Bearer ' . $response['access_token'];

                //Lấy dữ liệu nhập vào
                $type = $this->input->post('ftype');
                $origin = $this->input->post('forigin');
                $destination = $this->input->post('fdestination');
                $departure = $this->input->post('fdepartment');
                $return = $this->input->post('freturn');
                $adults = $this->input->post('fadult');
                $children = $this->input->post('fchildren');
                $infants = $this->input->post('finfants');

                //Tạo url
                $url = 'https://test.api.amadeus.com/v2/shopping/flight-offers';
                $url .= '?currencyCode=VND';
                $url .= '&originLocationCode=' . substr($origin, -4, 3);
                $url .= '&destinationLocationCode=' . substr($destination, -4, 3);
                $url .= '&departureDate=' . $departure;
                if ($type == 'roundtrip') {
                    $url .= '&returnDate=' . $return;
                }
                $url .= '&adults=' . $adults;
                if ($children > 0) {
                    $url .= '&children=' . $children;
                }
                if ($infants > 0) {
                    $url .= '&infants=' . $infants;
                }
                $url .= '&max=10';

                //Tạo Authorization
                $auth = "Authorization : " . $access_token;

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

                $data = curl_exec($curl);

                curl_close($curl);

                echo $data;
            }
        } else {
            show_404();
        }
    }
}
        
    /* End of file  Test.php */