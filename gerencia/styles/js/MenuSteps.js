var current_fs, previous_fs, next_fs, comodin = 1;

$(document).ready(function() {
	$(".next").click(function() { // Function Runs On NEXT Button Click
		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		next_fs.fadeIn('slow');
		current_fs.css({'display': 'none'});

		//activate next step on progressbar using the index of next_fs
		$("#progressbread a").eq($("div").index(next_fs)).addClass("active");
		comodin +=1;
	});

	$(".previous").click(function() { // Function Runs On PREVIOUS Button Click
		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		previous_fs.fadeIn('slow');
		current_fs.css({'display': 'none'});

		// Removing Class Active To Show Steps Backward;
		$("#progressbread a").eq($("div").index(current_fs)).removeClass("active");
		comodin -=1;
	});

});