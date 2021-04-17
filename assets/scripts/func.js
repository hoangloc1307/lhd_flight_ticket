function ZeroPad(nr, base) {
	var len = String(base).length - String(nr).length + 1;
	return len > 0 ? new Array(len).join("0") + nr : nr;
}

function NumberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function DateOrTimeString(dateTimeString, dateOrTime = "date") {
	var x = new Date(dateTimeString);
	if (dateOrTime == "time") {
		return ZeroPad(x.getHours(), 10) + ":" + ZeroPad(x.getMinutes(), 10);
	}
	return x.getDate() + "-" + (x.getMonth() + 1) + "-" + x.getFullYear();
}

//SORT DATA
function SortDepartureTime(a, b) {
	if (
		a.itineraries[0].segments[0].departure.at ===
		b.itineraries[0].segments[0].departure.at
	) {
		return 0;
	} else {
		return a.itineraries[0].segments[0].departure.at <
			b.itineraries[0].segments[0].departure.at
			? -1
			: 1;
	}
}

function SortPrice(a, b) {
	if (
		parseInt(a.travelerPricings[0].price.base) ===
		parseInt(b.travelerPricings[0].price.base)
	) {
		return 0;
	} else {
		return parseInt(a.travelerPricings[0].price.base) <
			parseInt(b.travelerPricings[0].price.base)
			? -1
			: 1;
	}
}

//GET VALUE BY IATA CODE
function GetAirlinesImageByIATA(iataCode) {
	var src = "";

	switch (iataCode) {
		case "VN":
			src = "assets/images/partner/vietnamairlines.png";
			break;
		case "W2":
			src = "assets/images/partner/flexflight.png";
			break;
		case "QH":
			src = "assets/images/partner/bambooairline.png";
			break;
		case "VJ":
			src = "assets/images/partner/vietjetair.png";
			break;
		case "VU":
			src = "assets/images/partner/vietravelairlines.png";
			break;
		case "CI":
			src = "assets/images/partner/chinaairlines.png";
			break;
		case "K6":
			src = "assets/images/partner/cambodiaangkorair.png";
			break;
		case "KE":
			src = "assets/images/partner/koreanair.png";
			break;
		case "JL":
			src = "assets/images/partner/jetlinx.png";
			break;
		case "SL":
			src = "assets/images/partner/lionair.png";
			break;
		case "AK":
			src = "assets/images/partner/airasia.png";
			break;
		case "GA":
			src = "assets/images/partner/garuda.png";
			break;
		case "SQ":
			src = "assets/images/partner/singaporeairlines.png";
			break;
		default:
			src = "assets/images/partner/default.png";
	}

	return src;
}

function GetCityNameByIATA(iata) {
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
			name = iata;
	}

	return name;
}
