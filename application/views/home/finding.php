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
                                <li class="price">
                                    <label for="price" class="label-radio">
                                        <input type="radio" id="price" class="sort" name="sort" checked="checked"
                                            value="_price" />
                                        <span class="label-circle"> </span>
                                        <span>Giá chuyến bay</span>
                                    </label>
                                </li>

                                <li class="timeup">
                                    <label for="timeup" class="label-radio">
                                        <input type="radio" id="timeup" class="sort" name="sort" checked="checked"
                                            value="_timeup" />
                                        <span class="label-circle"> </span>
                                        <span>Giờ khởi hành</span>
                                    </label>
                                </li>

                                <li class="timedown">
                                    <label for="timedown" class="label-radio">
                                        <input type="radio" id="timedown" class="sort" name="sort" checked="checked"
                                            value="_timedown" />
                                        <span class="label-circle"> </span>
                                        <span>Giờ hạ cánh</span>
                                    </label>
                                </li>

                                <li class="totaltime">
                                    <label for="totaltime" class="label-radio">
                                        <input type="radio" id="totaltime" class="sort" name="sort" checked="checked"
                                            value="_totaltime" />
                                        <span class="label-circle"> </span>
                                        <span>Thời gian bay</span>
                                    </label>
                                </li>

                                <li class="airline">
                                    <label for="airline" class="label-radio">
                                        <input type="radio" id="airline" class="sort" name="sort" checked="checked"
                                            value="_airline" />
                                        <span class="label-circle"> </span>
                                        <span>Hàng không</span>
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
                                        <input type="radio" id="personal" class="view" name="view" checked="checked"
                                            value="_personal" />
                                        <span class="label-circle filter-asc">
                                        </span>
                                        <span>Giá vé cơ bản cho người lớn</span>
                                    </label>
                                </li>

                                <li class="taxes">
                                    <label for="taxes" class="label-radio">
                                        <input type="radio" id="taxes" class="view" name="view" checked="checked"
                                            value="_taxes" />
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
                                    <h5>Hà Nội, Việt Nam (HAN)</h5>
                                    <i class="fas fa-long-arrow-alt-right"></i>
                                    <h5>Hồ Chí Minh, Việt Nam (SGN)</h5>
                                </div>
                                <p class="date">Thứ 6, 19-03-2021.</p>
                            </div>
                        </div>
                        <!-- End Flight name -->

                        <!-- Flight date-day -->
                        <ul class="filter-list-date">
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
                        </ul>
                        <!-- End Flight date-day -->

                        <!-- Box ticket flight -->
                        <div class="filter-main">
                            <div id="fight-1" class="flight-item">
                                <!-- Flight info -->
                                <div class="flight-info">
                                    <div class="flight-img">
                                        <img src="/images/partner/vietnamairlines.png" alt="Vietnam Airlines" />
                                        <p>Vietnam Airlines</p>
                                    </div>
                                    <div class="flight-from">
                                        <div class="flight-city">Hà Nội</div>
                                        <div class="flight-time">19:00</div>
                                    </div>
                                    <div class="flight-wrap-detail">
                                        <div class="flight-number-code">VN253</div>
                                        <div class="flight-line"></div>
                                        <a href="#" class="flight-detail">
                                            Chi tiết
                                        </a>
                                    </div>
                                    <div class="flight-to">
                                        <div class="flight-city">Hồ Chí Minh</div>
                                        <div class="flight-time">20:00</div>
                                    </div>
                                    <div class="flight-price-choose">
                                        <div class="flight-price">
                                            770,000
                                            <span>VND</span>
                                        </div>
                                        <button type="submit">
                                            Chọn chuyến bay
                                        </button>
                                    </div>
                                </div>
                                <!-- End Flight info -->

                                <!-- Info detail flight -->
                                <div class="flight-box-detail">
                                    <!-- Flight detail -->
                                    <div class="flight-detail-item">
                                        <p class="title-detail">
                                            <i class="fas fa-info-circle"></i>
                                            Chi tiết chuyến bay
                                        </p>
                                        <div class="flight-detail-wrap">
                                            <div class="detail-img">
                                                <img src="/images/partner/vietnamairlines.png" alt="Vietnam Airlines" />
                                                <p>Vietnam Airline</p>
                                            </div>
                                            <div class="detail-from">
                                                <span>
                                                    <p>Hà Nội - HAN</p>
                                                </span>
                                                <span>
                                                    <p>Sân bay Nội Bài</p>
                                                </span>
                                                <span>
                                                    <p>Cất cánh:</p>
                                                    <p>19:00</p>
                                                </span>
                                                <span>
                                                    <p>Ngày:</p>
                                                    <p>19/03/2021</p>
                                                </span>
                                            </div>
                                            <div class="detail-to">
                                                <span>
                                                    <p>Hồ Chí Minh - SGN</p>
                                                </span>
                                                <span>
                                                    <p>Sân bay Tân Sơn Nhất</p>
                                                </span>
                                                <span>
                                                    <p>Hạ cánh:</p>
                                                    <p>20:00</p>
                                                </span>
                                                <span>
                                                    <p>Ngày:</p>
                                                    <p>19/03/2021</p>
                                                </span>
                                            </div>
                                            <div class="detail-flight">
                                                <span>
                                                    <p>Chuyến bay:</p>
                                                    <p>VN6021</p>
                                                </span>
                                                <span>
                                                    <p>Hạng chỗ:</p>
                                                    <p>A_Eco</p>
                                                </span>
                                                <span>
                                                    <p>Thời gian bay:</p>
                                                    <p>01h00</p>
                                                </span>
                                                <span>
                                                    <p>Máy bay:</p>
                                                    <p>A320-100/200</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Flight detail -->

                                    <!-- Detail ticket -->
                                    <div class="flight-detail-item">
                                        <p class="title-detail">
                                            <i class="fas fa-ticket-alt"></i>
                                            Chi tiết giá vé
                                        </p>
                                        <div class="flight-detail-wrap">
                                            <ul class="detail-fare">
                                                <li class="person">
                                                    <b>Hành khách</b>
                                                </li>
                                                <li class="amount">
                                                    <b>Số lượng</b>
                                                </li>
                                                <li class="price">
                                                    <b>Giá vé</b>
                                                </li>
                                                <li class="taxes">
                                                    <b>Thuế và phí</b>
                                                </li>
                                                <li class="total">
                                                    <b>Tổng tiền</b>
                                                </li>
                                            </ul>
                                            <ul class="detail-fare">
                                                <li class="person">Người lớn</li>
                                                <li class="amount">1</li>
                                                <li class="price">1,009,000</li>
                                                <li class="taxes">641,000</li>
                                                <li class="total">1,650,000</li>
                                            </ul>
                                            <ul class="detail-fare">
                                                <li class="person">Trẻ em</li>
                                                <li class="amount">1</li>
                                                <li class="price">1,009,000</li>
                                                <li class="taxes">641,000</li>
                                                <li class="total">1,650,000</li>
                                            </ul>
                                            <div class="detail-total">
                                                <span class="total-title">
                                                    Tổng tiền:
                                                </span>
                                                <span class="total-price">
                                                    3,000,000
                                                    <p>VND</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end Detail ticket -->
                                </div>
                                <!-- End Info detail flight -->
                            </div>
                        </div>
                        <!-- End Box ticket flight -->
                    </div>

                    <!-- End Content -->
                </div>
            </div>
        </div>
    </div>
</div>