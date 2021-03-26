$(document).ready(function () {
	/*Loc chuyen bay Checked */
	$(".finding-airline__airline li").click(function () {
		var a = $(this).attr("value");
		if (a == "all") {
			$(".finding-airline__airline li .checkmark").addClass("active");
		} else {
			$(".finding-airline__airline li")
				.not(this)
				.find(".checkmark")
				.removeClass("active");
			$(this).find(".checkmark").addClass("active");
		}
	});
	/* End */

	/* Chon gio Drop down */
	$(".dropdown").click(function () {
		$(".dropdown").not(this).find(".dropdown-list").slideUp(300);
		$(this).find(".dropdown-select i").toggleClass("dropdown-caret");
		$(this).find(".dropdown-list").slideToggle(300);
	});

	$(".dropdown-item").click(function () {
		var addValue = $(this).attr("value");
		$(this).parents(".dropdown").find(".dropdown-selected").html(addValue);
	});
});
