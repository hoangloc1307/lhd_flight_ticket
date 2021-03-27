$(document).ready(function () {

	// Ẩn hiện nút back to top
	$(this).scroll(function () {
		if ($(this).scrollTop() > 1000) {
			$(".to-top").addClass("show");
		} else {
			$(".to-top").removeClass("show");
		}
	});

	// Back to top
	$(".to-top").click(function () {
		$(document).scrollTop(0);
	});

	// Ẩn Loader khi load xong
	$(".loader-container").addClass("hide");
	
	// /*Load dữ liệu sân bay*/
	// $.ajax({
	//     url: 'https://www.vietjetair.com/AirportList.aspx?lang=vi-VN',
	//     type: 'GET',
	//     dataType: 'json',
	//     success: function (json) {
	//         json = json.AirportList;

	//         for (let i = 0; i < json.length; i++) {
	//             $('.way-popup').append('<li class="list-' + i + '"><strong>' +
	//                 json[i][
	//                 'CountryName'
	//                 ] +
	//                 '</strong></li>');

	//             let txt = '<ul class="sub-popup">';
	//             for (let j = 0; j < json[i]['List'].length; j++) {
	//                 txt += '<li value="' + json[i][
	//                     'List'
	//                 ][j]['Code'] + '">' + json[i]['List'][j]['Name'] +
	//                     ' (' +
	//                     json[i][
	//                     'List'
	//                     ][j]['Code'] + ')</li>';
	//             }
	//             txt += '</ul>';
	//             let list = '.list-' + i;
	//             $(list).append(txt);
	//         }
	//     }
	// });

	// $('.way-popup ul li').hover(function () {
	//     $('.way label input').text($(this).text());
	// });
});
