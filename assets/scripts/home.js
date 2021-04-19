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

	$(document).on("click", "label:first-child .tab-container > li", function () {
		$("label .tab-container > li").removeClass("tab-active");
		$(this).addClass("tab-active");

		var index = $(this).index() + 1;
		$(".list-city-wrap .list-city").removeClass("list-active");
		$(".list-city-wrap .list-city:nth-child(" + index + ")").addClass(
			"list-active"
		);
		$("label:first-child .tab-container > li")
			.not(this)
			.removeClass("tab-active");
		$(this).addClass("tab-active");
	});

	$(document).on("click", "label:last-child .tab-container > li", function () {
		$("label .tab-container > li").removeClass("tab-active");
		$(this).addClass("tab-active");

		var list = $(this).index() + 1;
		$(".list-city-wrap .list-city").removeClass("list-active");
		$(".list-city-wrap .list-city:nth-child(" + list + ")").addClass(
			"list-active"
		);
		$("label:last-child .tab-container > li")
			.not(this)
			.removeClass("tab-active");
		$(this).addClass("tab-active");
	});

	/*===== End ===== */

	/* Chọn điểm di, điểm đến */
	$(document).on("click", ".list-point li", function () {
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
			$(this).prevAll("input").val($(this).prev(".amount").text());

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
		var amount = parseInt($(this).nextAll(".amount").text());
		if (amount > 0) {
			$(this)
				.nextAll(".amount")
				.text(--amount);
			$(this).nextAll("input").val($(this).prev(".amount").text());
			if (
				$(this).parents(".infants").attr("class") == "infants" &&
				amount < 2
			) {
				$(this).nextAll(".plus-button").removeClass("unactive");
				$(this).nextAll(".plus-button").addClass("active");
			}

			if ($(this).parents(".adults").attr("class") == "adults" && amount < 2) {
				$(this).removeClass("active");
				$(this).addClass("unactive");
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

	/*===== Menu Mobile ===== */
	$(document).on("click", ".menu-mobile .icon", function () {
		$(".overlay").slideToggle(0);
		$(".list-mobile").slideToggle();
	});
	$(document).on("click", ".list-mobile .close i", function () {
		$(".overlay").slideToggle(0);
		$(".list-mobile").slideToggle(0);
	});
	$(document).on("click", ".user", function () {
		$(this).find("span > i:last-child").toggleClass("active");
		$(".list-mobile ul .user .menu-user").toggleClass("active");
	});

	/*===== End Menu Mobile ===== */
});
