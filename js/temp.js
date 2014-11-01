$(document).ready(function() {
	$(".checkboxButton").on("click", function() {
		if($(this).hasClass("active")){
			$(this).removeClass("active");
			$checkbox = "#" + $(this).data("checkbox");
			$($checkbox).prop('checked', false);
		}
		else {
			$(this).addClass("active");
			$checkbox = "#" + $(this).data("checkbox");
			$($checkbox).prop('checked', true);
		}
	});
});