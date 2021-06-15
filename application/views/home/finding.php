<div class="finding">
    <div class="grid wide">
        <div class="row">
            <div class="finding-col col l-12 m-12 s-12">
                <!-- Tab -->

                <div class="filter-tab">
                    <ul class="filter-step">
                        <li class="col l-4 m-4 s-4 active">
                            <span class="number-step"> 1 </span>
                            <h5 class="tilte-step">Chọn chuyến bay</h5>
                        </li>
                        <li class="col l-4 m-4 s-4">
                            <span class="number-step"> 2 </span>
                            <h5 class="tilte-step">Đặt chỗ</h5>
                        </li>
                        <li class="col l-4 m-4 s-4">
                            <span class="number-step"> 3 </span>
                            <h5 class="tilte-step">Thanh toán</h5>
                        </li>
                    </ul>
                </div>

                <!-- End Tab -->

                <!-- Step 1 -->
                <div class="row choose">
                    <!-- Filter left -->

                    <div id="filter-left" class="col l-4 m-12 s-12">
                        <!-- Flight sort -->
                        <div class="finding-sort finding-base">
                            <div class="title">
                                <div>
                                    <i class="fas fa-sort-alpha-down"></i>
                                    <span>Sắp xếp theo chuyến bay</span>
                                </div>
                                <i class="fas fa-angle-down icon-down"></i>
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
                                <div>
                                    <i class="far fa-eye"></i>
                                    <span>Hiển thị theo</span>
                                </div>
                                <i class="fas fa-angle-down icon-down"></i>
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
                                <div>
                                    <i class="fas fa-filter"></i>
                                    <span>Lọc chuyến bay</span>
                                </div>
                                <i class="fas fa-angle-down icon-down"></i>
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

                    <div id="filter-content" class="col l-8 m-12 s-12">
                        <div id="filter-content-di" class="result">
                            <!-- Flight name -->
                            <div class="filter-header">
                                <div class="icon">
                                    <i class="fas fa-location-arrow"></i>
                                </div>
                                <div class="title">
                                    <div class="title-flight">
                                        <h5>
                                            <?php echo json_decode($user_input, true)['origin']; ?>
                                        </h5>
                                        <i class="fas fa-long-arrow-alt-right"></i>
                                        <h5><?php echo json_decode($user_input, true)['destination']; ?></h5>
                                    </div>
                                    <p class="date"><?php echo json_decode($user_input, true)['departure']; ?>
                                    </p>
                                </div>
                            </div>
                            <!-- End Flight name -->

                            <!-- Box ticket flight -->
                            <div class="filter-main">
                            </div>
                            <!-- End Box ticket flight -->
                        </div>
                        <?php if (json_decode($user_input, true)['type'] == 'roundtrip') : ?>
                        <div id="filter-content-ve" class="result">
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
                <!-- Step 2 -->
                <div class="row confirm">
                    <div class="col l-4 m-12 s-12">
                        <div class="finding-detail">
                            <div class="header">
                                <i class="fas fa-shopping-cart"></i>
                                <h3>Chi tiết giá vé</h3>
                            </div>
                            <div class="content">
                                <div class="detail-ticket-container"></div>
                                <div class="detail-summary">
                                    <div class="summary">
                                        <p>Tóm tắt giá vé</p>
                                        <p>Tổng</p>
                                    </div>
                                    <div class="summary-cart-container">
                                    </div>
                                </div>
                                <div class="total-price">
                                    <p>Tổng chi phí:</p>
                                    <div class="price">
                                        <p>1.200.000</p>
                                        <p>VND</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col l-8 m-12 s-12">
                        <div class="flight-selected">
                            <div class="box-selected flight-selected__base">
                                <h3 class="header">
                                    Chuyến bay bạn đã lựa chọn
                                </h3>
                                <div class="flight-choose">
                                </div>
                            </div>
                            <div class="info-customer flight-selected__base">
                                <h3 class="header">
                                    Thông tin khách hàng
                                </h3>
                                <div class="box-info">
                                    <div class="box-title">
                                        <p class="box-user">Khách hàng</p>
                                        <p class="box-name">Họ & Tên</p>
                                        <p class="box-date">Ngày sinh</p>
                                    </div>
                                    <div class="box-container">
                                    </div>
                                </div>
                            </div>
                            <div class="info-contact flight-selected__base">
                                <h3 class="header">
                                    Thông tin liên hệ
                                </h3>
                                <div class="box-info">
                                    <div class="box-customer">
                                        <p class="box-name">Họ & Tên</p>
                                        <input type="text" name="name" placeholder="Họ & Tên">
                                        <p class="box-phone">Điện thoại</p>
                                        <input type="number" name="phone" placeholder="Điện thoại">
                                        <p class="box-phone">Email</p>
                                        <input type="mail" name="email" placeholder="Email">
                                        <p class="box-phone">Địa chỉ</p>
                                        <input type="text" name="address" placeholder="Địa chỉ">
                                    </div>
                                    <div class="box-note">
                                        <p>Ghi chú</p>
                                        <textarea name="note" cols="30" rows="13"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="payment flight-selected__base">
                                <h3 class="header">
                                    Phương thức thanh toán
                                </h3>
                                <div class="box-option">
                                    <ul class="option-payment">
                                        <?php foreach ($payment_method as $item) : ?>
                                        <li class="payment-method">
                                            <div class="title">
                                                <i class="far fa-check-circle active"></i>
                                                <p><?= $item['Name'] ?></p>
                                            </div>
                                            <div class="content">
                                                <?= $item['Content'] ?>
                                            </div>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="button-step">
                                <button><i class="fas fa-long-arrow-alt-left"></i>Trở lại</button>
                                <button>Tiếp tục<i class="fas fa-long-arrow-alt-right"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Step 2 -->
                <!-- Step 3 -->
                <div class="row finish-payment">
                    <div class="col l-12 m-12 s-12">
                        <div class="flight-detail">
                            <h4 class="title">
                                <i class="fas fa-info-circle"></i> Chi tiết chuyến bay
                            </h4>
                            <div class="flight-detail-container">
                                <div class="go"></div>
                                <div class="back"></div>
                            </div>
                        </div>

                        <div class="info">
                            <h4 class="title">
                                <i class="fas fa-info-circle"></i> Thông tin khách hàng và giá vé
                            </h4>
                            <div class="info-detail">
                                <div class="info-table">
                                </div>
                            </div>
                        </div>
                        <div class="contact">
                            <h4 class="title">
                                <i class="fas fa-phone-square-alt"></i> Thông tin liên hệ
                            </h4>
                            <div class="contact-detail">
                                <div class="row">
                                    <div class="col l-6 m-6 s-12">
                                        <div class="name">
                                            <p>Họ & tên:</p>
                                            <p>Nguyễn Trung Hiếu</p>
                                        </div>
                                        <div class="email">
                                            <p>Email:</p>
                                            <p>hieucot69@gmail.com</p>
                                        </div>
                                        <div class="address">
                                            <p>Địa chỉ:</p>
                                            <p>Ấp 1, Xã, Huyện, Tỉnh</p>
                                        </div>
                                    </div>
                                    <div class="col l-6 m-6 s-12">
                                        <div class="phone">
                                            <p>Điện thoại:</p>
                                            <p>0582187188</p>
                                        </div>
                                        <div class="method">
                                            <p>Phương thức thanh toán:</p>
                                            <p>Thanh toán tại văn phòng Flight Ticket</p>
                                        </div>
                                    </div>
                                    <div class="col l-12 m-12 s-12">
                                        <div class="request">
                                            <p>Yêu cầu đặc biệt:</p>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Step 3 -->
            </div>
        </div>
    </div>
</div>
<script>
var userInput = <?= $user_input ?>; //Dữ liệu người dùng nhập vào
//Dữ liệu về các chuyến bay
var tickets = JSON.parse('<?= $flight_data ?>')['data'];
if (userInput['type'] == 'roundtrip') {
    var tickets2 = JSON.parse('<?= isset($flight_data2) ? $flight_data2 : '' ?>')['data'];
}
var carriers = JSON.parse('<?= $flight_data ?>')['dictionaries']['carriers']; //Danh sách các hãng bay
var includetaxes = false;

//Danh sách hãng hàng không
var carriers_text = "<li value='all'><span class='checkmark active'></span><span>Tất cả các hãng</span></li>";
for (var i in carriers) {
    carriers_text += "<li value=" + i + "><span class='checkmark active'></span>";
    carriers_text += "<span>" + carriers[i] + "</span></li>";
}
$('.finding-airline__airline .box').html(carriers_text);

/*====================================================================================================
======================================== HIỂN THỊ CÁC CHUYẾN BAY ========================================
====================================================================================================*/
function ShowData(sortFunction) {
    //Sắp xếp lại dữ liệu trả về
    tickets.sort(sortFunction);
    if (userInput.type == 'roundtrip') {
        tickets2.sort(sortFunction);
    }

    //Hiển thị vé lượt đi
    var tickets_text = "";
    for (let i in tickets) {
        //Tính giá + 10%
        var adults_price_new = parseInt(tickets[i].travelerPricings[0].price.base) + parseInt(tickets[i]
            .travelerPricings[0].price.base) * 0.1;
        var adults_fee = parseInt(tickets[i].travelerPricings[0].price.total - tickets[i].travelerPricings[0].price
            .base);
        var total_price_ticket = (adults_price_new + adults_fee) * userInput['adults'];
        if (userInput['children'] > 0) {
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "CHILD") {
                    var children_price_new = parseInt(tickets[i].travelerPricings[j].price.base) + parseInt(
                        tickets[i]
                        .travelerPricings[j].price.base) * 0.1;
                    var children_fee = parseInt(tickets[i].travelerPricings[j].price.total - tickets[i]
                        .travelerPricings[j].price.base);
                    total_price_ticket += (children_price_new + children_fee) * userInput['children'];
                    break;
                }
            }
        }
        if (userInput['infants'] > 0) {
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                    var infants_price_new = parseInt(tickets[i].travelerPricings[j].price.base) + parseInt(tickets[
                            i]
                        .travelerPricings[j].price.base) * 0.1;
                    var infants_fee = parseInt(tickets[i].travelerPricings[j].price.total - tickets[i]
                        .travelerPricings[
                            j].price.base);
                    total_price_ticket += (infants_price_new + infants_fee) * userInput['infants'];
                    break;
                }
            }
        }

        //Đổ dữ liệu các vé
        tickets_text += "<div class='flight-item' value='" + tickets[i].itineraries[0].segments[0].operating
            .carrierCode + "' id-ticket='" + tickets[i].id + "'>";
        tickets_text += "<div class='flight-info'>";
        tickets_text += "<div class='flight-img'>";
        tickets_text += "<div class='box-img'>";
        tickets_text += "<img src='<?php base_url() ?>" + GetAirlinesImageByIATA(tickets[i].itineraries[0].segments[0]
            .operating.carrierCode) + "'/>";
        tickets_text += "</div></div>";
        tickets_text += "<div class='flight-from'>";
        tickets_text += "<div class='flight-city'>" + GetCityNameByIATA(userInput['origin']) + "</div>";
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
        tickets_text += "<div class='flight-city'>" + GetCityNameByIATA(userInput['destination']) +
            "</div>";
        tickets_text += "<div class='flight-time'>" + DateOrTimeString(tickets[i].itineraries[0].segments[tickets[i]
            .itineraries[0].segments
            .length - 1].arrival.at, 'time') + "</div>";
        tickets_text += "</div>";
        tickets_text += "<div class='flight-price-choose'>";
        tickets_text += "<div class='flight-price'><span>" + NumberWithCommas(parseInt(includetaxes == true ?
                adults_price_new + adults_fee : adults_price_new)) +
            "</span><span>VND</span>" + "</div>";
        tickets_text += "<button>Chọn chuyến bay</button>";
        tickets_text += "</div></div>";
        tickets_text += "<div class='flight-box-detail'>";
        tickets_text += "<div class='flight-detail-item'>";
        tickets_text += "<p class='title-detail'><i class='fas fa-info-circle'></i> Chi tiết chuyến bay</p>";
        //Chi tiết chặng bay
        for (let j in tickets[i].itineraries[0].segments) {
            tickets_text += "<div class='flight-detail-wrap'>";
            tickets_text += "<div class='detail-img'>";
            tickets_text += "<div class='box-img'>";
            tickets_text += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(tickets[i].itineraries[0]
                    .segments[j].carrierCode) + "'value='" + tickets[i].itineraries[0].segments[j].carrierCode +
                "'/>";
            tickets_text += "</div></div>";
            tickets_text += "<div class='detail-from'>";
            tickets_text += "<span>" + GetCityNameByIATA(tickets[i].itineraries[0].segments[j].departure.iataCode) +
                " - " +
                tickets[i].itineraries[0].segments[j].departure.iataCode + "</span>";
            tickets_text += "<span>Sân bay: <span>" + tickets[i].itineraries[0].segments[j].departure.iataCode +
                "</span></span>";
            tickets_text += "<span><p>Cất cánh:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j]
                    .departure
                    .at, 'time') +
                "</p></span>";
            tickets_text += "<span><p>Ngày:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j]
                    .departure
                    .at) +
                "</p></span>";
            tickets_text += "</div>";
            tickets_text += "<div class='detail-to'>";
            tickets_text += "<span>" + GetCityNameByIATA(tickets[i].itineraries[0].segments[j].arrival.iataCode) +
                " - " +
                tickets[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
            tickets_text += "<span>Sân bay: <span>" + tickets[i].itineraries[0].segments[j].arrival.iataCode +
                "</span></span>";
            tickets_text += "<span><p>Hạ cánh:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j]
                .arrival
                .at,
                'time') + "</p></span>";
            tickets_text += "<span><p>Ngày:</p> <p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j].arrival
                    .at) +
                "</p></span>";
            tickets_text += "</div>";
            tickets_text += "<div class='detail-flight'>";
            tickets_text += "<span><p>Chuyến bay:</p><p>" + tickets[i].itineraries[0].segments[j].number +
                "</p></span>";
            tickets_text += "<span><p>Thời gian bay:</p><p>" + tickets[i].itineraries[0].segments[j].duration
                .replace(
                    "PT",
                    "") + "</p></span>";
            tickets_text += "<span><p>Hàng:</p><p>" + tickets[i].travelerPricings[0].fareDetailsBySegment[0].class +
                "</p></span>";
            tickets_text += "<span><p>Hạng:</p><p>" + tickets[i].travelerPricings[0].fareDetailsBySegment[0].cabin +
                "</p></span>";
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
        tickets_text += "<ul class='detail-fare adults'>";
        tickets_text += "<li class='person'>Người lớn</li>";
        tickets_text += "<li class='amount'>" + userInput['adults'] + "</li>";
        tickets_text += "<li class='price'>" + NumberWithCommas(adults_price_new) + "</li>";
        tickets_text += "<li class='taxes'>" + NumberWithCommas(adults_fee) + "</li>";
        tickets_text += "<li class='total'>" + NumberWithCommas((adults_price_new + adults_fee) * userInput[
                'adults']) +
            "</li>";
        tickets_text += "</ul>";
        if (userInput['children'] > 0) {
            tickets_text += "<ul class='detail-fare children'>";
            tickets_text += "<li class='person'>Trẻ em</li>";
            tickets_text += "<li class='amount'>" + userInput['children'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "CHILD") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(children_price_new) + "</li>";
                    tickets_text += "<li class='taxes'>" + NumberWithCommas(children_fee) + "</li>";
                    tickets_text += "<li class='total'>" + NumberWithCommas((children_price_new + children_fee) *
                        userInput['children']) + "</li>";
                    break;
                }
            }
            tickets_text += "</ul>";
        }
        if (userInput['infants'] > 0) {
            tickets_text += "<ul class='detail-fare infants'>";
            tickets_text += "<li class='person'>Em bé</li>";
            tickets_text += "<li class='amount'>" + userInput['infants'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(infants_price_new) + "</li>";
                    tickets_text += "<li class='taxes'>" + NumberWithCommas(infants_fee) + "</li>";
                    tickets_text += "<li class='total'>" + NumberWithCommas((infants_price_new + infants_fee) *
                        userInput['infants']) + "</li>";
                    break;
                }
            }
            tickets_text += "</ul>";
        }
        tickets_text += "<div class='detail-total'>";
        tickets_text += "<span class='total-title'>Tổng tiền: </span>";
        tickets_text += "<span class='total-price' baseprice='" + tickets[i].price.total + "'><span>" +
            NumberWithCommas(total_price_ticket) +
            "</span>VND </span>";
        tickets_text += "</div></div></div></div></div>";
    }
    if ($("#filter-content-di").hasClass("chose_active") == false) {
        $("#filter-content-di .filter-main").html(tickets_text);
    }

    //Hiển thị vé lượt về
    if (userInput.type == 'roundtrip') {
        var tickets_text2 = "";
        for (let i in tickets2) {
            //Tính giá + 10%
            var adults_price_new = parseInt(tickets2[i].travelerPricings[0].price.base) + parseInt(tickets2[i]
                .travelerPricings[0].price.base) * 0.1;
            var adults_fee = parseInt(tickets2[i].travelerPricings[0].price.total - tickets2[i].travelerPricings[0]
                .price
                .base);
            var total_price_ticket = (adults_price_new + adults_fee) * userInput['adults'];
            if (userInput['children'] > 0) {
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "CHILD") {
                        var children_price_new = parseInt(tickets2[i].travelerPricings[j].price.base) + parseInt(
                            tickets2[i]
                            .travelerPricings[j].price.base) * 0.1;
                        var children_fee = parseInt(tickets2[i].travelerPricings[j].price.total - tickets2[i]
                            .travelerPricings[j].price.base);
                        total_price_ticket += (children_price_new + children_fee) * userInput['children'];
                        break;
                    }
                }
            }
            if (userInput['infants'] > 0) {
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                        var infants_price_new = parseInt(tickets2[i].travelerPricings[j].price.base) + parseInt(
                            tickets2[i]
                            .travelerPricings[j].price.base) * 0.1;
                        var infants_fee = parseInt(tickets2[i].travelerPricings[j].price.total - tickets2[i]
                            .travelerPricings[
                                j].price.base);
                        total_price_ticket += (infants_price_new + infants_fee) * userInput['infants'];
                        break;
                    }
                }
            }


            tickets_text2 += "<div class='flight-item' value='" + tickets2[i].itineraries[0].segments[0].operating
                .carrierCode + "' id-ticket='" + tickets2[i].id + "'>";
            tickets_text2 += "<div class='flight-info'>";
            tickets_text2 += "<div class='flight-img'>";
            tickets_text2 += "<div class='box-img'>";
            tickets_text2 += "<img src='<?php base_url() ?>" + GetAirlinesImageByIATA(tickets2[i].itineraries[0]
                .segments[0].operating.carrierCode) + "'/>";
            tickets_text2 += "</div></div>";
            tickets_text2 += "<div class='flight-from'>";
            tickets_text2 += "<div class='flight-city'>" + GetCityNameByIATA(userInput['destination']) +
                "</div>";
            tickets_text2 += "<div class='flight-time'>" + DateOrTimeString(tickets2[i].itineraries[0].segments[0]
                .departure
                .at, 'time') + "</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-wrap-detail'>";
            if (tickets2[i].itineraries[0].segments.length > 1) {
                tickets_text2 += "<div class='flight-number-code'>" + (tickets2[i].itineraries[0].segments.length -
                        1) +
                    " điểm dừng</div>";
            } else {
                tickets_text2 += "<div class='flight-number-code'>" + tickets2[i].itineraries[0].segments[0]
                    .operating
                    .carrierCode + "" + tickets2[i].itineraries[0].segments[0].number + "</div>";
            }
            tickets_text2 += "<div class='flight-line'></div>";
            tickets_text2 += "<div class='flight-detail'>Chi tiết</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-to'>";
            tickets_text2 += "<div class='flight-city'>" + GetCityNameByIATA(userInput['origin']) +
                "</div>";
            tickets_text2 += "<div class='flight-time'>" + DateOrTimeString(tickets2[i].itineraries[0].segments[
                tickets2[i]
                .itineraries[0].segments
                .length - 1].arrival.at, 'time') + "</div>";
            tickets_text2 += "</div>";
            tickets_text2 += "<div class='flight-price-choose'>";
            tickets_text2 += "<div class='flight-price'><span>" + NumberWithCommas(parseInt(includetaxes == true ?
                    adults_price_new + adults_fee : adults_price_new)) +
                "</span><span>VND</span>" + "</div>";
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
                        .segments[j].carrierCode) + "'value='" + tickets2[i].itineraries[0].segments[j]
                    .carrierCode +
                    "'/>";
                tickets_text2 += "</div></div>";
                tickets_text2 += "<div class='detail-from'>";
                tickets_text2 += "<span>" + GetCityNameByIATA(tickets2[i].itineraries[0].segments[j].departure
                        .iataCode) +
                    " - " +
                    tickets2[i].itineraries[0].segments[j].departure.iataCode + "</span>";
                tickets_text2 += "<span>Sân bay: <span>" + tickets2[i].itineraries[0].segments[j].departure
                    .iataCode +
                    "</span></span>";
                tickets_text2 += "<span><p>Cất cánh:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[
                            j]
                        .departure
                        .at, 'time') +
                    "</p></span>";
                tickets_text2 += "<span><p>Ngày:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[j]
                        .departure
                        .at) +
                    "</p></span>";
                tickets_text2 += "</div>";
                tickets_text2 += "<div class='detail-to'>";
                tickets_text2 += "<span>" + GetCityNameByIATA(tickets2[i].itineraries[0].segments[j].arrival
                        .iataCode) +
                    " - " +
                    tickets2[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
                tickets_text2 += "<span>Sân bay: <span>" + tickets2[i].itineraries[0].segments[j].arrival.iataCode +
                    "</span></span>";
                tickets_text2 += "<span><p>Hạ cánh:</p><p>" + DateOrTimeString(tickets2[i].itineraries[0].segments[
                        j]
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
            tickets_text2 += "<ul class='detail-fare adults'>";
            tickets_text2 += "<li class='person'>Người lớn</li>";
            tickets_text2 += "<li class='amount'>" + userInput['adults'] + "</li>";
            tickets_text2 += "<li class='price'>" + NumberWithCommas(adults_price_new) + "</li>";
            tickets_text2 += "<li class='taxes'>" + NumberWithCommas(adults_fee) + "</li>";
            tickets_text2 += "<li class='total'>" + NumberWithCommas((adults_price_new + adults_fee) * userInput[
                'adults']) + "</li>";
            tickets_text2 += "</ul>";
            if (userInput['children'] > 0) {
                tickets_text2 += "<ul class='detail-fare children'>";
                tickets_text2 += "<li class='person'>Trẻ em</li>";
                tickets_text2 += "<li class='amount'>" + userInput['children'] + "</li>";
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "CHILD") {
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(children_price_new) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(children_fee) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas((children_price_new +
                                children_fee) *
                            userInput['children']) + "</li>";
                        break;
                    }
                }
                tickets_text2 += "</ul>";
            }
            if (userInput['infants'] > 0) {
                tickets_text2 += "<ul class='detail-fare infants'>";
                tickets_text2 += "<li class='person'>Em bé</li>";
                tickets_text2 += "<li class='amount'>" + userInput['infants'] + "</li>";
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(infants_price_new) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(infants_fee) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas((infants_price_new +
                                infants_fee) *
                            userInput['infants']) + "</li>";
                        break;
                    }
                }
                tickets_text2 += "</ul>";
            }
            tickets_text2 += "<div class='detail-total'>";
            tickets_text2 += "<span class='total-title'>Tổng tiền: </span>";
            tickets_text2 += "<span class='total-price' baseprice='" + tickets2[i].price.total + "'><span>" +
                NumberWithCommas(total_price_ticket) +
                "</span>VND </span>";
            tickets_text2 += "</div></div></div></div></div>";
        }
        if ($("#filter-content-ve").hasClass('chose_active') == false) {
            $("#filter-content-ve .filter-main").html(tickets_text2);
        }
    }
}

ShowData(SortPrice);

/*====================================================================================================
=================================== STEP 1 - XỬ LÝ CHỌN CHUYẾN BAY ===================================
====================================================================================================*/

//Số chuyến phải chọn để qua bước 2
var number_ticket = 1;
if (userInput['type'] == 'roundtrip') {
    number_ticket = 2;
}
var number_ticket_chose = 0; //Số chuyến hiện tại đã chọn
var flightTicketChooseHTML = []; //HTML để hồi hiển thị lại
var flightTicketChooseInfo = []; //Thông tin các chuyến bay đã chọn
var priceTotal = 0; //Tổng số tiền
var bill = {}; //Lưu thông tin để chuyển về controller

//Khi bấm vào nút chọn vé
$(document).on('click', '.flight-price-choose button', function() {

    //Lưu html để hiển thị lại
    $(this).parents('.result').find('.flight-item').css('display', 'none');
    $(this).parents('.flight-item').css('display', 'block');
    $(this).parents('.result').addClass('chose_active');
    flightTicketChooseHTML.push('<div class="flight-item" value="' + $(this).parents('.flight-item')
        .attr('value') + '">' + $(this).parents('.flight-item').html() + '</div>');

    //Lưu thông tin của vé đã chọn
    if (number_ticket_chose == 0) {
        flightTicketChooseInfo['origin'] = [];
        flightTicketChooseInfo['destination'] = [];
        flightTicketChooseInfo['departure_date'] = [];
        flightTicketChooseInfo['departure_time'] = [];
        flightTicketChooseInfo['arrival_date'] = [];
        flightTicketChooseInfo['arrival_time'] = [];
        flightTicketChooseInfo['adults_baseprice'] = [];
        flightTicketChooseInfo['adults_fee'] = [];
        flightTicketChooseInfo['children_baseprice'] = [];
        flightTicketChooseInfo['children_fee'] = [];
        flightTicketChooseInfo['infants_baseprice'] = [];
        flightTicketChooseInfo['infants_fee'] = [];
        flightTicketChooseInfo['flight_details'] = [];
        flightTicketChooseInfo['carrier'] = [];
        flightTicketChooseInfo['total_baseprice'] = [];
    }
    flightTicketChooseInfo['origin'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .title-detail + .flight-detail-wrap .detail-from span:nth-child(2)'
    ).text().substr(-3));
    flightTicketChooseInfo['destination'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .flight-detail-wrap:last-child .detail-to span:nth-child(2)'
    ).text().substr(-3));
    flightTicketChooseInfo['carrier'].push($(this).parents('.flight-item').attr('value'));
    flightTicketChooseInfo['total_baseprice'].push(parseInt($(this).parents('.flight-item').find(
        '.detail-total .total-price').attr('baseprice')));
    flightTicketChooseInfo['departure_date'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .title-detail + .flight-detail-wrap .detail-from span:nth-child(4) p:nth-child(2)'
    ).text());
    flightTicketChooseInfo['departure_time'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .title-detail + .flight-detail-wrap .detail-from span:nth-child(3) p:nth-child(2)'
    ).text());
    flightTicketChooseInfo['arrival_date'].push($(this).parents('.flight-item').find(
        '.flight-detail-wrap:last-child .detail-to span:last-child p:nth-child(2)'
    ).text());
    flightTicketChooseInfo['arrival_time'].push($(this).parents('.flight-item').find(
        '.flight-detail-wrap:last-child .detail-to span:nth-child(3) p:nth-child(2)'
    ).text());
    var adults_baseprice = NumberCommasToInt($(this).parents('.flight-item').find(
            '.detail-fare.adults .price')
        .text());
    flightTicketChooseInfo['adults_baseprice'].push(adults_baseprice);
    var adults_fee = NumberCommasToInt($(this).parents('.flight-item').find('.detail-fare.adults .taxes')
        .text());
    flightTicketChooseInfo['adults_fee'].push(adults_fee);
    if (userInput['children'] > 0) {
        var children_baseprice = NumberCommasToInt($(this).parents('.flight-item').find(
            '.detail-fare.children .price').text());
        flightTicketChooseInfo['children_baseprice'].push(children_baseprice);
        var children_fee = NumberCommasToInt($(this).parents('.flight-item').find(
            '.detail-fare.children .taxes').text());
        flightTicketChooseInfo['children_fee'].push(children_fee);
    }
    if (userInput['infants'] > 0) {
        var infants_baseprice = NumberCommasToInt($(this).parents('.flight-item').find(
                '.detail-fare.infants .price')
            .text());
        flightTicketChooseInfo['infants_baseprice'].push(infants_baseprice);
        var infants_fee = NumberCommasToInt($(this).parents('.flight-item').find(
                '.detail-fare.infants .taxes')
            .text());
        flightTicketChooseInfo['infants_fee'].push(infants_fee);
    }

    //Chi tiết từng chặng bay
    $(this).parents('.flight-item').find('.flight-detail-item:first-child .flight-detail-wrap').each(
        function() {
            var detail_flight = {};

            detail_flight['carrierCode'] = $(this).find('.detail-img img').attr('value');
            detail_flight['number'] = $(this).find('.detail-flight span:first-child p:nth-child(2)')
                .text();
            detail_flight['departure_date'] = $(this).find(
                    '.detail-from span:last-child p:nth-child(2)')
                .text();
            detail_flight['departure_time'] = $(this).find(
                    '.detail-from span:nth-child(3) p:nth-child(2)')
                .text();
            detail_flight['arrival_date'] = $(this).find('.detail-to span:last-child p:nth-child(2)')
                .text();
            detail_flight['arrival_time'] = $(this).find(
                    '.detail-to span:nth-child(3) p:nth-child(2)')
                .text();
            detail_flight['from'] = $(this).find('.detail-from span:nth-child(2) span').text();
            detail_flight['to'] = $(this).find('.detail-to span:nth-child(2) span').text();

            flightTicketChooseInfo['flight_details'].push(detail_flight);
        });

    //Xoá nút chọn
    $(this).remove();
    number_ticket_chose++;

    /*====================================================================================================
    ======================================== STEP 2 - NHẬP THÔNG TIN MUA VÉ ==============================
    ====================================================================================================*/
    if (number_ticket_chose == number_ticket) {
        //Ẩn bước 1, hiện bước 2
        $('.filter-tab .filter-step li:nth-child(2)').addClass('active');
        $('.choose').css('display', 'none');
        $('.confirm').css('display', 'flex');

        //Hiển lại chuyến bay đã chọn ở bước 1
        var flight_choose = "";
        for (let i = 0; i < flightTicketChooseHTML.length; i++) {
            flight_choose += flightTicketChooseHTML[i].replace("<button>Chọn chuyến bay</button>", "");
        }
        $('.flight-choose').html(flight_choose);

        //Chuyến bay bảng giá bên trái
        var detail_ticket_text = "";
        for (let i = 0; i < number_ticket_chose; i++) {
            detail_ticket_text += "<div class='detail-ticket'>";
            detail_ticket_text += "<div class='from-to'>";
            detail_ticket_text += "<p>" + flightTicketChooseInfo['origin'][i] + "</p>";
            detail_ticket_text += "<i class='fas fa-long-arrow-alt-right'></i>";
            detail_ticket_text += "<p>" + flightTicketChooseInfo['destination'][i] + "</p>";
            detail_ticket_text += "</div>";
            detail_ticket_text += "<div class='date-time'>";
            detail_ticket_text += "<i class='far fa-clock'></i>";
            detail_ticket_text += "<p class='time'>" + flightTicketChooseInfo['departure_time'][i] +
                "</p>";
            detail_ticket_text += "<p class='date'>" + flightTicketChooseInfo['departure_date'][i] +
                "</p>";
            detail_ticket_text += "</div>";
            detail_ticket_text += "<div class='image'>";
            detail_ticket_text += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(
                flightTicketChooseInfo['carrier'][i]) + "'>";
            detail_ticket_text += "</div></div>";
        }
        $('.detail-ticket-container').html(detail_ticket_text);

        //Đỗ dữ liệu giá tiền
        var price_text = "";

        var total_price = 0
        price_text += "<div class='summary-cart'>";
        price_text += "<p class='people'>Người lớn</p>";
        price_text += "<div class='amount-wrap'>";
        price_text += "<p>" + userInput['adults'] + "</p>";
        price_text += "<p>x</p>";
        var adults_price = 0;
        for (var i in flightTicketChooseInfo['adults_baseprice']) {
            adults_price += flightTicketChooseInfo['adults_baseprice'][i] + flightTicketChooseInfo[
                    'adults_fee']
                [i];
        }
        total_price += adults_price * userInput['adults'];
        price_text += "<p>" + NumberWithCommas(adults_price) + "</p>";
        price_text += "</div>";
        price_text += "<p class='total'>" + NumberWithCommas(adults_price * userInput['adults']) + "</p>";
        price_text += "</div>";

        if (userInput['children'] > 0) {
            price_text += "<div class='summary-cart'>";
            price_text += "<p class='people'>Trẻ em</p>";
            price_text += "<div class='amount-wrap'>";
            price_text += "<p>" + userInput['children'] + "</p>";
            price_text += "<p>x</p>";
            var children_price = 0;
            for (var i in flightTicketChooseInfo['children_baseprice']) {
                children_price += flightTicketChooseInfo['children_baseprice'][i] +
                    flightTicketChooseInfo[
                        'children_fee'][i];
            }
            total_price += children_price * userInput['children'];
            price_text += "<p>" + NumberWithCommas(children_price) + "</p>";
            price_text += "</div>";
            price_text += "<p class='total'>" + NumberWithCommas(children_price * userInput['children']) +
                "</p>";
            price_text += "</div>";
        }

        if (userInput['infants'] > 0) {
            price_text += "<div class='summary-cart'>";
            price_text += "<p class='people'>Trẻ em</p>";
            price_text += "<div class='amount-wrap'>";
            price_text += "<p>" + userInput['infants'] + "</p>";
            price_text += "<p>x</p>";
            var infants_price = 0;
            for (var i in flightTicketChooseInfo['infants_baseprice']) {
                infants_price += flightTicketChooseInfo['infants_baseprice'][i] + flightTicketChooseInfo[
                    'infants_fee'][i];
            }
            total_price += infants_price * userInput['infants'];
            price_text += "<p>" + NumberWithCommas(infants_price) + "</p>";
            price_text += "</div>";
            price_text += "<p class='total'>" + NumberWithCommas(infants_price * userInput['infants']) +
                "</p>";
            price_text += "</div>";
        }
        $('.summary-cart-container').html(price_text);
        $('.detail-summary + .total-price .price p:first-child').text(NumberWithCommas(total_price));

        //Tạo form nhập thông tin
        var customer_text = "";
        for (let i = 0; i < userInput['adults']; i++) {
            customer_text += "<div class='customer-people'>";
            customer_text += "<div class='customer-user'>";
            customer_text += "<i class='fas fa-user-edit'></i>";
            customer_text += "<p>Người lớn " + (i + 1) + "</p>";
            customer_text += "</div>";
            customer_text += "<div class='name'>";
            customer_text +=
                "<input type='text' placeholder='Họ & tên' name='names[]'>";
            customer_text += "</div>";
            customer_text += "<div class ='bag'>";
            customer_text += "<div class ='bag-img'>";
            customer_text +=
                "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA($(
                        '.confirm .box-selected .flight-choose .flight-item:first-child'
                    )
                    .attr('value')) + "'>";
            customer_text += "</div>";
            customer_text += "<select class='bag-select' adults_luggage='" + i +
                "' kg='7kg'>";
            customer_text += '<option value="0" kg="7kg" price="0">7kg: 0 VND</option>';
            customer_text += "</select>";
            customer_text += "</div>";
            customer_text += "</div>";
        }
        for (let i = 0; i < userInput['children']; i++) {
            customer_text += "<div class='customer-people'>";
            customer_text += "<div class='customer-user'>";
            customer_text += "<i class='fas fa-user-edit'></i>";
            customer_text += "<p>Trẻ em " + (i + 1) + "</p>";
            customer_text += "</div>";
            customer_text += "<div class='name'>";
            customer_text +=
                "<input type='text' placeholder='Họ tên' name='names[]'>";
            customer_text += "</div>";
            customer_text += "<div class='date'>";
            customer_text +=
                "<input type='date' placeholder='Ngày sinh' name='dob[]' min='<?= date("Y-m-d", strtotime(' -12 year')) ?>' max='<?= date("Y-m-d", strtotime(' -2 year')) ?>'>";
            customer_text += "</div>";
            customer_text += "<div class ='bag'>";
            customer_text += "<div class ='bag-img'>";
            customer_text +=
                "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA($(
                        '.confirm .box-selected .flight-choose .flight-item:first-child'
                    )
                    .attr('value')) + "'>";
            customer_text += "</div>";
            customer_text += "<select class='bag-select' children_luggage='" + i +
                "' kg='7kg'>";
            customer_text += '<option value="0" kg="7kg" price="0">7kg: 0 VND</option>';
            customer_text += "</select>";
            customer_text += "</div>";
            customer_text += "</div>";
        }
        for (let i = 0; i < userInput['infants']; i++) {
            customer_text += "<div class='customer-people'>";
            customer_text += "<div class='customer-user'>";
            customer_text += "<i class='fas fa-user-edit'></i>";
            customer_text += "<p>Em bé " + (i + 1) + "</p>";
            customer_text += "</div>";
            customer_text += "<div class='name'>";
            customer_text +=
                "<input type='text' placeholder='Họ tên' name='names[]'>";
            customer_text += "</div>";
            customer_text += "<div class='date'>";
            customer_text +=
                "<input type='date' placeholder='Ngày sinh' name='dob[]' min='<?= date("Y-m-d", strtotime(' -2 year')) ?>'>";
            customer_text += "</div></div>";
        }
        $('.info-customer .box-info .box-container').html(customer_text);

        $('.bag-select').focus(function() {
            if ($(this).html() == '<option value="0" kg="7kg" price="0">7kg: 0 VND</option>') {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Finding/GetLuggage') ?>",
                    data: {
                        iata: $(
                                '.confirm .box-selected .flight-choose .flight-item:first-child'
                            )
                            .attr(
                                'value')
                    },
                    dataType: "json",
                    success: function(data) {
                        var txt = "";
                        for (let j in data) {
                            txt += "<option value='" + data[j] + "' kg='" + j +
                                "' price='" +
                                data[j] + "'>" + j + ": " +
                                NumberWithCommas(data[j]) + " VND</option>";
                        }
                        $('.bag-select').html(txt);
                    }
                });
            }
        });
    }
});

/*====================================================================================================
======================================== STEP 3 - XỬ LÝ TẠO HOÁ ĐƠN ==================================
====================================================================================================*/
// Bấm nút quay lại
$(document).on('click', '.button-step button:first-child', function() {
    //Ẩn bước 2, hiện bước 1
    $('.filter-tab .filter-step li:nth-child(2)').removeClass('active');
    $('.choose').css('display', 'flex');
    $('.confirm').css('display', 'none');
    $('.result').removeClass('chose_active');
    ShowData(SortPrice);
    $('.flight-item').css('display', 'block');

    //Reset lại giá trị
    number_ticket_chose = 0;
    flightTicketChooseHTML = [];
    flightTicketChooseInfo = [];
});

//Bấm nút tiếp tục
$(document).on('click', '.button-step button:nth-child(2)', function() {
    var checkInfoStatus = true;

    //Kiểm tra điền đủ thông tin chưa
    $('.box-info input').each(function() {
        if ($(this).val() == '') {
            checkInfoStatus = false;
            $(this).focus();
            $(this).css("border", "1px solid #ef3737");
            return false;
        } else {
            $(this).css("border", "1px solid #81d742");
        }
    });

    if (checkInfoStatus == true) {
        var confirm_booking = confirm("Xác nhận đặt vé");
        if (confirm_booking == true) {
            priceTotal = NumberCommasToInt($('.confirm .finding-detail .total-price .price p:first-child')
                .text());
            $('.loader-container').removeClass('hide');

            var flightTicketDetailHTML = [];
            var customerNames = [];
            var customerDOB = [];
            var customerLuggage = [];
            var payment = '';
            var luggageFee = 0;

            flightTicketDetailHTML['go'] = [];
            flightTicketDetailHTML['back'] = [];

            //Lấy chi tiết chuyến bay
            $('.confirm .flight-item').each(function(index) {
                if (index == 0) {
                    $(this).find(
                            '.flight-box-detail .flight-detail-item:first-child .flight-detail-wrap'
                        )
                        .each(function() {
                            flightTicketDetailHTML['go'].push(
                                "<div class='flight-detail-wrap'>" +
                                $(this).html() + "</div>");
                        });
                } else {
                    $(this).find(
                        '.flight-box-detail .flight-detail-item:first-child .flight-detail-wrap'
                    ).each(function() {
                        flightTicketDetailHTML['back'].push(
                            "<div class='flight-detail-wrap'>" +
                            $(this).html() + "</div>");
                    });
                }
            });

            //Lấy thông tin người dùng nhập vào
            $('input[name="names[]"]').each(function() {
                customerNames.push($(this).val());
            });
            $('input[name="dob[]"]').each(function() {
                customerDOB.push($(this).val());
            });
            $('.bag-select').each(function() {
                var obj = {};
                obj[$(this).attr('kg')] = $(this).val();
                customerLuggage.push(obj);
                console.log(customerLuggage);
            });
            $('.summary-cart.luggage').each(function() {
                luggageFee += NumberCommasToInt($(this).find('.total').text());
            });
            $('.option-payment .payment-method').each(function() {
                if ($(this).hasClass('active')) {
                    payment = $(this).find('.title p').text();
                    return false;
                }
            });

            //Tạo dữ liệu để lưu vào database
            bill['type'] = userInput['type'];
            bill['origin'] = userInput['origin'];
            bill['destination'] = userInput['destination'];
            bill['departure_date'] = flightTicketChooseInfo['departure_date'][0];
            bill['departure_time'] = flightTicketChooseInfo['departure_time'][0];
            bill['departure_landing_date'] = flightTicketChooseInfo['arrival_date'][0];
            bill['departure_landing_time'] = flightTicketChooseInfo['arrival_time'][0];
            if (userInput['type'] == 'roundtrip') {
                bill['return_date'] = flightTicketChooseInfo['departure_date'][1];
                bill['return_time'] = flightTicketChooseInfo['departure_time'][1];
                bill['return_landing_date'] = flightTicketChooseInfo['arrival_date'][1];
                bill['return_landing_time'] = flightTicketChooseInfo['arrival_time'][1];
            }
            bill['adults'] = userInput['adults'];
            var badults_price = 0;
            var badults_fee = 0;
            for (var i in flightTicketChooseInfo['adults_baseprice']) {
                badults_price += flightTicketChooseInfo['adults_baseprice'][i];
                badults_fee += flightTicketChooseInfo['adults_fee'][i];
            }
            bill['adults_baseprice'] = badults_price;
            bill['adults_fee'] = badults_fee;
            bill['adults_names'] = [];
            bill['adults_luggage'] = [];
            customerIndex = 0;
            for (customerIndex; customerIndex < userInput['adults']; customerIndex++) {
                bill['adults_names'].push(customerNames[customerIndex]);
                bill['adults_luggage'].push(customerLuggage[customerIndex]);
                console.log(customerLuggage[customerIndex]);
            }
            if (userInput['children'] > 0) {
                bill['children'] = userInput['children'];
                var bchildren_price = 0;
                var bchildren_fee = 0;
                for (var i in flightTicketChooseInfo['children_baseprice']) {
                    bchildren_price += flightTicketChooseInfo['children_baseprice'][i];
                    bchildren_fee += flightTicketChooseInfo['children_fee'][i];
                }
                bill['children_baseprice'] = bchildren_price;
                bill['children_fee'] = bchildren_fee;
                bill['children_names'] = [];
                bill['children_luggage'] = [];
                for (customerIndex; customerIndex < parseInt(userInput['adults']) + parseInt(userInput[
                        'children']); customerIndex++) {
                    bill['children_names'].push(customerNames[customerIndex]);
                    bill['children_luggage'].push(customerLuggage[customerIndex]);
                }
                bill['children_dob'] = [];
                for (let i = 0; i < parseInt(userInput['children']); i++) {
                    bill['children_dob'].push(customerDOB[i]);
                }
            }
            if (userInput['infants'] > 0) {
                bill['infants'] = userInput['infants'];
                var binfants_price = 0;
                var binfants_fee = 0;
                for (var i in flightTicketChooseInfo['infants_baseprice']) {
                    binfants_price += flightTicketChooseInfo['infants_baseprice'][i];
                    binfants_fee += flightTicketChooseInfo['infants_fee'][i];
                }
                bill['infants_baseprice'] = binfants_price;
                bill['infants_fee'] = binfants_fee;
                bill['infants_names'] = [];
                for (customerIndex; customerIndex < parseInt(userInput['adults']) + (parseInt(userInput[
                        'children']) > 0 ? parseInt(userInput['children']) : 0) + parseInt(userInput[
                        'infants']); customerIndex++) {
                    bill['infants_names'].push(customerNames[customerIndex]);
                }
                bill['infants_dob'] = [];
                for (let i = (userInput['children'] == "" ? 0 : parseInt(userInput['children'])); i < ((
                            userInput['children'] == "" ? 0 : parseInt(userInput['children'])) +
                        parseInt(
                            userInput['infants'])); i++) {
                    bill['infants_dob'].push(customerDOB[i]);
                }
            }
            bill['total_price'] = priceTotal;
            bill['flight_detail'] = flightTicketChooseInfo['flight_details'];
            var d = new Date();
            var booking_dt = ZeroPad(d.getDate(), 10) + '-' + ZeroPad((d.getMonth() + 1), 10) + '-' + d
                .getFullYear() + ' ' + ZeroPad(d.getHours(), 10) + ':' + ZeroPad(d.getMinutes(), 10) +
                ':' +
                ZeroPad(d.getSeconds(), 10);
            bill['booking_datetime'] = booking_dt;
            bill['contact_name'] = $('input[name="name"]').val();
            bill['contact_phone'] = $('input[name="phone"]').val();
            bill['contact_mail'] = $('input[name="email"]').val();
            bill['contact_address'] = $('input[name="address"]').val();
            bill['contact_note'] = $('textarea[name="note"]').val();
            bill['payment_method'] = payment;
            var oprice = 0;
            for (let i in flightTicketChooseInfo['total_baseprice']) {
                oprice += flightTicketChooseInfo['total_baseprice'][i];
            }
            bill['old_price'] = oprice + luggageFee;
            bill['class'] = userInput['class'];

            //Gọi ajax lưu vào database
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/Order/CreateOrder') ?>",
                data: {
                    dulieu: bill
                },
                dataType: "json",
                success: function(response) {
                    if (response == 'Đặt vé thành công') {
                        //Chuyển giao diện
                        $('.choose').css('display', 'none');
                        $('.confirm').css('display', 'none');
                        $('.finish-payment').css('display', 'block');
                        $('.filter-tab .filter-step li:nth-child(3)').addClass('active');
                        $('.loader-container').addClass('hide');

                        //Đổ dữ liệu
                        var goDetailHTML = "<div class='title-flight'> " +
                            GetCityNameByIATA(
                                userInput['origin']) +
                            "<i class='fas fa-long-arrow-alt-right'></i>" +
                            GetCityNameByIATA(
                                userInput[
                                    'destination']) + "</div>";
                        for (let i = 0; i < flightTicketDetailHTML['go'].length; i++) {
                            goDetailHTML += flightTicketDetailHTML['go'][i];
                        }
                        $('.flight-detail-container .go').html(goDetailHTML);

                        if (userInput['type'] == 'roundtrip') {
                            var backDetailHTML = "<div class='title-flight'> " +
                                GetCityNameByIATA(
                                    userInput[
                                        'destination']) +
                                "<i class='fas fa-long-arrow-alt-right'></i>" +
                                GetCityNameByIATA(
                                    userInput[
                                        'origin']) + "</div>";
                            for (let i = 0; i < flightTicketDetailHTML['back']
                                .length; i++) {
                                backDetailHTML += flightTicketDetailHTML['back'][i];
                            }
                            $('.flight-detail-container .back').html(backDetailHTML);
                        }

                        $('.finish-payment .contact-detail .name p:nth-child(2)').text($(
                            'input[name="name"]').val());
                        $('.finish-payment .contact-detail .phone p:nth-child(2)').text(
                            $('input[name="phone"]').val());
                        $('.finish-payment .contact-detail .email p:nth-child(2)').text(
                            $('input[name="email"]').val());
                        $('.finish-payment .contact-detail .address p:nth-child(2)')
                            .text($('input[name="address"]').val());
                        $('.finish-payment .contact-detail .request p:nth-child(2)')
                            .text($('textarea[name="note"]').val());
                        $('.finish-payment .contact-detail .method p:nth-child(2)').text(
                            payment);

                        var priceHTML =
                            "<div class='info-heading'><p>STT</p><p>Hành khách</p><p>Tổng</p></div>";
                        var customerIndex = 0;
                        for (customerIndex; customerIndex < userInput[
                                'adults']; customerIndex++) {
                            priceHTML += "<div class='info-body'>";
                            priceHTML += "<p>" + (customerIndex + 1) + "</p>";
                            priceHTML += "<p>" + customerNames[customerIndex] + "</p>";
                            var fadults_price = 0;
                            for (let i in flightTicketChooseInfo['adults_baseprice']) {
                                fadults_price += flightTicketChooseInfo[
                                        'adults_baseprice'][i] +
                                    flightTicketChooseInfo['adults_fee'][i];
                            }
                            priceHTML += "<p>" + NumberWithCommas(fadults_price) +
                                "</p>";
                            priceHTML += "</div>";
                        }
                        for (customerIndex; customerIndex < parseInt(userInput[
                                'adults']) +
                            parseInt(userInput['children']); customerIndex++) {
                            priceHTML += "<div class='info-body'>";
                            priceHTML += "<p>" + (customerIndex + 1) + "</p>";
                            priceHTML += "<p>" + customerNames[customerIndex] + "</p>";
                            var fchildren_price = 0;
                            for (let i in flightTicketChooseInfo[
                                    'children_baseprice']) {
                                fchildren_price += flightTicketChooseInfo[
                                        'children_baseprice'][i] +
                                    flightTicketChooseInfo['children_fee'][i];
                            }
                            priceHTML += "<p>" + NumberWithCommas(fchildren_price) +
                                "</p>";
                            priceHTML += "</div>";
                        }
                        for (customerIndex; customerIndex < parseInt(userInput[
                                'adults']) + (
                                parseInt(userInput['children']) > 0 ? parseInt(
                                    userInput[
                                        'children']) : 0) + parseInt(userInput[
                                'infants']); customerIndex++) {
                            priceHTML += "<div class='info-body'>";
                            priceHTML += "<p>" + (customerIndex + 1) + "</p>";
                            priceHTML += "<p>" + customerNames[customerIndex] + "</p>";
                            var finfants_price = 0;
                            for (let i in flightTicketChooseInfo['infants_baseprice']) {
                                finfants_price += flightTicketChooseInfo[
                                        'infants_baseprice'][i] +
                                    flightTicketChooseInfo['infants_fee'][i];
                            }
                            priceHTML += "<p>" + NumberWithCommas(finfants_price) +
                                "</p>";
                            priceHTML += "</div>";
                        }
                        for (var i in bill['adults_luggage']) {
                            for (var j in bill['adults_luggage'][i]) {
                                if (j != '7kg') {
                                    priceHTML += "<div class='info-body'>";
                                    priceHTML += "<p>" + (++customerIndex) + "</p>";
                                    priceHTML += "<p> Hành lý người lớn " + (parseInt(
                                            i) + 1) +
                                        " (" + j +
                                        ")</p>";
                                    priceHTML += "<p> " + NumberWithCommas(bill[
                                            'adults_luggage'][i]
                                        [
                                            j
                                        ]) + "</p></div>";
                                }
                            }
                        }
                        for (var i in bill['children_luggage']) {
                            for (var j in bill['children_luggage'][i]) {
                                if (j != '7kg') {
                                    priceHTML += "<div class='info-body'>";
                                    priceHTML += "<p>" + (++customerIndex) + "</p>";
                                    priceHTML += "<p> Hành lý trẻ em " + (parseInt(
                                            i) + 1) +
                                        " (" + j +
                                        ")</p>";
                                    priceHTML += "<p> " + NumberWithCommas(bill[
                                        'children_luggage'][
                                        i
                                    ][
                                        j
                                    ]) + "</p></div>";
                                }
                            }
                        }
                        priceHTML +=
                            "<div class='info-footer'><p>Tổng chi phí:</p><span>";
                        priceHTML += "<p>" + NumberWithCommas(priceTotal) + "</p>";
                        priceHTML += "<p>VND</p></span></div>";

                        $('.info-table').html(priceHTML);
                        $(document).scrollTop(0);
                        toastr["success"](response);
                    } else {
                        toastr["error"](response);
                    }
                }
            });
        }
    }
});

/*====================================================================================================
======================================== CÁC XỬ LÝ KHÁC ==============================================
====================================================================================================*/
$(document).ready(function() {

    //Hiển thị chi tiết chuyến bay
    $(document).on("click", ".flight-detail", function() {
        $(this).parents(".flight-info").next(".flight-box-detail").slideToggle();
    });

    //Chế độ xem theo giá cơ bản hoặc giá bao gồm thuế phí
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

    //Lọc hãng bay
    $(".finding-airline__airline li").click(function() {
        var a = $(this).attr("value");

        if (a == "all") {
            $(".finding-airline__airline li .checkmark").addClass("active");
            $('#filter-content .result:not(.chose_active)').find('.flight-item').css("display",
                "block");
        } else {
            $(".finding-airline__airline li")
                .not(this)
                .find(".checkmark")
                .removeClass("active");
            $(this).find(".checkmark").addClass("active");

            $('#filter-content .result:not(.chose_active) .flight-item').each(function() {
                if ($(this).attr('value') != a) {
                    $(this).css("display", "none");
                } else {
                    $(this).css("display", "block");
                }
            });
        }
    });

    // Phương thức thanh toán
    $(".payment-method:first-child").addClass('active');
    $(".payment-method").click(function() {
        $(".payment-method").not(this).removeClass('active');
        $(this).addClass('active');
    });

    //Chọn thêm hành lý
    $(document).on('change', '.bag-select', function() {
        $(this).attr('kg', $(this).find("option[value='" + $(this).val() + "']").attr('kg'));

        if ($(this).attr('adults_luggage') != undefined) {
            var index = $(this).attr('adults_luggage');
            if ($(this).val() == 0) {
                $('.summary-cart-container > div').each(function() {
                    if ($(this).attr('adults_luggage') == index) {
                        $(this).remove();
                        return false;
                    }
                });
            } else {
                var option = $(this).find("option[value='" + $(this).val() + "']");
                var kg = option.attr('kg');
                var price = option.attr('price');
                $('.summary-cart-container > div').each(function(i) {
                    if ($(this).attr('adults_luggage') == index) {
                        $(this).find('div.amount-wrap > p').text(kg);
                        $(this).find('p.total').text(NumberWithCommas(price));
                        return false;
                    } else if (i == $('.summary-cart-container > div').length - 1) {
                        var txt =
                            "<div class='summary-cart luggage' adults_luggage='" +
                            index +
                            "'>";
                        txt += "<p>Hành lý người lớn " + (parseInt(index) + 1) +
                            "</p>";
                        txt += "<div class='amount-wrap'><p>" + kg + "</p></div>";
                        txt += "<p class='total'>" + NumberWithCommas(price) +
                            "</p></div>";
                        $('.summary-cart-container').append(txt);
                        return false;
                    }
                });
            }
            var total = 0;
            $('.summary-cart-container .summary-cart').each(function() {
                total += NumberCommasToInt($(this).find('p.total').text());
            });
            $('.total-price .price p:first-child').text(NumberWithCommas(total));
        }
        //Trẻ em
        else {
            var index = $(this).attr('children_luggage');
            if ($(this).val() == 0) {
                $('.summary-cart-container > div').each(function() {
                    if ($(this).attr('children_luggage') == index) {
                        $(this).remove();
                        return false;
                    }
                });
            } else {
                var option = $(this).find("option[value='" + $(this).val() + "']");
                var kg = option.attr('kg');
                var price = option.attr('price');
                $('.summary-cart-container > div').each(function(i) {
                    if ($(this).attr('children_luggage') == index) {
                        $(this).find('div.amount-wrap > p').text(kg);
                        $(this).find('p.total').text(NumberWithCommas(price));
                        return false;
                    } else if (i == $('.summary-cart-container > div').length - 1) {
                        var txt =
                            "<div class='summary-cart luggage' children_luggage='" +
                            index + "'>";
                        txt += "<p>Hành lý trẻ em " + (parseInt(index) + 1) +
                            "</p>";
                        txt += "<div class='amount-wrap'><p>" + kg + "</p></div>";
                        txt += "<p class='total'>" + NumberWithCommas(price) +
                            "</p></div>";
                        $('.summary-cart-container').append(txt);
                        return false;
                    }
                });
            }
            var total = 0;
            $('.summary-cart-container .summary-cart').each(function() {
                total += NumberCommasToInt($(this).find('p.total').text());
            });
            $('.total-price .price p:first-child').text(NumberWithCommas(total));
        }
    });
});
</script>