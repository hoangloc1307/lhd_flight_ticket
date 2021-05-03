/* Bộ lọc trên Mobile */
$(document).on("click", "#filter-left .finding-base .title", function () {
	$(this).find(".icon-down").toggleClass("active");
	$(this).parents(".finding-base").find("ul").slideToggle();
});

/* End */
