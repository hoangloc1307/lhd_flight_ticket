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
});

window.onload = function(){
	// Ẩn Loader khi load xong
	$(".loader-container").addClass("hide");
};

