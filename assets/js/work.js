$(document).on("dom_created", function() {

	$(".work-circle").css("opacity", 0);
	
});


var work = (function () {

	var public = {};

	function activeState() {

		$("nav .menu-menu-container ul li:nth-child(3) a").addClass("active");
		
	}

	function animateCircles() {

		TweenMax.staggerTo(".work-circle", 1, {opacity: 1}, 0.2);

	}

	// INIT FUNCTION
	function init() {

		// CALL INIT FUNCTIONS
		activeState();
		animateCircles();

	}

	// PUBLIC FUNCTIONS
	public.init = init;


	// RETURN PUBLIC FUNCTIONS
	return public;

}());

$(document).on("ready", work.init);
