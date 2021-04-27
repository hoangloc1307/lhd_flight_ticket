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
                        <li class="col l-4">
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
                        <div id="filter-content-di" class="result">
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
                    <div class="col l-4">
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

                    <div class="col l-8">
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
                                        <input type="text" name="" id="" placeholder="Họ & Tên">
                                        <p class="box-phone">Điện thoại</p>
                                        <input type="number" name="" id="" placeholder="Điện thoại">
                                        <p class="box-phone">Email</p>
                                        <input type="mail" name="" id="" placeholder="Email">
                                        <p class="box-phone">Địa chỉ</p>
                                        <input type="text" name="" id="" placeholder="Địa chỉ">
                                    </div>
                                    <div class="box-note">
                                        <p>Ghi chú</p>
                                        <textarea name="" id="" cols="30" rows="13"></textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="payment flight-selected__base">
                                <h3 class="header">
                                    Phương thức thanh toán
                                </h3>
                                <div class="box-option">
                                    <ul class="option-payment">
                                        <li class="payment-method">
                                            <div class="title">
                                                <i class="far fa-check-circle active"></i>
                                                <p>Thanh toán tại văn phòng FlightTicket</p>
                                            </div>
                                            <div class="content active">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                            </div>
                                        </li>
                                        <li class="payment-method">
                                            <div class="title">
                                                <i class="far fa-check-circle"></i>
                                                <p>Thanh toán tận nơi</p>
                                            </div>
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                            </div>
                                        </li>
                                        <li class="payment-method">
                                            <div class="title">
                                                <i class="far fa-check-circle"></i>
                                                <p>Thanh toán online</p>
                                            </div>
                                            <div class="content">
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                    Sapiente itaque, eveniet minus eligendi eaque veniam,
                                                    iste sit a ut delectus, deserunt error esse repellat.
                                                    Numquam fugiat magni ipsam ullam repellendus?
                                                </p>
                                            </div>
                                        </li>
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
                            <div class="flight-detail-wrap">
                                <div class="detail-img">
                                    <div class="box-img">
                                        <img src="<?= base_url() ?>assets/images/partner/vietjetair.png" />
                                    </div>
                                </div>
                                <div class="detail-from">
                                    <span>Tp. Hồ Chí Minh - SGN</span>
                                    <span>Sân bay: SGN</span>
                                    <span>
                                        <p>Cất cánh:</p>
                                        <p>20:15</p>
                                    </span>
                                    <span>
                                        <p>Ngày:</p>
                                        <p>26-4-2021</p>
                                    </span>
                                </div>
                                <div class="detail-to">
                                    <span>Đà Lạt - DLI</span>
                                    <span>Sân bay: DLI</span>
                                    <span>
                                        <p>Hạ cánh:</p>
                                        <p>21:10</p>
                                    </span>
                                    <span>
                                        <p>Ngày:</p>
                                        <p>26-4-2021</p>
                                    </span>
                                </div>
                                <div class="detail-flight">
                                    <span>
                                        <p>Chuyến bay:</p>
                                        <p>362</p>
                                    </span>
                                    <span>
                                        <p>Thời gian bay:</p>
                                        <p>55M</p>
                                    </span>
                                    <span>
                                        <p>Hàng:</p>
                                        <p>J</p>
                                    </span>
                                    <span>
                                        <p>Hạng:</p>
                                        <p>ECONOMY</p>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="info">
                            <h4 class="title">
                                <i class="fas fa-info-circle"></i> Thông tin khách hàng và giá vé
                            </h4>
                            <div class="info-detail">
                                <div class="info-table">

                                    <div class="info-heading">
                                        <p>STT</p>
                                        <p>Hành khách</p>
                                        <p>Giới tính</p>
                                        <p>Tổng</p>
                                    </div>
                                    <div class="info-body">
                                        <p>1</p>
                                        <p>Nguyễn Trung Hiếu</p>
                                        <p>Nam</p>
                                        <p>760.900</p>
                                    </div>
                                    <div class="info-body">
                                        <p>2</p>
                                        <p>Nguyễn Văn A</p>
                                        <p>Nam</p>
                                        <p>200.900</p>
                                    </div>
                                    <div class="info-footer">
                                        <p>Tổng chi phí:</p>
                                        <span>
                                            <p>960.900</p>
                                            <p>VND</p>
                                        </span>
                                    </div>
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
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste
                                                maxime alias veniam veritatis placeat tempora molestias
                                                minima pariatur quidem mollitia, dolorem perspiciatis magnam
                                                sit velit id magni? Dolore, nam quas.</p>
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
var flightData = JSON.parse('<?= $flight_data ?>');
var userInput = <?= $user_input ?>;
var carriers = flightData['dictionaries']['carriers'];
var tickets = flightData['data'];
if (userInput.type === 'roundtrip') {
    var flightData2 = JSON.parse('<?= isset($flight_data2) ? $flight_data2 : '' ?>');
    var tickets2 = flightData2['data'];
}

var includetaxes = false;

//Danh sách hãng hàng không
var carriers_text = "<li value='all'><span class='checkmark active'></span><span>Tất cả các hãng</span></li>";
for (var i in carriers) {
    carriers_text += "<li value=" + i + "><span class='checkmark active'></span>";
    carriers_text += "<span>" + carriers[i] + "</span></li>";
}
$('.finding-airline__airline .box').html(carriers_text);

// Hiển thị dữ liệu chuyến bay
function ShowData(sortFunction) {
    //Sắp xếp lại dữ liệu trả về
    tickets.sort(sortFunction);
    if (userInput.type == 'roundtrip') {
        tickets2.sort(sortFunction);
    }
    //Hiển thị vé lượt đi
    var tickets_text = "";
    for (let i in tickets) {
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
        tickets_text += "<div class='flight-price'><span>" + NumberWithCommas(parseInt(includetaxes == true ? tickets[
                    i]
                .travelerPricings[0].price.total : tickets[i].travelerPricings[0].price.base)) +
            "</span><span>VND</span>" + "</div>";
        tickets_text += "<button>Chọn chuyến bay</button>";
        tickets_text += "</div></div>";
        tickets_text += "<div class='flight-box-detail'>";
        tickets_text += "<div class='flight-detail-item'>";
        tickets_text += "<p class='title-detail'><i class='fas fa-info-circle'></i> Chi tiết chuyến bay</p>";
        for (let j in tickets[i].itineraries[0].segments) {
            tickets_text += "<div class='flight-detail-wrap'>";
            tickets_text += "<div class='detail-img'>";
            tickets_text += "<div class='box-img'>";
            tickets_text += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(tickets[i].itineraries[0]
                .segments[j]
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
            tickets_text += "<span><p>Ngày:</p><p>" + DateOrTimeString(tickets[i].itineraries[0].segments[j]
                    .departure
                    .at) +
                "</p></span>";
            tickets_text += "</div>";
            tickets_text += "<div class='detail-to'>";
            tickets_text += "<span>" + GetCityNameByIATA(tickets[i].itineraries[0].segments[j].arrival.iataCode) +
                " - " +
                tickets[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
            tickets_text += "<span>Sân bay: " + tickets[i].itineraries[0].segments[j].arrival.iataCode + "</span>";
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
        tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[0].price.base)) +
            "</li>";
        tickets_text += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[0].price
            .total - tickets[i].travelerPricings[0].price.base)) + "</li>";
        tickets_text += "<li class='total'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[0].price
            .total * userInput['adults'])) + "</li>";
        tickets_text += "</ul>";
        if (userInput['children'] > 0) {
            tickets_text += "<ul class='detail-fare children'>";
            tickets_text += "<li class='person'>Trẻ em</li>";
            tickets_text += "<li class='amount'>" + userInput['children'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "CHILD") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.base)) + "</li>";
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
            tickets_text += "<ul class='detail-fare infants'>";
            tickets_text += "<li class='person'>Em bé</li>";
            tickets_text += "<li class='amount'>" + userInput['infants'] + "</li>";
            for (let j in tickets[i].travelerPricings) {
                if (tickets[i].travelerPricings[j].travelerType == "HELD_INFANT") {
                    tickets_text += "<li class='price'>" + NumberWithCommas(parseInt(tickets[i].travelerPricings[j]
                        .price.base)) + "</li>";
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
    if ($("#filter-content-di").hasClass("chose_active") == false) {
        $("#filter-content-di .filter-main").html(tickets_text);
    }

    //Hiển thị vé lượt về
    if (userInput.type == 'roundtrip') {
        var tickets_text2 = "";
        for (let i in tickets2) {
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
                    tickets2[i].travelerPricings[0].price.total : tickets2[i].travelerPricings[0].price.base)) +
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
                tickets_text2 += "<span>Sân bay: " + tickets2[i].itineraries[0].segments[j].arrival.iataCode +
                    "</span>";
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
            tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[0].price
                .base)) + "</li>";
            tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[0].price
                .total - tickets2[i].travelerPricings[0].price.base)) + "</li>";
            tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i].travelerPricings[0]
                .price.total * userInput['adults'])) + "</li>";
            tickets_text2 += "</ul>";
            if (userInput['children'] > 0) {
                tickets_text2 += "<ul class='detail-fare children'>";
                tickets_text2 += "<li class='person'>Trẻ em</li>";
                tickets_text2 += "<li class='amount'>" + userInput['children'] + "</li>";
                for (let j in tickets2[i].travelerPricings) {
                    if (tickets2[i].travelerPricings[j].travelerType == "CHILD") {
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.base)) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.total - tickets2[i].travelerPricings[j].price.base)) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.total * userInput['children'])) + "</li>";
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
                        tickets_text2 += "<li class='price'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.base)) + "</li>";
                        tickets_text2 += "<li class='taxes'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.total - tickets2[i].travelerPricings[j].price.base)) + "</li>";
                        tickets_text2 += "<li class='total'>" + NumberWithCommas(parseInt(tickets2[i]
                            .travelerPricings[
                                j].price.total * userInput['infants'])) + "</li>";
                        break;
                    }
                }
                tickets_text2 += "</ul>";
            }
            tickets_text2 += "<div class='detail-total'>";
            tickets_text2 += "<span class='total-title'>Tổng tiền: </span>";
            tickets_text2 += "<span class='total-price'><span>" + NumberWithCommas(parseInt(tickets2[i].price
                    .total)) +
                "</span>VND </span>";
            tickets_text2 += "</div></div></div></div></div>";
        }
        if ($("#filter-content-ve").hasClass('chose_active') == false) {
            $("#filter-content-ve .filter-main").html(tickets_text2);
        }
    }
}

ShowData(SortPrice);

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

//Chọn chuyến bay

//Số vé phải chọn để qua bước 2
var number_ticket = 1;
if (userInput['type'] == 'roundtrip') {
    number_ticket = 2;
}
//Vé hiện tại đã chọn
var number_ticket_chose = 0;
var flightTicketChoose = [];
var flightTicketChooseInfo = [];
//Khi bấm vào nút chọn vé
$(document).on('click', '.flight-price-choose button', function() {
    //Lưu html để hiển thị lại
    $(this).parents('.result').find('.flight-item').css('display', 'none');
    $(this).parents('.flight-item').css('display', 'block');
    $(this).parents('.result').addClass('chose_active');
    flightTicketChoose.push('<div class="flight-item" value="' + $(this).parents('.flight-item')
        .attr('value') + '">' + $(this).parents('.flight-item').html() + '</div>');
    //Lưu thông tin của vé đã chọn
    if (number_ticket_chose == 0) {
        flightTicketChooseInfo['origin'] = [];
        flightTicketChooseInfo['destination'] = [];
        flightTicketChooseInfo['date'] = [];
        flightTicketChooseInfo['time'] = [];
        flightTicketChooseInfo['carrier'] = [];
        flightTicketChooseInfo['adults_price'] = [];
        flightTicketChooseInfo['children_price'] = [];
        flightTicketChooseInfo['infants_price'] = [];
    }
    flightTicketChooseInfo['origin'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .detail-from span:nth-child(2)').text().substr(-3));
    flightTicketChooseInfo['destination'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .detail-to span:nth-child(2)').text().substr(-3));
    flightTicketChooseInfo['date'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .title-detail + .flight-detail-wrap .detail-from span:nth-child(4) p:nth-child(2)'
    ).text());
    flightTicketChooseInfo['time'].push($(this).parents('.flight-item').find(
        '.flight-detail-item:first-child .title-detail + .flight-detail-wrap .detail-from span:nth-child(3) p:nth-child(2)'
    ).text());
    flightTicketChooseInfo['carrier'].push($(this).parents('.flight-item').attr('value'));
    var adults_price = parseInt($(this).parents('.flight-item').find('.detail-fare.adults .price').text()
            .replaceAll('.', '')) +
        parseInt($(this).parents('.flight-item').find('.detail-fare.adults .taxes').text().replaceAll('.',
            ''));
    flightTicketChooseInfo['adults_price'].push(adults_price);
    if (userInput['children'] > 0) {
        var children_price = parseInt($(this).parents('.flight-item').find('.detail-fare.children .price')
                .text().replaceAll('.', '')) +
            parseInt($(this).parents('.flight-item').find('.detail-fare.children .taxes').text()
                .replaceAll('.',
                    ''));
        flightTicketChooseInfo['children_price'].push(children_price);
    }
    if (userInput['infants'] > 0) {
        var infants_price = parseInt($(this).parents('.flight-item').find('.detail-fare.infants .price')
                .text().replaceAll('.', '')) +
            parseInt($(this).parents('.flight-item').find('.detail-fare.infants .taxes').text().replaceAll(
                '.',
                ''));
        flightTicketChooseInfo['infants_price'].push(infants_price);
    }

    //Xoá nút chọn
    $(this).remove();
    number_ticket_chose++;

    //Xử lý khi chọn đủ vé
    if (number_ticket_chose == number_ticket) {
        //Ẩn bước 1, hiện bước 2
        $('.filter-tab .filter-step li:nth-child(2)').addClass('active');
        $('.choose').css('display', 'none');
        $('.confirm').css('display', 'flex');

        //Hiển lại 2 vé đã chọn ở bước 1
        var flight_choose = "";
        for (let i = 0; i < flightTicketChoose.length; i++) {
            flight_choose += flightTicketChoose[i].replace("<button>Chọn chuyến bay</button>", "");
        }
        $('.flight-choose').html(flight_choose);

        //Đỗ dữ liệu chuyến bay
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
            detail_ticket_text += "<p class='time'>" + flightTicketChooseInfo['time'][i] + "</p>";
            detail_ticket_text += "<p class='date'>" + flightTicketChooseInfo['date'][i] + "</p>";
            detail_ticket_text += "</div>";
            detail_ticket_text += "<div class='image'>";
            detail_ticket_text += "<img src='<?= base_url() ?>" + GetAirlinesImageByIATA(
                flightTicketChooseInfo[
                    'carrier'][i]) + "'>";
            detail_ticket_text += "</div></div>";
        }
        $('.detail-ticket-container').html(detail_ticket_text);

        //Đỗ dữ liệu giá tiền
        var price_text = "";
        price_text += "<div class='summary-cart'>";
        price_text += "<p class='people'>Người lớn</p>";
        price_text += "<div class='amount-wrap'>";
        price_text += "<p>" + userInput['adults'] + "</p>";
        price_text += "<p>x</p>";
        price_text += "<p>" + NumberWithCommas(flightTicketChooseInfo['adults_price'][0] + (isNaN(
            flightTicketChooseInfo[
                'adults_price'][1]) ? 0 : flightTicketChooseInfo['adults_price'][1])) + "</p>";
        price_text += "</div>";
        price_text += "<p class='total'>" + NumberWithCommas((flightTicketChooseInfo['adults_price'][0] + (
                isNaN(
                    flightTicketChooseInfo['adults_price'][1]) ? 0 : flightTicketChooseInfo[
                    'adults_price'][
                    1
                ])) *
            userInput['adults']) + "</p>";
        price_text += "</div>";
        if (userInput['children'] > 0) {
            price_text += "<div class='summary-cart'>";
            price_text += "<p class='people'>Trẻ em</p>";
            price_text += "<div class='amount-wrap'>";
            price_text += "<p>" + userInput['children'] + "</p>";
            price_text += "<p>x</p>";
            price_text += "<p>" + NumberWithCommas(flightTicketChooseInfo['children_price'][0] + (isNaN(
                flightTicketChooseInfo[
                    'children_price'][1]) ? 0 : flightTicketChooseInfo['children_price'][
                1
            ])) + "</p>";
            price_text += "</div>";
            price_text += "<p class='total'>" + NumberWithCommas((flightTicketChooseInfo['children_price'][
                        0
                    ] +
                    (
                        isNaN(
                            flightTicketChooseInfo['children_price'][1]) ? 0 :
                        flightTicketChooseInfo[
                            'children_price'][
                            1
                        ])) *
                userInput['children']) + "</p>";
            price_text += "</div>";
        }
        if (userInput['infants'] > 0) {
            price_text += "<div class='summary-cart'>";
            price_text += "<p class='people'>Trẻ em</p>";
            price_text += "<div class='amount-wrap'>";
            price_text += "<p>" + userInput['infants'] + "</p>";
            price_text += "<p>x</p>";
            price_text += "<p>" + NumberWithCommas(flightTicketChooseInfo['infants_price'][0] + (isNaN(
                flightTicketChooseInfo[
                    'infants_price'][1]) ? 0 : flightTicketChooseInfo['infants_price'][1])) + "</p>";
            price_text += "</div>";
            price_text += "<p class='total'>" + NumberWithCommas((flightTicketChooseInfo['infants_price'][0] + (
                isNaN(flightTicketChooseInfo['infants_price'][1]) ? 0 : flightTicketChooseInfo[
                    'infants_price'][1])) * userInput['infants']) + "</p>";
            price_text += "</div>";
        }
        $('.summary-cart-container').html(price_text);
        var total_price = ((flightTicketChooseInfo['adults_price'][0] + (isNaN(flightTicketChooseInfo[
            'adults_price'][1]) ? 0 : flightTicketChooseInfo['adults_price'][1])) * userInput['adults']);
        if (userInput['children'] > 0) {
            total_price += ((flightTicketChooseInfo['children_price'][0] + (isNaN(flightTicketChooseInfo[
                'children_price'][1]) ? 0 : flightTicketChooseInfo['children_price'][1])) * userInput[
                'children']);
        }
        if (userInput['infants'] > 0) {
            total_price += ((flightTicketChooseInfo['infants_price'][0] + (isNaN(flightTicketChooseInfo[
                    'infants_price'][1]) ? 0 : flightTicketChooseInfo['infants_price'][1])) *
                userInput['infants']);
        }
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
            customer_text += "<input type='text' placeholder='Họ & tên' name='name[]'>";
            customer_text += "</div></div>";
        }
        for (let i = 0; i < userInput['children']; i++) {
            customer_text += "<div class='customer-people'>";
            customer_text += "<div class='customer-user'>";
            customer_text += "<i class='fas fa-user-edit'></i>";
            customer_text += "<p>Trẻ em " + (i + 1) + "</p>";
            customer_text += "</div>";
            customer_text += "<div class='name'>";
            customer_text += "<input type='text' placeholder='Họ tên' name='name[]'>";
            customer_text += "</div></div>";
        }
        for (let i = 0; i < userInput['infants']; i++) {
            customer_text += "<div class='customer-people'>";
            customer_text += "<div class='customer-user'>";
            customer_text += "<i class='fas fa-user-edit'></i>";
            customer_text += "<p>Em bé " + (i + 1) + "</p>";
            customer_text += "</div>";
            customer_text += "<div class='name'>";
            customer_text += "<input type='text' placeholder='Họ tên' name='name[]'>";
            customer_text += "</div></div>";
        }
        $('.info-customer .box-info .box-container').html(customer_text);
    }

    // Phương thức thanh toán
    $(".payment-method .title").click(function() {
        $(this).parents(".payment-method").find(".content").slideToggle();
    });
});
</script>