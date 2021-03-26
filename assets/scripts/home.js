$(document).ready(function () {
	/* Input điểm đi, điểm đến focus */

	$(".close").click(function () {
		$(".way-popup").removeClass("show");
	});

	$(".choose").click(function () {
		$(".way-popup").not(this).removeClass("show");
		$(this).next(".way-popup").addClass("show");
	});

	/* End */

	/* Tab điểm đi, điểm đến */
	$("label:first-child .tab-container > li").click(function () {
		var tab = $(this).index() + 1;
		$(".list-city-wrap .list-city").removeClass("list-active");
		$(".list-city-wrap .list-city:nth-child(" + tab + ")").addClass(
			"list-active"
		);
		$("label:first-child .tab-container > li")
			.not(this)
			.removeClass("tab-active");
		$(this).addClass("tab-active");
	});

	$("label:last-child .tab-container > li").click(function () {
		var tab = $(this).index() + 1;
		$(".list-city-wrap .list-city").removeClass("list-active");
		$(".list-city-wrap .list-city:nth-child(" + tab + ")").addClass(
			"list-active"
		);
		$("label:last-child .tab-container > li")
			.not(this)
			.removeClass("tab-active");
		$(this).addClass("tab-active");
	});
	/* End */

	/* Chọn điểm di, điểm đến */
	$(".list-point li").click(function () {
		$(this).parents(".way-popup").prev(".choose").val($(this).text());
	});

	/* End */
});
