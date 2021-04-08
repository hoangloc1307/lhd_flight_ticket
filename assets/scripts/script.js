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

	/*Load dữ liệu sân bay*/
});

// for (let j = 0; j < json[i]['List'].length; j++) {
// 	txt += '<li value="' + json[i][
//         'List'
//     ][j]['Code'] + '">' + json[i]['List'][j]['Name'] +
//         ' (' +
//         json[i][
//         'List'
//         ][j]['Code'] + ')</li>';
// }
// let list = '.list-' + i;
// $(list).append(txt);
