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

                <div class="row">
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
                                        <input type="radio" id="price" class="sort" name="sort" value="_price" />
                                        <span class="label-circle"> </span>
                                        <span>Giá chuyến bay</span>
                                    </label>
                                </li>

                                <li class="timeup" onclick="ShowData(SortDepartureTime)">
                                    <label for="timeup" class="label-radio">
                                        <input type="radio" id="timeup" class="sort" name="sort" checked
                                            value="_timeup" />
                                        <span class="label-circle"> </span>
                                        <span>Giờ khởi hành</span>
                                    </label>
                                </li>

                                <li class="timedown" onclick="ShowData(SortArrivalTime)">
                                    <label for="timedown" class="label-radio">
                                        <input type="radio" id="timedown" class="sort" name="sort" value="_timedown" />
                                        <span class="label-circle"> </span>
                                        <span>Giờ hạ cánh</span>
                                    </label>
                                </li>

                                <li class="totaltime" onclick="ShowData(SortDuration)">
                                    <label for="totaltime" class="label-radio">
                                        <input type="radio" id="totaltime" class="sort" name="sort"
                                            value="_totaltime" />
                                        <span class="label-circle"> </span>
                                        <span>Thời gian bay</span>
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
                                        <li value="all">
                                            <span class="checkmark active"> </span>
                                            <span>Tất cả các hãng</span>
                                        </li>

                                        <li value="vn">
                                            <span class="checkmark active"> </span>
                                            <span>VietNam Airlines</span>
                                        </li>

                                        <li value="vj">
                                            <span class="checkmark active"> </span>
                                            <span>Vietjet Air</span>
                                        </li>

                                        <li value="bb">
                                            <span class="checkmark active"> </span>
                                            <span>Bamboo Airways</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="label">
                                    <span>Chọn theo giờ</span>
                                    <i class="far fa-clock"></i>
                                </div>

                                <div class="finding-airline__clock">
                                    <p>Giờ khởi hành</p>
                                    <div class="dropdown" id="lightdropdown">
                                        <div class="dropdown-select">
                                            <span class="dropdown-selected">
                                                00:00 h
                                            </span>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        <div class="dropdown-list">
                                            <ul class="dropdown-show">
                                                <li class="dropdown-item" value="00:00 h">
                                                    00:00 h
                                                </li>
                                                <li class="dropdown-item" value="01:00 h">
                                                    01:00 h
                                                </li>
                                                <li class="dropdown-item" value="02:00 h">
                                                    02:00 h
                                                </li>
                                                <li class="dropdown-item" value="03:00 h">
                                                    03:00 h
                                                </li>
                                                <li class="dropdown-item" value="04:00 h">
                                                    04:00 h
                                                </li>
                                                <li class="dropdown-item" value="05:00 h">
                                                    05:00 h
                                                </li>
                                                <li class="dropdown-item" value="06:00 h">
                                                    06:00 h
                                                </li>
                                                <li class="dropdown-item" value="07:00 h">
                                                    07:00 h
                                                </li>
                                                <li class="dropdown-item" value="08:00 h">
                                                    08:00 h
                                                </li>
                                                <li class="dropdown-item" value="09:00 h">
                                                    09:00 h
                                                </li>
                                                <li class="dropdown-item" value="10:00 h">
                                                    10:00 h
                                                </li>
                                                <li class="dropdown-item" value="11:00 h">
                                                    11:00 h
                                                </li>
                                                <li class="dropdown-item" value="12:00 h">
                                                    12:00 h
                                                </li>
                                                <li class="dropdown-item" value="13:00 h">
                                                    13:00 h
                                                </li>
                                                <li class="dropdown-item" value="14:00 h">
                                                    14:00 h
                                                </li>
                                                <li class="dropdown-item" value="15:00 h">
                                                    15:00 h
                                                </li>
                                                <li class="dropdown-item" value="16:00 h">
                                                    16:00 h
                                                </li>
                                                <li class="dropdown-item" value="17:00 h">
                                                    17:00 h
                                                </li>
                                                <li class="dropdown-item" value="18:00 h">
                                                    18:00 h
                                                </li>
                                                <li class="dropdown-item" value="19:00 h">
                                                    19:00 h
                                                </li>
                                                <li class="dropdown-item" value="20:00 h">
                                                    20:00 h
                                                </li>
                                                <li class="dropdown-item" value="21:00 h">
                                                    21:00 h
                                                </li>
                                                <li class="dropdown-item" value="22:00 h">
                                                    22:00 h
                                                </li>
                                                <li class="dropdown-item" value="23:00 h">
                                                    23:00 h
                                                </li>
                                                <li class="dropdown-item" value="24:00 h">
                                                    24:00 h
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <p>Giờ hạ cánh</p>
                                    <div class="dropdown" id="lightdropdown-2">
                                        <div class="dropdown-select">
                                            <span class="dropdown-selected">
                                                00:00 h
                                            </span>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        <div class="dropdown-list">
                                            <ul class="dropdown-show">
                                                <li class="dropdown-item" value="00:00 h">
                                                    00:00 h
                                                </li>
                                                <li class="dropdown-item" value="01:00 h">
                                                    01:00 h
                                                </li>
                                                <li class="dropdown-item" value="02:00 h">
                                                    02:00 h
                                                </li>
                                                <li class="dropdown-item" value="03:00 h">
                                                    03:00 h
                                                </li>
                                                <li class="dropdown-item" value="04:00 h">
                                                    04:00 h
                                                </li>
                                                <li class="dropdown-item" value="05:00 h">
                                                    05:00 h
                                                </li>
                                                <li class="dropdown-item" value="06:00 h">
                                                    06:00 h
                                                </li>
                                                <li class="dropdown-item" value="07:00 h">
                                                    07:00 h
                                                </li>
                                                <li class="dropdown-item" value="08:00 h">
                                                    08:00 h
                                                </li>
                                                <li class="dropdown-item" value="09:00 h">
                                                    09:00 h
                                                </li>
                                                <li class="dropdown-item" value="10:00 h">
                                                    10:00 h
                                                </li>
                                                <li class="dropdown-item" value="11:00 h">
                                                    11:00 h
                                                </li>
                                                <li class="dropdown-item" value="12:00 h">
                                                    12:00 h
                                                </li>
                                                <li class="dropdown-item" value="13:00 h">
                                                    13:00 h
                                                </li>
                                                <li class="dropdown-item" value="14:00 h">
                                                    14:00 h
                                                </li>
                                                <li class="dropdown-item" value="15:00 h">
                                                    15:00 h
                                                </li>
                                                <li class="dropdown-item" value="16:00 h">
                                                    16:00 h
                                                </li>
                                                <li class="dropdown-item" value="17:00 h">
                                                    17:00 h
                                                </li>
                                                <li class="dropdown-item" value="18:00 h">
                                                    18:00 h
                                                </li>
                                                <li class="dropdown-item" value="19:00 h">
                                                    19:00 h
                                                </li>
                                                <li class="dropdown-item" value="20:00 h">
                                                    20:00 h
                                                </li>
                                                <li class="dropdown-item" value="21:00 h">
                                                    21:00 h
                                                </li>
                                                <li class="dropdown-item" value="22:00 h">
                                                    22:00 h
                                                </li>
                                                <li class="dropdown-item" value="23:00 h">
                                                    23:00 h
                                                </li>
                                                <li class="dropdown-item" value="24:00 h">
                                                    24:00 h
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Flight filter -->
                    </div>

                    <!-- End Filter left -->

                    <!-- Content -->

                    <div id="filter-content" class="col l-8">
                        <!-- Flight name -->
                        <div class="filter-header">
                            <div class="icon">
                                <i class="fas fa-location-arrow"></i>
                            </div>
                            <div class="title">
                                <div class="title-flight">
                                    <h5><?= $fdata['origin'] ?></h5>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                    <h5><?= $fdata['destination'] ?></h5>
                                </div>
                                <p class="date"><?= $fdata['department'] ?></p>
                            </div>
                        </div>
                        <!-- End Flight name -->

                        <!-- Flight date-day -->
                        <!-- <ul class="filter-list-date">
                            <li class="list-item active">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                            <li class="list-item">
                                <span class="list-date"> 19-03-2021 </span>
                                <div class="list-calendar">Thứ 6</div>
                            </li>
                        </ul> -->
                        <!-- End Flight date-day -->

                        <!-- Box ticket flight -->
                        <div class="filter-main">

                        </div>
                        <!-- End Box ticket flight -->
                    </div>

                    <!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
var ftype = '<?= $fdata['type'] ?>';
var forigin = '<?php echo substr($fdata['origin'], -4, 3); ?>';
var fdestination = '<?php echo substr($fdata['destination'], -4, 3); ?>';
var fdepartment = '<?= $fdata['department'] ?>';
var freturn = '<?= $fdata['return'] ?>';
var fadult = '<?= $fdata['adult'] ?>';
var fchildren = '<?= $fdata['children'] ?>';
var finfants = '<?= $fdata['infants'] ?>';
var flights_data = [];

$.ajax({
    type: "get",
    url: "http://api.aviationstack.com/v1/flights?access_key=65976e6f57f282023dcad9ad4132f991&flight_status=scheduled&dep_iata=" +
        forigin + "&arr_iata=" + fdestination,
    dataType: "json",
    success: function(response) {
        var nowtime = new Date();
        for (var i in response.data) {
            var scheduled = new Date(response.data[i]['departure']['scheduled'].replace("+00",
                "+07"));
            if (scheduled > nowtime && response.data[i]['flight']['iata'] != null) {
                var a_scheduled = new Date(response.data[i]['arrival']['scheduled'].replace("+00",
                    "+07"));
                var ftime = a_scheduled - scheduled;
                response.data[i]['price'] = Math.round((ftime / 20) * (Math.round(Math.random() *
                    10) / 10 + 0.5));
                response.data[i]['duration'] = ftime;
                flights_data.push(response.data[i]);
            }
        }
        ShowData(SortDepartureTime);
    }
});

function ShowData(sortfunction) {
    var flight = "";
    if (flights_data.length == 0) {} else {
        flights_data.sort(sortfunction);
        for (var i in flights_data) {
            console.log(flights_data[i]['price']);
            var departure_scheduled = new Date(flights_data[i]['departure']['scheduled'].replace("+00",
                "+07"));
            var arrival_scheduled = new Date(flights_data[i]['arrival']['scheduled'].replace("+00",
                "+07"));
            var departure_date = departure_scheduled.getDate() + "-" + (departure_scheduled
                .getMonth() + 1) + "-" + departure_scheduled.getFullYear();
            var arrival_date = arrival_scheduled.getDate() + "-" + (arrival_scheduled
                .getMonth() + 1) + "-" + arrival_scheduled.getFullYear();
            var departure_time = flights_data[i]['departure']['scheduled'].slice(11, 16);
            var arrival_time = flights_data[i]['arrival']['scheduled'].slice(11, 16);
            var flight_time = arrival_scheduled - departure_scheduled;
            var duration = ZeroPad(Math.floor(flight_time / 3600000), 10) + "h" + ZeroPad(Math
                .floor((flight_time % 3600000) / 60000), 10) + "m";

            var airline_name = flights_data[i]['airline']['name'];
            var departure_iata = flights_data[i]['departure']['iata'];
            var arrival_iata = flights_data[i]['arrival']['iata'];
            var flight_iata = flights_data[i]['flight']['iata'];

            var price = flights_data[i]['price'];
            var total_adult = price * 3.1 * fadult;
            var total_children = price * 2.6 * fchildren;
            var total_infants = price * 0.1 * finfants;

            flight += "<div class='flight-item'>";
            flight += "<div class='flight-info'>";
            flight += "<div class='flight-img'>";
            flight += "<div class='box-img'>";
            flight += "<img src='<?= base_url() ?>" + ImageAirlines(airline_name) + "' alt='" +
                airline_name + "'/>";
            flight += "</div>";
            flight += "</div>";
            flight += "<div class='flight-from'>";
            flight += "<div class='flight-city'>" + GetNameByIATA(departure_iata) + "</div>";
            flight += "<div class='flight-time'>" + departure_time + "</div>";
            flight += "</div>";
            flight += "<div class='flight-wrap-detail'>";
            flight += "<div class='flight-number-code'>" + flight_iata + "</div>";
            flight += "<div class='flight-line'></div>";
            flight += "<div class='flight-detail'>Chi tiết</div>";
            flight += "</div>";
            flight += "<div class='flight-to'>";
            flight += "<div class='flight-city'>" + GetNameByIATA(arrival_iata) + "</div>";
            flight += "<div class='flight-time'>" + arrival_time + "</div>";
            flight += "</div>";
            flight += "<div class='flight-price-choose'>";
            flight += "<div class='flight-price'><span>" + numberWithCommas(price) +
                "</span><span>VND</span>" + "</div>";
            flight += "<button type='submit'>Chọn chuyến bay</button>";
            flight += "</div>";
            flight += "</div>";
            flight += "<div class='flight-box-detail'>";
            flight += "<div class='flight-detail-item'>";
            flight += "<p class='title-detail'>";
            flight += "<i class='fas fa-info-circle'></i> Chi tiết chuyến bay";
            flight += "</p>";
            flight += "<div class='flight-detail-wrap'>";
            flight += "<div class='detail-img'>";
            flight += "<div class='box-img'>";
            flight += "<img src='<?= base_url() ?>" + ImageAirlines(airline_name) + "' alt='" +
                airline_name + "' />";
            flight += "</div>";
            flight += "</div>";
            flight += "<div class='detail-from'>";
            flight += "<span>" + GetNameByIATA(departure_iata) + " - " + departure_iata + "</span>";
            flight += "<span>Sân bay: " + flights_data[i]['departure']['airport'] + "</span>";
            flight += "<span><p>Cất cánh:</p><p>" + departure_time + "</p></span>";
            flight += "<span><p>Ngày:</p><p>" + departure_date + "</p></span>";
            flight += "</div>";
            flight += "<div class='detail-to'>";
            flight += "<span>" + GetNameByIATA(arrival_iata) + " - " + arrival_iata + "</span>";
            flight += "<span>Sân bay: " + flights_data[i]['arrival']['airport'] + "</span>";
            flight += "<span><p>Hạ cánh:</p><p>" + arrival_time + "</p></span>";
            flight += "<span><p>Ngày:</p> <p>" + arrival_date + "</p></span>";
            flight += "</div>";
            flight += "<div class='detail-flight'>";
            flight += "<span><p>Chuyến bay:</p><p>" + flight_iata + "</p></span>";
            flight += "<span><p>Thời gian bay:</p><p>" + duration + "</p></span>";
            flight += "</div>";
            flight += "</div>";
            flight += "</div>";
            flight += "<div class='flight-detail-item'>";
            flight += "<p class='title-detail'><i class='fas fa-ticket-alt'></i>Chi tiết giá vé</p>";
            flight += "<div class='flight-detail-wrap'>";
            flight += "<ul class='detail-fare'>";
            flight += "<li class='person'><b>Hành khách</b></li>";
            flight += "<li class='amount'><b>Số lượng</b> </li>";
            flight += "<li class='price'><b>Giá vé</b></li>";
            flight += "<li class='taxes'><b>Thuế và phí</b></li>";
            flight += "<li class='total'><b>Tổng tiền</b></li>";
            flight += "</ul>";
            flight += "<ul class='detail-fare'>";
            flight += "<li class='person'>Người lớn</li>";
            flight += "<li class='amount'>" + fadult + "</li>";
            flight += "<li class='price'>" + numberWithCommas(price) + "</li>";
            flight += "<li class='taxes'>" + numberWithCommas((price * 2.1)) + "</li>";
            flight += "<li class='total'>" + numberWithCommas(total_adult) + "</li>";
            flight += "</ul>";
            if (fchildren > 0) {
                flight += "<ul class='detail-fare'>";
                flight += "<li class='person'>Trẻ em</li>";
                flight += "<li class='amount'>" + fchildren + "</li>";
                flight += "<li class='price'>" + numberWithCommas(price) + "</li>";
                flight += "<li class='taxes'>" + numberWithCommas((price * 1.6)) + "</li>";
                flight += "<li class='total'>" + numberWithCommas(total_children) + "</li>";
                flight += "</ul>";
            }
            if (finfants > 0) {
                flight += "<ul class='detail-fare'>";
                flight += "<li class='person'>Em bé</li>";
                flight += "<li class='amount'>" + finfants + "</li>";
                flight += "<li class='price'>" + 0 + "</li>";
                flight += "<li class='taxes'>" + numberWithCommas((price * 0.1)) + "</li>";
                flight += "<li class='total'>" + numberWithCommas(total_infants) + "</li>";
                flight += "</ul>";
            }
            flight += "<div class='detail-total'>";
            flight += "<span class='total-title'>Tổng tiền: </span>";
            flight += "<span class='total-price'><span>" + numberWithCommas(total_adult +
                total_children + total_infants) + "</span>VND </span>";
            flight += "</div>";
            flight += "</div>";
            flight += "</div>";
            flight += "</div>";
            flight += "</div>";
        }
        $(".filter-main").html(flight);
        $('.finding-view  > .box-view > li.personal label').trigger('click');
    }
}
$(document).ready(function() {
    $(document).on("click", ".flight-detail", function() {
        $(this).parents(".flight-info").next(".flight-box-detail").slideToggle();
    });

    $('.finding-view  > .box-view > li.personal').click(function() {
        $('.flight-price span:first-child').each(function() {
            var p = $(this).parents('.flight-info').next('.flight-box-detail').find(
                '.detail-fare:nth-child(2) li.price').text();
            $(this).text(p);
        });
    });

    $('.finding-view  > .box-view > li.taxes').click(function() {
        $('.flight-price span:first-child').each(function() {
            var p = $(this).parents('.flight-info').next('.flight-box-detail').find(
                '.total-price span').text();
            $(this).text(p);
        });
    });
});
</script>