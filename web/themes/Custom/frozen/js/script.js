$(document).ready(function () {

	/*jQuery("#mob-menu").click(function () {
		jQuery('#block-frozen-main-menu').toggleClass('menu-active', '1000');
	});*/

	$("#mob-menu").on("click", function(){
		$('#block-frozen-main-menu').toggleClass('menu-active', '1000');
	});

	/* spice owl carousel */

	$('#spice0').show();

	var counter = 1;

	var timer = setInterval(showDiv, 20000);

	function showDiv() {

		$('.spice_inner')
		.fadeOut()
		.filter(function() {
			return this.id.match('spice' + counter);
		})
		.fadeIn();
		counter == 4 ? counter = 0 : counter++;

	}


	/* spice carousel ends here */

});