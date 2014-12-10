var home = (function () {

	var public = {};

	function activeState() {

		$("nav .menu-menu-container ul li:nth-child(1) a").addClass("active");
		
	}

	function animateHome()

	// INIT FUNCTION
	function init() {

		// CALL INIT FUNCTIONS
		activeState();

	}

	// PUBLIC FUNCTIONS
	public.init = init;


	// RETURN PUBLIC FUNCTIONS
	return public;

}());

$(document).on("ready", home.init);