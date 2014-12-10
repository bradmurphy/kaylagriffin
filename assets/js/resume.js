var resume = (function () {

	var public = {};

	function activeState() {

		$("nav .menu-menu-container ul li:nth-child(4) a").addClass("active");
		
	}

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

$(document).on("ready", resume.init);