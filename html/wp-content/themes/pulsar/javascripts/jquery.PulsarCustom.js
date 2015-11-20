jQuery(document).ready(function($) {
	$("a[data-gal^='prettyPhoto']").prettyPhoto();
});

jQuery(window).load(function() {
	jQuery("#loading").fadeOut("1000", function() {
	// Animation complete
		jQuery('#loading img').css("display","none");
		jQuery('#loading').css("display","none");
		jQuery('#loading').css("background","none");
		jQuery('#loading').css("width","0");
		jQuery('#loading').css("height","0");
	});
});

jQuery(document).ready(function($){
	//.parallax(xPosition, speedFactor, outerHeight) options:
	//xPosition - Horizontal position of the element
	//inertia - speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling
	//outerHeight (true/false) - Whether or not jQuery should use it's outerHeight option to determine when a section is in the viewport
	$('.section3').parallax("50%", 0.5);
	$('.section3-2').parallax("50%", 0.5);
	$('.section3-3').parallax("50%", 0.5);
	$('.section3-4').parallax("50%", 0.5);
	$('.section3-5').parallax("50%", 0.5);
	$('.section3-5').parallax("50%", 0.5);
	$('.section3-7').parallax("50%", 0.5);
	$('.section3-8').parallax("50%", 0.5);
	$('.section3-9').parallax("50%", 0.5);
	$('.section3-10').parallax("50%", 0.5);
	$('.section5').parallax("50%", 0.5);
	$('.section5-2').parallax("50%", 0.5);
	$('.section5-3').parallax("50%", 0.5);
	$('.section5-4').parallax("50%", 0.5);
	$('.section5-5').parallax("50%", 0.5);
	$('.section5-6').parallax("50%", 0.5);
	$('.section5-7').parallax("50%", 0.5);
	$('.section5-8').parallax("50%", 0.5);
	$('.section5-9').parallax("50%", 0.5);
	$('.section5-10').parallax("50%", 0.5);
	$('.section7').parallax("50%", 0.5);
	$('.section7-2').parallax("50%", 0.5);
	$('.section7-3').parallax("50%", 0.5);
	$('.section7-4').parallax("50%", 0.5);
	$('.section7-5').parallax("50%", 0.5);
	$('.section7-6').parallax("50%", 0.5);
	$('.section7-7').parallax("50%", 0.5);
	$('.section7-8').parallax("50%", 0.5);
	$('.section7-9').parallax("50%", 0.5);
	$('.section7-10').parallax("50%", 0.5);
	$('.section9').parallax("50%", 0.5);
	$('.section9-2').parallax("50%", 0.5);
	$('.section9-3').parallax("50%", 0.5);
	$('.section9-4').parallax("50%", 0.5);
	$('.section9-5').parallax("50%", 0.5);
	$('.section9-6').parallax("50%", 0.5);
	$('.section9-7').parallax("50%", 0.5);
	$('.section9-8').parallax("50%", 0.5);
	$('.section9-9').parallax("50%", 0.5);
	$('.section9-10').parallax("50%", 0.5);
	$('.section10').parallax("50%", 0.5);
	$('.section10-2').parallax("50%", 0.5);
	$('.section10-3').parallax("50%", 0.5);
	$('.section10-4').parallax("50%", 0.5);
	$('.section10-5').parallax("50%", 0.5);
	$('.section10-6').parallax("50%", 0.5);
	$('.section10-7').parallax("50%", 0.5);
	$('.section10-8').parallax("50%", 0.5);
	$('.section10-9').parallax("50%", 0.5);
	$('.section10-10').parallax("50%", 0.5);
})

jQuery(function($) {
	$('ul#menu-main-menu').prepend('<li id="#homepage"><a href="homepage">Home</a></li>');
	
	$('.main-menu li').bind('click',function(event){
		var $link = $(this);
		
		$('html, body').stop().animate({
			scrollTop: $($link.attr('id')).offset().top
		}, 2000,'easeInOutQuart');
		
		event.preventDefault();
	});
	
	$('nav ul li a').bind('click',function(event){
		var $anchor = $(this);
		
		$('html, body').stop().animate({
			scrollTop: $($anchor.attr('href')).offset().top
		}, 2000,'easeInOutQuart');
		
		event.preventDefault();
	});
	
	$('.logo a').bind('click',function(event){
		var $logolink = $(this);
		
		$('html, body').stop().animate({
			scrollTop: $($logolink.attr('href')).offset().top
		}, 2000,'easeInOutQuart');
		
		event.preventDefault();
	});
});

jQuery(document).ready(function($){
	// validate signup form on keyup and submit
	var validator = $("#contactform").validate({
		rules: {
			contactname: {
				required: true,
				minlength: 2
			},
			email: {
				required: true,
				email: true
			},
			subject: {
				required: true,
				minlength: 2
			},
			message: {
				required: true,
				minlength: 10
			}
		},
		messages: {
			contactname: {
				required: "Please enter your name",
				minlength: jQuery.format("Your name needs to be at least {0} characters")
			},
			email: {
				required: "Please enter a valid email address",
				minlength: "Please enter a valid email address"
			},
			subject: {
				required: "You need to enter a subject!",
				minlength: jQuery.format("Enter at least {0} characters")
			},
			message: {
				required: "You need to enter a message!",
				minlength: jQuery.format("Enter at least {0} characters")
			}
		},
		// set this class to error-labels to indicate valid fields
		success: function(label) {
			label.addClass("checked");
		}
	});
});

function moveTo(contentArea){
	var goPosition = jQuery(contentArea).offset().top;
	jQuery('html, body').stop().animate({
		scrollTop: goPosition
	}, 2000,'easeInOutQuart');
}
