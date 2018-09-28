jQuery(document).ready(function($) {
	hash = window.location.hash;

	function injectStyles(rule) {
		var div = $("<div />", {
			html: '&shy;<style>' + rule + '</style>'
		}).appendTo("body");
	}

	$('#testimonial').owlCarousel({
		mouseDrag:true,
		items:1,
		lazyLoad:false,
		rewind:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:true,
		navText: [
		"<i class='fa fa-angle-left fa-4x'></i>",
		"<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		responsive:{
			0:{
				nav:false,
				dots:true,
			},
			500:{
				nav:true,
				dots:false
			},
			1000:{
				nav:true,
				dots:false
			},
		},
	});

	$('#wip-tabs-courses .tab-section').owlCarousel({
		mouseDrag:true,
		margin: 20,
		lazyLoad:false,
		rewind:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		lazyLoad:true,
		nav:true,
		navText: [
		"<i class='fa fa-angle-left fa-4x'></i>",
		"<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		responsive:{
			0:{
				items:1,
				nav:false,
				dots:true,
			},
			500:{
				items:2,
				nav:true,
				dots:false
			},
			1000:{
				items:4,
				nav:true,
				dots:false
			},
		},
		onInitialized: function(e) {
			injectStyles( '#tab-' + e.currentTarget.id + ':checked ~ #' + e.currentTarget.id + ' { height: 100%; visibility: visible; opacity: 1; transition: visibility 0s, opacity 0.5s linear;}');
		}
	});

	// Clients & Sponsors
	$('.its-clients').owlCarousel({
		mouseDrag:true,
		items:5,
		lazyLoad:false,
		rewind:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		lazyLoad:true,
		nav:true,
		navText: [
		"<i class='fa fa-angle-left fa-4x'></i>",
		"<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		responsive:{
			0:{
				items:2,
				nav:false,
				dots:true,
			},
			600:{
				items:2,
			},
			1000:{
				items:4,
			},
		},
	});

	$('#course-reviews').owlCarousel({
		mouseDrag:true,
		items:4,
		margin: 20,
		lazyLoad:false,
		rewind:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		lazyLoad:true,
		nav:true,
		navText: [
		"<i class='fa fa-angle-left fa-4x'></i>",
		"<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		responsive:{
			0:{
				items:1,
				nav:false,
				dots:true,
			},
			600:{
				items:2,
			},
			1000:{
				items:4,
			},
		},
	});

	$('#course-instructors').owlCarousel({
		mouseDrag:true,
		items:3,
		margin: 20,
		lazyLoad:false,
		rewind:true,
		autoplay:true,
		autoplayTimeout:4000,
		autoplayHoverPause:true,
		nav:true,
		navText: [
		"<i class='fa fa-angle-left fa-4x'></i>",
		"<i class='fa fa-angle-right fa-4x'></i>"
		],
		dots:false,
		responsive:{
			0:{
				items:1,
				nav:false,
				dots:true,
			},
			600:{
				items:2,
			},
			1000:{
				items:3,
			},
		},
	});

	$('.course-nav').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('html,body').animate({scrollTop: $($(this).find('a').attr('data-tab')).offset().top - 90}, 1000);    
	}); 

	$('.wip-sign-up').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('html,body').animate({scrollTop: $("#tab-enroll").offset().top - 90}, 1000);    
	}); 

	$('.wip-more-info').click(function(e) {
		e.preventDefault();
		e.stopPropagation();
		$('html,body').animate({scrollTop: $("#wip-contact").offset().top - 90}, 1000);    
	}); 
	
	if( $("#course-navigation").length > 0 ) {
		window.onscroll = function() { wipSticky() };

		var navbar = document.getElementById("course-navigation");
		var sticky = navbar.offsetTop;

		function wipSticky() {
			if (window.pageYOffset >= sticky) {
				navbar.classList.add("wip-sticky")
			} else {
				navbar.classList.remove("wip-sticky");
			}
		}
	}

	if( $('body.home').length > 0 ){
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			if ( '1077' == event.detail.contactFormId ) {
				var link = document.createElement('a');
				link.href = 'https://itsystems.pe/wp-content/uploads/2018/09/INTRODUCCIÓN-SAP-R3.pdf';
				link.download = 'INTRODUCCIÓN-SAP-R3.pdf';
				link.dispatchEvent(new MouseEvent('click'));
			}
		}, false );
	}
	


	if(hash) {
		setTimeout(function() {
				$('html').animate({scrollTop: $(hash).offset().top - 50}, 1000);  
  	}, 200);
	}

});