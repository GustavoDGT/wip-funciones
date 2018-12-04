jQuery(document).ready(function($) {
	// Clients & Sponsor
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
	
});

if(	window.location.hash ) {
	$(window).on('load', function(event) {
		event.preventDefault();
		$('html').animate({scrollTop: $(window.location.hash).offset().top - 50}, 1000);  
	});
}