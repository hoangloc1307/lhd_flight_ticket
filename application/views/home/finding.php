<div class="finding">
    <div class="grid wide">
        <div class="row">
            <div class="col l-12">
                <!-- Tab -->

                <div class="filter-tab">
                    <ul class="filter-step">
                        <li class="col l-4 active">
                            <span class="number-step"> 1 </span>
                            <h5 class="tilte-step">Chọn chuyến bay</h5>
                        </li>
                        <li class="col l-4 active">
                            <span class="number-step"> 2 </span>
                            <h5 class="tilte-step">Đặt chỗ</h5>
                        </li>
                        <li class="col l-4">
                            <span class="number-step"> 3 </span>
                            <h5 class="tilte-step">Thanh toán</h5>
                        </li>
                    </ul>
                </div>

                <!-- End Tab -->

                <!-- Step 1 -->
                <div class="row choose">
                    <!-- Filter left -->

                    <div id="filter-left" class="col l-4">
                        <!-- Flight sort -->
                        <div class="finding-sort finding-base">
                            <div class="title">
                                <i class="fas fa-filter"></i>
                                <span>Sắp xếp theo chuyến bay</span>
                            </div>
                            <ul class="box-sort">
                                <li class="price" onclick="ShowData(SortPrice)">
                                    <label for="price" class="label-radio">
                                        <input type="radio" id="price" class="sort" name="sort" value="_price"
                                            checked />
                                        <span class="label-circle"> </span>
                                        <span>Giá chuyến bay</span>
                                    </label>
                                </li>

                                <li class="timeup" onclick="ShowData(SortDepartureTime)">
                                    <label for="timeup" class="label-radio">
                                        <input type="radio" id="timeup" class="sort" name="sort" value="_timeup" />
                                        <span class="label-circle"> </span>
                                        <span>Giờ khởi hành</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <!-- End Flight sort -->

                        <!-- View price ticket -->
                        <div class="finding-view finding-base">
                            <div class="title">
                                <i class="far fa-eye"></i>
                                <span>Hiển thị theo</span>
                            </div>
                            <ul class="box-view">
                                <li class="personal">
                                    <label for="personal" class="label-radio">
                                        <input type="radio" id="personal" class="view" name="view" checked
                                            value="_personal" />
                                        <span class="label-circle filter-asc">
                                        </span>
                                        <span>Giá vé cơ bản cho người lớn</span>
                                    </label>
                                </li>

                                <li class="taxes">
                                    <label for="taxes" class="label-radio">
                                        <input type="radio" id="taxes" class="view" name="view" value="_taxes" />
                                        <span class="label-circle"> </span>
                                        <span>Giá vé bao gồm thuế và phí</span>
                                    </label>
                                </li>
                            </ul>
                        </div>
                        <!-- End View price ticket -->

                        <!-- Flight filter -->
                        <div class="finding-airline finding-base">
                            <div class="title">
                                <i class="fas fa-filter"></i>
                                <span>Lọc chuyến bay</span>
                            </div>

                            <div class="finding-airline__content">
                                <div class="label">
                                    <span>Chọn hãng hàng không</span>
                                    <i class="fas fa-plane"></i>
                                </div>

                                <div class="finding-airline__airline">
                                    <ul class="box">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Flight filter -->

                    </div>

                    <!-- End Filter left -->

                    <!-- Content -->

                    <div id="filter-content" class="col l-8">
                        <div id="filter-content-di">
                            <!-- Flight name -->
                            <div class="filter-header">
                                <div class="icon">
                                    <i class="fas fa-location-arrow"></i>
                                </div>
                                <div class="title">
                                    <div class="title-flight">
                                        <h5><?php echo json_decode($user_input, true)['origin']; ?></h5>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                        <h5><?php echo json_decode($user_input, true)['destination']; ?></h5>
                                    </div>
                                    <p class="date"><?php echo json_decode($user_input, true)['departure']; ?></p>
                                </div>
                            </div>
                            <!-- End Flight name -->

                            <!-- Box ticket flight -->
                            <div class="filter-main">
                            </div>
                            <!-- End Box ticket flight -->
                        </div>
                        <?php if (json_decode($user_input, true)['type'] == 'roundtrip') : ?>
                        <div id="filter-content-ve">
                            <!-- Flight name -->
                            <div class="filter-header">
                                <div class="icon">
                                    <i class="fas fa-location-arrow"></i>
                                </div>
                                <div class="title">
                                    <div class="title-flight">
                                        <h5><?php echo json_decode($user_input, true)['destination']; ?></h5>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                        <h5><?php echo json_decode($user_input, true)['origin']; ?></h5>
                                    </div>
                                    <p class="date"><?php echo json_decode($user_input, true)['return']; ?></p>
                                </div>
                            </div>
                            <!-- End Flight name -->

                            <!-- Box ticket flight -->
                            <div class="filter-main">
                            </div>
                            <!-- End Box ticket flight -->
                        </div>
                        <?php endif; ?>
                    </div>

                    <!-- End Content -->
                </div>
                <!-- End Step 1 -->
            </div>
        </div>
    </div>
</div>
<script>
var flightData = JSON.parse('<?= $flight_data ?>');
var userInput = <?= $user_input ?>;
var carriers = flightData['dictionaries']['carriers'];
var tickets = flightData['data'];
console.log(flightData);
if (userInput.type === 'roundtrip') {
    var flightData2 = JSON.parse('<?= isset($flight_data2) ? $flight_data2 : '' ?>');
    var tickets2 = flightData2['data'];
    console.log(flightData2);
}

var includetaxes = false;

//Danh sách hãng hàng không
var carriers_text = "<li value='all'><span class='checkmark active'></span><span>Tất cả các hãng</span></li>";
for (var i in carriers) {
    carriers_text += "<li value=" + i + "><span class='checkmark active'></span>";
    carriers_text += "<span>" + carriers[i] + "</span></li>";
}
$('.finding-airline__airline .box').html(carriers_text);

// Chuyến bay
function ShowData(sortFunction) {
    tickets.sort(sortFunction);
    if (userInput.type == 'roundtrip') {
        tickets2.sort(sortFunction);
    }
    //Vé lượt đi
    var tickets_text = "";
    for (let i in tickets) {
        tickets_text += "<div class='flight-item' value='" + tickets[i].itineraries[0].segments[0].operating
            .carrierCode + "'>";
        tickets_text += "<div class='flight-info'>";
        tickets_text += "<div class='flight-img'>";
        tickets_text += "<div class='box-img'>";
        tickets_text += "<img src='<?php base_url() ?>" + GetAirlinesImageByIATA(tickets[i].itineraries[0].segments[0]
            .operating.carrierCode) + "'/>";
        tickets_text += "</div></div>";
        tickets_text += "<div class='flight-from'>";
        tickets_text += "<div class='flight-city'>" + GetCityNameByIATA(userInput['origin'].substr(-4, 3)) + "</div>";
        tickets_text += "<div class='flight-time'>" + DateOrTimeString(tickets[i].itineraries[0].segments[0].departure
            .at, 'time') + "</div>";
        tickets_text += "</div>";
        tickets_text += "<div class='flight-wrap-detail'>";
        if (tickets[i].itineraries[0].segments.length > 1) {
            tickets_text += "<div class='flight-number-code'>" + (tickets[i].itineraries[0].segments.length - 1) +
                " điểm dừng</div>";
        } else {
            tickets_text += "<div class='flight-number-code'>" + tickets[i].itineraries[0].segments[0].operating
                .carrierCode + "" + tickets[i].itineraries[0].segments[0].number + "</div>";
        }
        tickets_text += "<div class='flight-line'></div>";
        tickets_text += "<div class='flight-detail'>Chi tiết</div>";
        tickets_text += "</div>";
        tickets_text += "<div class='flight-to'>";
        tickets_text += "<div class='flight-city'>" + GetCityNameByIATA(userInput['destination'].substr(-4, 3)) +
            "</div>";
        tickets_text += "<div class='flight-time'>" + DateOrTimeString(tickets[i].itineraries[0].segments[tickets[i]
            .itineraries[0].segments
            .length - 1].arrival.at, 'time') + "</div>";
        tickets_text += "</div>";
        tickets_text += "<div class='flight-price-choose'>";
        tickets_text += "<div class='flight-price'><span>" + NumberWithCommas(parseInt(includetaxes == true ? tickets[i]
            .price.total : tickets[i].travelerPricings[0].price.base)) + "</span><span>VND</span>" + "</div>";
        tickets_text += "<button>Chọn chuyến bay</button>";
        tickets_text += "</div></div>";
        tickets_text += "<div class='flight-box-detail'>";
        tickets_text += "<div class='flight-detail-item'>";
        tickets_text += "<p class='title-detail'><i class='fas fa-info-circle'></i> Chi tiết chuyến bay</p>";
        for (let j in tickets[i].itineraries[0].segments) {
            tickets_text += "<div class='flight-detail-wrap'>";
            tickets_text += "<div class='detail-img'>";
            tickets_text += "<div class='box-img'>";
            tickets_text += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(tickets[i].itineraries[0].segments[j]
                .carrierCode) + "'/>";
            tickets_text += "</div></div>";
            tickets_text += "<div class='detail-from'>";
            tickets_text += "<span>" + GetCityNameByIATA(tickets[i].itineraries[0].segments[j].departure.iataCode) +
                " - " +
                tickets[i].itineraries[0].segments[j].departure.iataCode + "</span>";
            tickets_text += "<span>Sân bay: " + tickets[i].itineraries[0].segments[j].departure.iataCode + "</span>";
            tickets_text += "<span><p>Cất cánh:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j]
                    .departure
                    .at, 'time') +
                "</p></span>";
            tickets_text += "<span><p>Ngày:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j].departure
                    .at) +
                "</p></span>";
            tickets_text += "</div>";
            tickets_text += "<div class='detail-to'>";
            tickets_text += "<span>" + GetCityNameByIATA(tickets[i].itineraries[0].segments[j].arrival.iataCode) +
                " - " +
                tickets[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
            tickets_text += "<span>Sân bay: " + tickets[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
            tickets_text += "<span><p>Hạ cánh:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j].arrival
                .at,
                'time') + "</p></span>";
            tickets_text += "<span><p>Ngày:</p> <p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j].arrival
                    .at) +
                "</p></span>";
            tickets_text += "</div>";
            tickets_text += "<div class='detail-flight'>";
            tickets_text += "<span><p>Chuyến bay:</p><p>" + tickets[i].itineraries[0].segments[j].number +
                "</p></span>";
            tickets_text += "<span><p>Thời gian bay:</p><p>" + tickets[i].itineraries[0].segments[j].duration.replace(
                "PT",
                "") + "</p></span>";
            tickets_text += "<span><p>Hàng:</p><p>" + tickets[i].travelerPricings[0].fareDetailsBySegment[0].class +
                "</p></span>";
            tickets_text += "<span><p>Hạng:</p><p>" + tickets[i].travelerPricings[0].fareDetailsBySegment[0].cabin +
                "</p></span>";
            // tickets_text += "<span><p>Máy bay:</p><p>" + flightData.dictionaries.aircraft[tickets[i].itineraries[0]
            //         .segments[j].aircraft.code] +
            //     "</p></span>";
            tickets_text += "</div></div>";
        }
        tickets_text += "</div>";
        tickets_text += "<div class='flight-detail-item'>";
        tickets_text += "<p class='title-detail'><i class='fas fa-ticket-alt'></i>Chi tiết giá vé</p>";
        tickets_text += "<div class='flight-detail-wrap'>";
        tickets_text += "<ul class='detail-fare'>";
        tickets_text += "<li class='person'><b>Hành khách</b></li>";
        tickets_text += "<li class='amount'><b>Số lượng</b> </li>";
        tickets_text += "<li class='price'><b>Giá vé</b></li>";
        tickets_text += "<li class='taxes'><b>Thuế và phí</b></li>";
        tickets_text += "<li class='total'><b>Tổng tiền</b></li>";
        tickets_text += "</ul>";
        tickets_text += "<ul class='detail-fare'>";
        tickets_text += "<li class='person'>Người lớn</li>";
        tickets_text += "<li class='amount'>" + userInput['adults'] + "</li>";
        for (let j in tickets[i].travelerPricings) {
            if (tickets[i].travelerPricings[j].travelerType == "ADULT") {
                tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ? tickets[i]
                    .price.total : tickets[i].travelerPricings[0].price.base)) + "</li>";
                tickets_text += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j].price
                    .total - tickets[i].travelerPricings[j].price.base)) + "</li>";
                tickets_text += "<li class='total'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j].price
                    .total * userInput['adults'])) + "</li>";
                break;
            }
        }
        tickets_text += "</ul>";
        if (userInput['children'] > 0) {
            tickets_text += "<ul class='detail-fare'>";
            tickets_text += "<li class='person'>Trẻ em</li>";
            tickets_text += "<li class='amount'>" + userInput['children'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "CHILD") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ? tickets[i]
                        .price.total : tickets[i].travelerPricings[0].price.base)) + "</li>";
                    tickets_text += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.total - tickets[i].travelerPricings[j].price.base)) + "</li>";
                    tickets_text += "<li class='total'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.total * userInput['children'])) + "</li>";
                    break;
                }
            }
            tickets_text += "</ul>";
        }
        if (userInput['infants'] > 0) {
            tickets_text += "<ul class='detail-fare'>";
            tickets_text += "<li class='person'>Em bé</li>";
            tickets_text += "<li class='amount'>" + userInput['infants'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ? tickets[i]
                        .price.total : tickets[i].travelerPricings[0].price.base)) + "</li>";
                    tickets_text += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.total - tickets[i].travelerPricings[j].price.base)) + "</li>";
                    tickets_text += "<li class='total'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.total * userInput['infants'])) + "</li>";
                    break;
                }
            }
            tickets_text += "</ul>";
        }
        tickets_text += "<div class='detail-total'>";
        tickets_text += "<span class='total-title'>Tổng tiền: </span>";
        tickets_text += "<span class='total-price'><span>" + NumberWithCommas(parseInt(tickets[i].price.total)) +
            "</span>VND </span>";
        tickets_text += "</div></div></div></div></div>";
    }
    $("#filter-content-di .filter-main").html(tickets_text);

    //Vé lượt về
    if (userInput.type == 'roundtrip') {
        var tickets_text2 = "";
        for (let i in tickets2) {
            tickets_text2 += "<div class='flight-item' value='" + tickets2[i].itineraries[0].segments[0].operating
                .carrierCode +
                "'>";
            tickets_text2 += "<div class='flight-info'>";
            tickets_text2 += "<div class='flight-img'>";
            tickets_text2 += "<div class='box-img'>";
            tickets_text2 += "<img src='<?php base_url() ?>" + GetAirlinesImageByIATA(tickets2[i].itineraries[0]
                .segments[0].operating.carrierCode) + "'/>";
            tickets_text2 += "</div></div>";
            tickets_text2 += "<div class='flight-from'>";
            tickets_text2 += "<div class='flight-city'>" + GetCityNameByIATA(userInput['destination'].substr(-4, 3)) +
                "</div>";
            tickets_text2 += "<div class='flight-time'>" + DateOrTimeString(tickets2[i].itineraries[0].segments[0]
                .departure
                .at, 'time') + "</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-wrap-detail'>";
            if (tickets2[i].itineraries[0].segments.length > 1) {
                tickets_text2 += "<div class='flight-number-code'>" + (tickets2[i].itineraries[0].segments.length - 1) +
                    " điểm dừng</div>";
            } else {
                tickets_text2 += "<div class='flight-number-code'>" + tickets2[i].itineraries[0].segments[0].operating
                    .carrierCode + "" + tickets2[i].itineraries[0].segments[0].number + "</div>";
            }
            tickets_text2 += "<div class='flight-line'></div>";
            tickets_text2 += "<div class='flight-detail'>Chi tiết</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-to'>";
            tickets_text2 += "<div class='flight-city'>" + GetCityNameByIATA(userInput['origin'].substr(-4, 3)) +
                "</div>";
            tickets_text2 += "<div class='flight-time'>" + DateOrTimeString(tickets2[i].itineraries[0].segments[
                tickets2[i]
                .itineraries[0].segments
                .length - 1].arrival.at, 'time') + "</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-price-choose'>";
            tickets_text2 += "<div class='flight-price'><span>" + NumberWithCommas(parseInt(includetaxes == true ?
                tickets2[i]
                .price.total : tickets2[i].travelerPricings[0].price.base)) + "</span><span>VND</span>" + "</div>";
            tickets_text2 += "<button>Chọn chuyến bay</button>";
            tickets_text2 += "</div></div>";
            tickets_text2 += "<div class='flight-box-detail'>";
            tickets_text2 += "<div class='flight-detail-item'>";
            tickets_text2 += "<p class='title-detail'><i class='fas fa-info-circle'></i> Chi tiết chuyến bay</p>";
            for (let j in tickets2[i].itineraries[0].segments) {
                tickets_text2 += "<div class='flight-detail-wrap'>";
                tickets_text2 += "<div class='detail-img'>";
                tickets_text2 += "<div class='box-img'>";
                tickets_text2 += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(tickets2[i].itineraries[0]
                    .segments[j]
                    .carrierCode) + "'/>";
                tickets_text2 += "</div></div>";
                tickets_text2 += "<div class='detail-from'>";
                tickets_text2 += "<span>" + GetCityNameByIATA(tickets2[i].itineraries[0].segments[j].departure
                        .iataCode) +
                    " - " +
                    tickets2[i].itineraries[0].segments[j].departure.iataCode + "</span>";
                tickets_text2 += "<span>Sân bay: " + tickets2[i].itineraries[0].segments[j].departure.iataCode +
                    "</span>";
                tickets_text2 += "<span><p>Cất cánh:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[j]
                        .departure
                        .at, 'time') +
                    "</p></span>";
                tickets_text2 += "<span><p>Ngày:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[j]
                        .departure
                        .at) +
                    "</p></span>";
                tickets_text2 += "</div>";
                tickets_text2 += "<div class='detail-to'>";
                tickets_text2 += "<span>" + GetCityNameByIATA(tickets2[i].itineraries[0].segments[j].arrival.iataCode) +
                    " - " +
                    tickets2[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
                tickets_text2 += "<span>Sân bay: " + tickets2[i].itineraries[0].segments[j].arrival.iataCode +
                    "</span>";
                tickets_text2 += "<span><p>Hạ cánh:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[j]
                    .arrival
                    .at,
                    'time') + "</p></span>";
                tickets_text2 += "<span><p>Ngày:</p> <p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[j]
                        .arrival
                        .at) +
                    "</p></span>";
                tickets_text2 += "</div>";
                tickets_text2 += "<div class='detail-flight'>";
                tickets_text2 += "<span><p>Chuyến bay:</p><p>" + tickets2[i].itineraries[0].segments[j].number +
                    "</p></span>";
                tickets_text2 += "<span><p>Thời gian bay:</p><p>" + tickets2[i].itineraries[0].segments[j].duration
                    .replace(
                        "PT",
                        "") + "</p></span>";
                tickets_text2 += "<span><p>Hàng:</p><p>" + tickets2[i].travelerPricings[0].fareDetailsBySegment[0]
                    .class +
                    "</p></span>";
                tickets_text2 += "<span><p>Hạng:</p><p>" + tickets2[i].travelerPricings[0].fareDetailsBySegment[0]
                    .cabin +
                    "</p></span>";
                // tickets_text2 += "<span><p>Máy bay:</p><p>" + flightData.dictionaries.aircraft[tickets2[i].itineraries[0]
                //         .segments[j].aircraft.code] +
                //     "</p></span>";
                tickets_text2 += "</div></div>";
            }
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-detail-item'>";
            tickets_text2 += "<p class='title-detail'><i class='fas fa-ticket-alt'></i>Chi tiết giá vé</p>";
            tickets_text2 += "<div class='flight-detail-wrap'>";
            tickets_text2 += "<ul class='detail-fare'>";
            tickets_text2 += "<li class='person'><b>Hành khách</b></li>";
            tickets_text2 += "<li class='amount'><b>Số lượng</b> </li>";
            tickets_text2 += "<li class='price'><b>Giá vé</b></li>";
            tickets_text2 += "<li class='taxes'><b>Thuế và phí</b></li>";
            tickets_text2 += "<li class='total'><b>Tổng tiền</b></li>";
            tickets_text2 += "</ul>";
            tickets_text2 += "<ul class='detail-fare'>";
            tickets_text2 += "<li class='person'>Người lớn</li>";
            tickets_text2 += "<li class='amount'>" + userInput['adults'] + "</li>";
            for (let j in tickets2[i].travelerPricings) {
                if (tickets2[i].travelerPricings[j].travelerType == "ADULT") {
                    tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ? tickets2[i]
                        .price.total : tickets2[i].travelerPricings[0].price.base)) + "</li>";
                    tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[j]
                        .price
                        .total - tickets2[i].travelerPricings[j].price.base)) + "</li>";
                    tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[j]
                        .price
                        .total * userInput['adults'])) + "</li>";
                    break;
                }
            }
            tickets_text2 += "</ul>";
            if (userInput['children'] > 0) {
                tickets_text2 += "<ul class='detail-fare'>";
                tickets_text2 += "<li class='person'>Trẻ em</li>";
                tickets_text2 += "<li class='amount'>" + userInput['children'] + "</li>";
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "CHILD") {
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ?
                            tickets2[i]
                            .price.total : tickets2[i].travelerPricings[0].price.base)) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[
                                j]
                            .price.total - tickets2[i].travelerPricings[j].price.base)) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[
                                j]
                            .price.total * userInput['children'])) + "</li>";
                        break;
                    }
                }
                tickets_text2 += "</ul>";
            }
            if (userInput['infants'] > 0) {
                tickets_text2 += "<ul class='detail-fare'>";
                tickets_text2 += "<li class='person'>Em bé</li>";
                tickets_text2 += "<li class='amount'>" + userInput['infants'] + "</li>";
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(includetaxes == true ?
                            tickets2[i]
                            .price.total : tickets2[i].travelerPricings[0].price.base)) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[
                                j]
                            .price.total - tickets2[i].travelerPricings[j].price.base)) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[
                                j]
                            .price.total * userInput['infants'])) + "</li>";
                        break;
                    }
                }
                tickets_text2 += "</ul>";
            }
            tickets_text2 += "<div class='detail-total'>";
            tickets_text2 += "<span class='total-title'>Tổng tiền: </span>";
            tickets_text2 += "<span class='total-price'><span>" + NumberWithCommas(parseInt(tickets2[i].price.total)) +
                "</span>VND </span>";
            tickets_text2 += "</div></div></div></div></div>";
        }
        $("#filter-content-ve .filter-main").html(tickets_text2);
    }
}
ShowData(SortPrice);

$(document).ready(function() {

    //Hiển thị chi tiết
    $(document).on("click", ".flight-detail", function() {
        $(this).parents(".flight-info").next(".flight-box-detail").slideToggle();
    });

    //Chế độ xem
    $('.finding-view  > .box-view > li.personal').click(function() {
        includetaxes = false;
        $('.box-sort li').each(function() {
            if ($(this).find("input").is(":checked")) {
                $(this).trigger("click");
            }
        });
    });
    $('.finding-view  > .box-view > li.taxes').click(function() {
        includetaxes = true;
        $('.box-sort li').each(function() {
            if ($(this).find("input").is(":checked")) {
                $(this).trigger("click");
            }
        });
    });

    /*Lọc hãng bay */
    $(".finding-airline__airline li").click(function() {
        var a = $(this).attr("value");

        if (a == "all") {
            $(".finding-airline__airline li .checkmark").addClass("active");
            $('.flight-item').css("display", "block");
        } else {
            $(".finding-airline__airline li")
                .not(this)
                .find(".checkmark")
                .removeClass("active");
            $(this).find(".checkmark").addClass("active");

            $('.flight-item').each(function() {
                if ($(this).attr('value') != a) {
                    $(this).css("display", "none");
                } else {
                    $(this).css("display", "block");
                }
            });
        }
    });
});
</script>