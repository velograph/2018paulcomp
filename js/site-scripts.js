jQuery(document).ready(function(){

	if (jQuery(window).width() < 860) {

		// Mobile menu toggle
		jQuery(".slide-out").hide();
		jQuery(".menu-hook").click(function(){
			jQuery(".slide-out").slideToggle(700);
		});
	}

	jQuery(".woocommerce-message").delay(5000).slideToggle("slow");

});
