var squareoneAPI = (function () {

	var public = {},
			navStatus = true;

	function mobileNav() {

		// MOBILE NAV FUNCTIONALITY
		$("#nav-icon").click(function() {
			if(navStatus) {
				var openNav = new TimelineMax();
				openNav.to(".m-sidebar", 0.5, {left:"0%", ease: Power4.easeInOut})
				.to("#nav-icon", 0.5, {left:"275px", ease: Power4.easeInOut}, -1);
				$(this).addClass("open");
				navStatus = false;
			} else {
				var closeNav = new TimelineMax();
				closeNav.to(".m-sidebar", 0.5, {left:"-100%", ease: Power4.easeInOut})
				.to("#nav-icon", 0.5, {left:"10px", ease: Power4.easeInOut}, -1);
				$(this).removeClass("open");
				navStatus = true;
			}
		});

	}

	// INIT FUNCTION
	function init() {

		// CALL INIT FUNCTIONS
		console.log("squareoneAPI loaded...");
		mobileNav();

	}

	// PUBLIC FUNCTIONS
	public.init = init;


	// RETURN PUBLIC FUNCTIONS
	return public;

}());

$(document).on("ready", squareoneAPI.init);

$(document).on("dom_created", function() {

	$(".work-circle").css("opacity", 0);
	console.log("boom");

});
