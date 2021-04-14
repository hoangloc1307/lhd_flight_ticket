function ZeroPad(nr, base) {
	var len = String(base).length - String(nr).length + 1;
	return len > 0 ? new Array(len).join("0") + nr : nr;
}

function numberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function ImageAirlines(airline_name) {
	var src = "";

	switch (airline_name) {
		case "Vietnam Airlines":
			src = "/assets/images/partner/vietnamairlines.png";
			break;
		case "FlexFlight":
			src = "/assets/images/partner/flexflight.png";
			break;
		case "Bamboo Airways":
			src = "/assets/images/partner/bambooairline.png";
			break;
		case "VietJet Air":
			src = "/assets/images/partner/vietjetair.png";
			break;
	}

	return src;
}

function GetNameByIATA(iata) {
	var name = "";

	switch (iata) {
		case "SGN":
			name = "Tp. Hồ Chí Minh";
			break;
		case "HAN":
			name = "Hà Nội";
			break;
		case "BMV":
			name = "Buôn Ma Thuột";
			break;
		case "VCA":
			name = "Cần Thơ";
			break;
		case "VCL":
			name = "Chu Lai";
			break;
		case "DLI":
			name = "Đà Lạt";
			break;
		case "DAD":
			name = "Đà Nẵng";
			break;
		case "VDH":
			name = "Đồng Hởi";
			break;
		case "HPH":
			name = "Hải Phòng";
			break;
		case "HUI":
			name = "Huế";
			break;
		case "CXR":
			name = "Nha Trang";
			break;
		case "PQC":
			name = "Phú Quốc";
			break;
		case "PXU":
			name = "Pleiku";
			break;
		case "UIH":
			name = "Quy Nhơn";
			break;
		case "THD":
			name = "Thanh Hóa";
			break;
		case "TBB":
			name = "Tuy Hòa";
			break;
		case "VDO":
			name = "Vân Đồn";
			break;
		case "VII":
			name = "Vinh";
			break;
		case "BKK":
			name = "Bangkok - Suvamabhumi";
			break;
		case "CNX":
			name = "Chiang Mai";
			break;
		case "CEI":
			name = "Chiang Rai";
			break;
		case "HDY":
			name = "Hat Yai Int Airport";
			break;
		case "KKC":
			name = "Khon Kaen";
			break;
		case "KBV":
			name = "Krabi";
			break;
		case "NST":
			name = "Nakhon Si Thammarat";
			break;
		case "HKT":
			name = "Phuket";
			break;
		case "URT":
			name = "Surat Thani";
			break;
		case "UBP":
			name = "Ubon Ratchathani";
			break;
		case "UTH":
			name = "Udon Thani";
			break;
		case "PUS":
			name = "Busan";
			break;
		case "KHH":
			name = "Cao Hùng";
			break;
		case "TAE":
			name = "Daegu";
			break;
		case "TPE":
			name = "Đài Bắc";
			break;
		case "TNN":
			name = "Đài Nam";
			break;
		case "RMQ":
			name = "Đài Trung";
			break;
		case "HND":
			name = "Haneda Tokyo";
			break;
		case "HAK":
			name = "Hải Khẩu";
			break;
		case "HKG":
			name = "Hong Kong - Terminal 1";
			break;
		case "HFE":
			name = "Hợp Phì";
			break;
		case "CGK":
			name = "Jakarta";
			break;
		case "KUL":
			name = "Kuala Lumpur - KLIA";
			break;
		case "MFM":
			name = "Macau";
			break;
		case "BOM":
			name = "Munbai - Terminal 2";
			break;
		case "DEL":
			name = "New Delhi";
			break;
		case "DPS":
			name = "Ngurah Rai - Bali";
			break;
		case "KIX":
			name = "Osaka - Terminal 1";
			break;
		case "PNH":
			name = "Phnôm Pênh";
			break;
		case "ICN":
			name = "Seoul";
			break;
		case "REP":
			name = "Siem Reap";
			break;
		case "SIN":
			name = "Singapore - Terminal 1";
			break;
		case "NRT":
			name = "Tokyo Narita";
			break;
		case "RGN":
			name = "Yangon";
			break;
		default:
			name = "UNKNOWN";
	}

	return name;
}
