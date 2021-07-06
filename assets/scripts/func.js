function ZeroPad(nr, base) {
	var len = String(base).length - String(nr).length + 1;
	return len > 0 ? new Array(len).join("0") + nr : nr;
}

function NumberWithCommas(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function NumberCommasToInt(x) {
	return parseInt(x.replaceAll(".", ""));
}

function DateOrTimeString(dateTimeString, dateOrTime = "date") {
	var x = new Date(dateTimeString);
	if (dateOrTime == "time") {
		return ZeroPad(x.getHours(), 10) + ":" + ZeroPad(x.getMinutes(), 10);
	}
	return (
		ZeroPad(x.getDate(), 10) +
		"-" +
		ZeroPad(x.getMonth() + 1, 10) +
		"-" +
		x.getFullYear()
	);
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

// function SortID(a, b) {
// 	if (parseInt(a.id) === parseInt(b.id)) {
// 		return 0;
// 	} else {
// 		return parseInt(a.id) < parseInt(b.id) ? -1 : 1;
// 	}
// }

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
		case "AA":
			src = "assets/images/partner/americanairlines.png";
			break;
		case "AF":
			src = "assets/images/partner/airfrance.png";
			break;
		case "CI":
			src = "assets/images/partner/chinaairlines.png";
			break;
		case "TR":
			src = "assets/images/partner/scootair.png";
			break;
		case "3K":
			src = "assets/images/partner/jetstar.png";
			break;
		case "OD":
			src = "assets/images/partner/malindoair.png";
			break;
		case "MH":
			src = "assets/images/partner/malaysiaairlines.png";
			break;
		case "CX":
			src = "assets/images/partner/pacific.png";
			break;
		case "RJ":
			src = "assets/images/partner/jordanianairlines.png";
			break;
		case "UO":
			src = "assets/images/partner/hkexpress.png";
			break;
		case "WE":
			src = "assets/images/partner/challenge.png";
			break;
		case "PG":
			src = "assets/images/partner/bangkokairways.png";
			break;
		case "NX":
			src = "assets/images/partner/airmacau.png";
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

function GetAirPortByIATA(iata) {
	var name = "";

	switch (iata) {
		case "SGN":
			name = "Sân bay Tân Sơn Nhất";
			break;
		case "HAN":
			name = "Sân bay Nội Bài";
			break;
		case "BMV":
			name = "Sây bay Buôn Ma Thuột";
			break;
		case "VCA":
			name = "Sân bay Trà Nóc";
			break;
		case "VCL":
			name = "Sân bay Trà Nóc";
			break;
		case "DLI":
			name = "Sân bay Liên Khương";
			break;
		case "DAD":
			name = "Sân bay Đà Nẵng";
			break;
		case "VDH":
			name = "Sân bay Đồng Hới";
			break;
		case "HPH":
			name = "Sân bay Cát Bi";
			break;
		case "HUI":
			name = "Sân bay Phú Bài";
			break;
		case "CXR":
			name = "Sân bay Cam Ranh";
			break;
		case "PQC":
			name = "Sân bay Phú Quốc";
			break;
		case "PXU":
			name = "Sân bay Pleiku";
			break;
		case "UIH":
			name = "Sân bay Phù Cát";
			break;
		case "THD":
			name = "Sân bay Thọ Xuân";
			break;
		case "TBB":
			name = "Sân bay Tuy Hoà";
			break;
		case "VDO":
			name = "Sân bay Quốc tế Vân Đồn";
			break;
		case "VII":
			name = "Sân bay Quốc tế Vinh";
			break;
		case "BKK":
			name = "Sân bay Suvarnabhumi";
			break;
		case "CNX":
			name = "Sân bay quốc tế Chiang Mai";
			break;
		case "CEI":
			name = "Sân bay quốc tế Chiang Rai";
			break;
		case "HDY":
			name = "Sân bay Quốc tế Hat Yai";
			break;
		case "KKC":
			name = "Sân bay Khon Kaen";
			break;
		case "KBV":
			name = "Sân bay quốc tế Krabi";
			break;
		case "NST":
			name = "Sân bay Nakhon Si Thammarat";
			break;
		case "HKT":
			name = "Sân bay quốc tế Phuket";
			break;
		case "URT":
			name = "Sân bay Surat Thani";
			break;
		case "UBP":
			name = "Sân bay Ubon Ratchathani";
			break;
		case "UTH":
			name = "Sân bay quốc tế Udon Thani";
			break;
		case "PUS":
			name = "Sân bay quốc tế Gimhae";
			break;
		case "KHH":
			name = "Sân bay quốc tế Cao Hùng";
			break;
		case "TAE":
			name = "Sân bay quốc tế Daegu";
			break;
		case "TPE":
			name = "Sân bay quốc tế Đào viên - Nhà ga 1";
			break;
		case "TNN":
			name = "Sân bay Đài Nam";
			break;
		case "RMQ":
			name = "Sân bay quốc tế Đài Trung";
			break;
		case "HND":
			name = "Sân bay Haneda - Nhà ga 3";
			break;
		case "HAK":
			name = "Sân bay quốc tế Mỹ Lan Hải Khẩu";
			break;
		case "HKG":
			name = "Sân ban quốc tế Hồng Kông - Nhà ga 1";
			break;
		case "HFE":
			name = "Sân bay quốc tế Tân Kiều Hợp Phì";
			break;
		case "CGK":
			name = "Sân bay quốc tế Soekarno-Hatta";
			break;
		case "KUL":
			name = "Sân bay quốc tế Kuala Lumpur";
			break;
		case "MFM":
			name = "Sân bay quốc tế Macao";
			break;
		case "BOM":
			name = "Sân bay quốc tế Chhatrapati Shivaji";
			break;
		case "DEL":
			name = "Sân bay quốc tế Indira Gandhi";
			break;
		case "DPS":
			name = "Ngurah Rai - Bali";
			break;
		case "KIX":
			name = "Sân bay quốc tế Kansai - Nhà ga 1";
			break;
		case "PNH":
			name = "Phnôm Pênh";
			break;
		case "ICN":
			name = "Sân bay quốc tế Incheon";
			break;
		case "REP":
			name = "Sân bay quốc tế Xiêm Riệp";
			break;
		case "SIN":
			name = "Sân bay quốc tế Changi - Nhà ga 4";
			break;
		case "NRT":
			name = "Sân bay quốc tế Naria - Nhà ga 2";
			break;
		case "RGN":
			name = "Sân bay quốc tế Yangon";
			break;
		default:
			name = iata;
	}
	return name;
}
