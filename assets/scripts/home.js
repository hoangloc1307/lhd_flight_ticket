$(document).ready(function () {
	/* Chọn một chiều */
	$("#date-return").prop("disabled", true);

	$("#one-way").click(function () {
		$("#date-return").prop("disabled", true);
	});

	/* Chọn khứ hồi */
	$("#round-trip").click(function () {
		$("#date-return").prop("disabled", false);
	});

	/*===== End ===== */

	/* Input điểm đi, điểm đến focus */
	$(".close").click(function () {
		$(".way-popup").removeClass("show");
	});

	$(".choose").click(function () {
		$(".way-popup").not(this).removeClass("show");
		$(this).next(".way-popup").addClass("show");
	});
	/*===== End ===== */

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
	/*===== End ===== */

	/* Chọn điểm di, điểm đến */
	$(".list-point li").click(function () {
		$(this).parents(".way-popup").prev(".choose").val($(this).text());
	});
	/*===== End ===== */

	/* Tăng - Giảm số lượng hành khách */

	$(".plus-button").click(function () {
		var amount = parseInt($(this).prev(".amount").text());

		if (amount < 9) {
			$(this)
				.prev(".amount")
				.text(++amount);

			if (
				$(this).parents(".infants").attr("class") == "infants" &&
				amount > 1
			) {
				$(this).removeClass("active");
				$(this).addClass("unactive");
			}
		}
		if (amount > 0) {
			$(this).prevAll(".minus-button").removeClass("unactive");
			$(this).prevAll(".minus-button").addClass("active");
		}

		if (amount > 8) {
			$(this).removeClass("active");
			$(this).addClass("unactive");
		}
	});

	$(".minus-button").click(function () {
		var amount = parseInt($(this).next(".amount").text());
		if (amount > 0) {
			$(this)
				.next(".amount")
				.text(--amount);

			if (
				$(this).parents(".infants").attr("class") == "infants" &&
				amount < 2
			) {
				$(this).nextAll(".plus-button").removeClass("unactive");
				$(this).nextAll(".plus-button").addClass("active");
			}
		}
		if (amount == 0) {
			$(this).removeClass("active");
			$(this).addClass("unactive");
		}

		if (amount < 9) {
			$(this).nextAll(".plus-button").removeClass("unactive");
			$(this).nextAll(".plus-button").addClass("active");
		}
	});

	/*===== End ===== */
});
