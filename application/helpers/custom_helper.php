<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('vietdecode')) {
    function vietdecode($value) {
        $value = str_replace('“', '', $value);
        $value = str_replace('”', '', $value);
        $value = str_replace("'", '', $value);
        $value = str_replace("á", "a", $value);
        $value = str_replace("à", "a", $value);
        $value = str_replace("ả", "a", $value);
        $value = str_replace("ã", "a", $value);
        $value = str_replace("ạ", "a", $value);
        $value = str_replace("â", "a", $value);
        $value = str_replace("ă", "a", $value);
        $value = str_replace("Á", "a", $value);
        $value = str_replace("À", "a", $value);
        $value = str_replace("Ả", "a", $value);
        $value = str_replace("Ã", "a", $value);
        $value = str_replace("Ạ", "a", $value);
        $value = str_replace("Â", "a", $value);
        $value = str_replace("Ă", "a", $value);
        $value = str_replace("ấ", "a", $value);
        $value = str_replace("ầ", "a", $value);
        $value = str_replace("ẩ", "a", $value);
        $value = str_replace("ẫ", "a", $value);
        $value = str_replace("ậ", "a", $value);
        $value = str_replace("Ấ", "a", $value);
        $value = str_replace("Ầ", "a", $value);
        $value = str_replace("Ẩ", "a", $value);
        $value = str_replace("Ẫ", "a", $value);
        $value = str_replace("Ậ", "a", $value);
        $value = str_replace("ắ", "a", $value);
        $value = str_replace("ằ", "a", $value);
        $value = str_replace("ẳ", "a", $value);
        $value = str_replace("ẵ", "a", $value);
        $value = str_replace("ặ", "a", $value);
        $value = str_replace("Ắ", "a", $value);
        $value = str_replace("Ằ", "a", $value);
        $value = str_replace("Ẳ", "a", $value);
        $value = str_replace("Ẵ", "a", $value);
        $value = str_replace("Ặ", "a", $value);
        $value = str_replace("é", "e", $value);
        $value = str_replace("è", "e", $value);
        $value = str_replace("ẻ", "e", $value);
        $value = str_replace("ẽ", "e", $value);
        $value = str_replace("ẹ", "e", $value);
        $value = str_replace("ê", "e", $value);
        $value = str_replace("É", "e", $value);
        $value = str_replace("È", "e", $value);
        $value = str_replace("Ẻ", "e", $value);
        $value = str_replace("Ẽ", "e", $value);
        $value = str_replace("Ẹ", "e", $value);
        $value = str_replace("Ê", "e", $value);
        $value = str_replace("ế", "e", $value);
        $value = str_replace("ề", "e", $value);
        $value = str_replace("ể", "e", $value);
        $value = str_replace("ễ", "e", $value);
        $value = str_replace("ệ", "e", $value);
        $value = str_replace("Ế", "e", $value);
        $value = str_replace("Ề", "e", $value);
        $value = str_replace("Ể", "e", $value);
        $value = str_replace("Ễ", "e", $value);
        $value = str_replace("Ệ", "e", $value);
        $value = str_replace("í", "i", $value);
        $value = str_replace("ì", "i", $value);
        $value = str_replace("ỉ", "i", $value);
        $value = str_replace("ĩ", "i", $value);
        $value = str_replace("ị", "i", $value);
        $value = str_replace("Í", "i", $value);
        $value = str_replace("Ì", "i", $value);
        $value = str_replace("Ỉ", "i", $value);
        $value = str_replace("Ĩ", "i", $value);
        $value = str_replace("Ị", "i", $value);
        $value = str_replace("ố", "o", $value);
        $value = str_replace("ồ", "o", $value);
        $value = str_replace("ổ", "o", $value);
        $value = str_replace("ỗ", "o", $value);
        $value = str_replace("ộ", "o", $value);
        $value = str_replace("Ố", "o", $value);
        $value = str_replace("Ồ", "o", $value);
        $value = str_replace("Ổ", "o", $value);
        $value = str_replace("Ô", "o", $value);
        $value = str_replace("Ộ", "o", $value);
        $value = str_replace("ớ", "o", $value);
        $value = str_replace("ờ", "o", $value);
        $value = str_replace("ở", "o", $value);
        $value = str_replace("ỡ", "o", $value);
        $value = str_replace("ợ", "o", $value);
        $value = str_replace("Ớ", "o", $value);
        $value = str_replace("Ờ", "o", $value);
        $value = str_replace("Ở", "o", $value);
        $value = str_replace("Ỡ", "o", $value);
        $value = str_replace("Ợ", "o", $value);
        $value = str_replace("ứ", "u", $value);
        $value = str_replace("ừ", "u", $value);
        $value = str_replace("ử", "u", $value);
        $value = str_replace("ữ", "u", $value);
        $value = str_replace("ự", "u", $value);
        $value = str_replace("Ứ", "u", $value);
        $value = str_replace("Ừ", "u", $value);
        $value = str_replace("Ử", "u", $value);
        $value = str_replace("Ữ", "u", $value);
        $value = str_replace("Ự", "u", $value);
        $value = str_replace("ý", "y", $value);
        $value = str_replace("ỳ", "y", $value);
        $value = str_replace("ỷ", "y", $value);
        $value = str_replace("ỹ", "y", $value);
        $value = str_replace("ỵ", "y", $value);
        $value = str_replace("Ý", "y", $value);
        $value = str_replace("Ỳ", "y", $value);
        $value = str_replace("Ỷ", "y", $value);
        $value = str_replace("Ỹ", "y", $value);
        $value = str_replace("Ỵ", "y", $value);
        $value = str_replace("Đ", "d", $value);
        $value = str_replace("Đ", "d", $value);
        $value = str_replace("đ", "d", $value);
        $value = str_replace("ó", "o", $value);
        $value = str_replace("ò", "o", $value);
        $value = str_replace("ỏ", "o", $value);
        $value = str_replace("õ", "o", $value);
        $value = str_replace("ọ", "o", $value);
        $value = str_replace("ô", "o", $value);
        $value = str_replace("ơ", "o", $value);
        $value = str_replace("Ó", "o", $value);
        $value = str_replace("Ò", "o", $value);
        $value = str_replace("Ỏ", "o", $value);
        $value = str_replace("Õ", "o", $value);
        $value = str_replace("Ọ", "o", $value);
        $value = str_replace("Ô", "o", $value);
        $value = str_replace("Ơ", "o", $value);
        $value = str_replace("ú", "u", $value);
        $value = str_replace("ù", "u", $value);
        $value = str_replace("ủ", "u", $value);
        $value = str_replace("ũ", "u", $value);
        $value = str_replace("ụ", "u", $value);
        $value = str_replace("ư", "u", $value);
        $value = str_replace("Ú", "u", $value);
        $value = str_replace("Ù", "u", $value);
        $value = str_replace("Ủ", "u", $value);
        $value = str_replace("Ũ", "u", $value);
        $value = str_replace("Ụ", "u", $value);
        $value = str_replace("Ư", "u", $value);
        $value = str_replace(".", " ", $value);
        $value = str_replace(",", " ", $value);
        $value = str_replace("!", " ", $value);
        $value = str_replace("/", "-", $value);
        $value = str_replace("?", " ", $value);
        $value = str_replace(":", " ", $value);
        $value = str_replace("'", " ", $value);
        $value = str_replace("%", " ", $value);
        $value = str_replace("“ ”", " ", $value);
        $value = str_replace("m²", " ", $value);
        $value = str_replace("&#039;", " ", $value);
        $value = str_replace("&quot;", " ", $value);
        $value = str_replace("&amp;", "va", $value);
        $value = str_replace("(", " ", $value);
        $value = str_replace(")", " ", $value);
        $value = str_replace("-", " ", $value);
        $value = str_replace("   ", " ", $value);
        $value = str_replace("  ", " ", $value);
        return strtolower(str_replace(" ", "-", trim($value)));
    }

    if (!function_exists('create_oder_code')) {
        function create_oder_code() {
            $code = "";
            for ($i = 0; $i < 6; $i++) {
                $isNum = mt_rand(0, 1);
                if ($isNum == 0) {
                    $code .= mt_rand(0, 9);
                } else {
                    $code .= chr(mt_rand(65, 90));
                }
            }
            return $code;
        }
    }

    if (!function_exists('airport_by_iata')) {
        function airport_by_iata($iata) {
            $airport = "";
            switch ($iata) {
                case "SGN":
                    $airport = "Sân bay Tân Sơn Nhất";
                    break;
                case "HAN":
                    $airport = "Sân bay Nội Bài";
                    break;
                case "BMV":
                    $airport = "Sây bay Buôn Ma Thuột";
                    break;
                case "VCA":
                    $airport = "Sân bay Trà Nóc";
                    break;
                case "VCL":
                    $airport = "Sân bay Trà Nóc";
                    break;
                case "DLI":
                    $airport = "Sân bay Liên Khương";
                    break;
                case "DAD":
                    $airport = "Sân bay Đà Nẵng";
                    break;
                case "VDH":
                    $airport = "Sân bay Đồng Hới";
                    break;
                case "HPH":
                    $airport = "Sân bay Cát Bi";
                    break;
                case "HUI":
                    $airport = "Sân bay Phú Bài";
                    break;
                case "CXR":
                    $airport = "Sân bay Cam Ranh";
                    break;
                case "PQC":
                    $airport = "Sân bay Phú Quốc";
                    break;
                case "PXU":
                    $airport = "Sân bay Pleiku";
                    break;
                case "UIH":
                    $airport = "Sân bay Phù Cát";
                    break;
                case "THD":
                    $airport = "Sân bay Thọ Xuân";
                    break;
                case "TBB":
                    $airport = "Sân bay Tuy Hoà";
                    break;
                case "VDO":
                    $airport = "Sân bay Quốc tế Vân Đồn";
                    break;
                case "VII":
                    $airport = "Sân bay Quốc tế Vinh";
                    break;
                case "BKK":
                    $airport = "Sân bay Suvarnabhumi";
                    break;
                case "CNX":
                    $airport = "Sân bay quốc tế Chiang Mai";
                    break;
                case "CEI":
                    $airport = "Sân bay quốc tế Chiang Rai";
                    break;
                case "HDY":
                    $airport = "Sân bay Quốc tế Hat Yai";
                    break;
                case "KKC":
                    $airport = "Sân bay Khon Kaen";
                    break;
                case "KBV":
                    $airport = "Sân bay quốc tế Krabi";
                    break;
                case "NST":
                    $airport = "Sân bay Nakhon Si Thammarat";
                    break;
                case "HKT":
                    $airport = "Sân bay quốc tế Phuket";
                    break;
                case "URT":
                    $airport = "Sân bay Surat Thani";
                    break;
                case "UBP":
                    $airport = "Sân bay Ubon Ratchathani";
                    break;
                case "UTH":
                    $airport = "Sân bay quốc tế Udon Thani";
                    break;
                case "PUS":
                    $airport = "Sân bay quốc tế Gimhae";
                    break;
                case "KHH":
                    $airport = "Sân bay quốc tế Cao Hùng";
                    break;
                case "TAE":
                    $airport = "Sân bay quốc tế Daegu";
                    break;
                case "TPE":
                    $airport = "Sân bay quốc tế Đào viên - Nhà ga 1";
                    break;
                case "TNN":
                    $airport = "Sân bay Đài Nam";
                    break;
                case "RMQ":
                    $airport = "Sân bay quốc tế Đài Trung";
                    break;
                case "HND":
                    $airport = "Sân bay Haneda - Nhà ga 3";
                    break;
                case "HAK":
                    $airport = "Sân bay quốc tế Mỹ Lan Hải Khẩu";
                    break;
                case "HKG":
                    $airport = "Sân ban quốc tế Hồng Kông - Nhà ga 1";
                    break;
                case "HFE":
                    $airport = "Sân bay quốc tế Tân Kiều Hợp Phì";
                    break;
                case "CGK":
                    $airport = "Sân bay quốc tế Soekarno-Hatta";
                    break;
                case "KUL":
                    $airport = "Sân bay quốc tế Kuala Lumpur";
                    break;
                case "MFM":
                    $airport = "Sân bay quốc tế Macao";
                    break;
                case "BOM":
                    $airport = "Sân bay quốc tế Chhatrapati Shivaji";
                    break;
                case "DEL":
                    $airport = "Sân bay quốc tế Indira Gandhi";
                    break;
                case "DPS":
                    $airport = "Ngurah Rai - Bali";
                    break;
                case "KIX":
                    $airport = "Sân bay quốc tế Kansai - Nhà ga 1";
                    break;
                case "PNH":
                    $airport = "Phnôm Pênh";
                    break;
                case "ICN":
                    $airport = "Sân bay quốc tế Incheon";
                    break;
                case "REP":
                    $airport = "Sân bay quốc tế Xiêm Riệp";
                    break;
                case "SIN":
                    $airport = "Sân bay quốc tế Changi - Nhà ga 4";
                    break;
                case "NRT":
                    $airport = "Sân bay quốc tế Naria - Nhà ga 2";
                    break;
                case "RGN":
                    $airport = "Sân bay quốc tế Yangon";
                    break;
                default:
                    $airport = $iata;
            }
            return $airport;
        }
    }

    if (!function_exists('city_by_iata')) {
        function city_by_iata($iata) {
            $city = "";
            switch ($iata) {
                case "SGN":
                    $city = "Tp. Hồ Chí Minh";
                    break;
                case "HAN":
                    $city = "Hà Nội";
                    break;
                case "BMV":
                    $city = "Buôn Ma Thuột";
                    break;
                case "VCA":
                    $city = "Cần Thơ";
                    break;
                case "VCL":
                    $city = "Chu Lai";
                    break;
                case "DLI":
                    $city = "Đà Lạt";
                    break;
                case "DAD":
                    $city = "Đà Nẵng";
                    break;
                case "VDH":
                    $city = "Đồng Hởi";
                    break;
                case "HPH":
                    $city = "Hải Phòng";
                    break;
                case "HUI":
                    $city = "Huế";
                    break;
                case "CXR":
                    $city = "Nha Trang";
                    break;
                case "PQC":
                    $city = "Phú Quốc";
                    break;
                case "PXU":
                    $city = "Pleiku";
                    break;
                case "UIH":
                    $city = "Quy Nhơn";
                    break;
                case "THD":
                    $city = "Thanh Hóa";
                    break;
                case "TBB":
                    $city = "Tuy Hòa";
                    break;
                case "VDO":
                    $city = "Vân Đồn";
                    break;
                case "VII":
                    $city = "Vinh";
                    break;
                case "BKK":
                    $city = "Bangkok - Suvamabhumi";
                    break;
                case "CNX":
                    $city = "Chiang Mai";
                    break;
                case "CEI":
                    $city = "Chiang Rai";
                    break;
                case "HDY":
                    $city = "Hat Yai Int Airport";
                    break;
                case "KKC":
                    $city = "Khon Kaen";
                    break;
                case "KBV":
                    $city = "Krabi";
                    break;
                case "NST":
                    $city = "Nakhon Si Thammarat";
                    break;
                case "HKT":
                    $city = "Phuket";
                    break;
                case "URT":
                    $city = "Surat Thani";
                    break;
                case "UBP":
                    $city = "Ubon Ratchathani";
                    break;
                case "UTH":
                    $city = "Udon Thani";
                    break;
                case "PUS":
                    $city = "Busan";
                    break;
                case "KHH":
                    $city = "Cao Hùng";
                    break;
                case "TAE":
                    $city = "Daegu";
                    break;
                case "TPE":
                    $city = "Đài Bắc";
                    break;
                case "TNN":
                    $city = "Đài Nam";
                    break;
                case "RMQ":
                    $city = "Đài Trung";
                    break;
                case "HND":
                    $city = "Haneda Tokyo";
                    break;
                case "HAK":
                    $city = "Hải Khẩu";
                    break;
                case "HKG":
                    $city = "Hong Kong - Terminal 1";
                    break;
                case "HFE":
                    $city = "Hợp Phì";
                    break;
                case "CGK":
                    $city = "Jakarta";
                    break;
                case "KUL":
                    $city = "Kuala Lumpur - KLIA";
                    break;
                case "MFM":
                    $city = "Macau";
                    break;
                case "BOM":
                    $city = "Munbai - Terminal 2";
                    break;
                case "DEL":
                    $city = "New Delhi";
                    break;
                case "DPS":
                    $city = "Ngurah Rai - Bali";
                    break;
                case "KIX":
                    $city = "Osaka - Terminal 1";
                    break;
                case "PNH":
                    $city = "Phnôm Pênh";
                    break;
                case "ICN":
                    $city = "Seoul";
                    break;
                case "REP":
                    $city = "Siem Reap";
                    break;
                case "SIN":
                    $city = "Singapore - Terminal 1";
                    break;
                case "NRT":
                    $city = "Tokyo Narita";
                    break;
                case "RGN":
                    $city = "Yangon";
                    break;
                default:
                    $city = $iata;
            }
            return $city;
        }
    }

    if (!function_exists('collapse_money')) {
        function collapse_money($money) {
            $result = '';
            if ($money >= 1000000000) {
                $money /= 1000000000;
                $result = round($money, 1) . ' Tỉ';
            } elseif ($money >= 1000000) {
                $money /= 1000000;
                $result = round($money, 1) . ' Triệu';
            } elseif ($money >= 1000) {
                $money /= 1000;
                $result = round($money) . ' Nghìn';
            }
            return $result;
        }
    }
}