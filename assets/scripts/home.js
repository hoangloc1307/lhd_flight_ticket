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
		var amount = parseInt($(this).next(".amount").text());
		if (amount > 0) {
			$(this)
				.next(".amount")
				.text(--amount);
			$(this).nextAll("input").val($(this).prev(".amount").text());
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


