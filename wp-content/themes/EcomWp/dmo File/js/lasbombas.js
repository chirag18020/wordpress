/**** start loader *****/
jQuery(window).on('load', function () {
    var preloader = jQuery('.spiner-load'),
    loader = preloader.find('.loader');
    loader.delay(400).fadeOut();
    preloader.delay(500).fadeOut('slow');
});
/**** end loader *****/

/****start click toogle readmore**/
jQuery(document).ready(function() {
	var getlang = jQuery('html').attr('lang');
	if( getlang == 'de-DE' ) {
		jQuery("#toggle").click(function() {
			var elem = jQuery("#toggle").text();
			if (elem == "Vollständige Bio lesen") {
			  jQuery("#toggle").text("Weniger Bio lesen");
			  jQuery("#text").slideDown();
			} else {
			  jQuery("#toggle").text("Vollständige Bio lesen");
			  jQuery("#text").slideUp();
			}
	  });
	}
	if( getlang == 'en-US' ) {
		jQuery("#toggle").click(function() {
			var elem2 = jQuery("#toggle").text();
			if (elem2 == "Read Full Bio") {
				jQuery("#toggle").text("Read Less Bio");
				  jQuery("#text").slideDown();
			} else {
				  jQuery("#toggle").text("Read Full Bio");
				  jQuery("#text").slideUp();
			}
		});
	}
});
/****end click toogle readmore**/

/****start popup code**/
jQuery(document).ready(function() {
	var modal1 = document.getElementById("lasbombas-container");
	var btn1 = jQuery(".clickaction");
	var span1 = document.getElementsByClassName("lasbomclosebtn")[0];
	jQuery(span1).click(function(event){
		event.preventDefault();
		modal1.style.display = "none";
	});
	jQuery(span1).click(function(event){
		event.preventDefault();
		modal1.style.display = "none";
	});
	jQuery(btn1).click(function(event){
		event.preventDefault();
		jQuery("#lasbombas-container").show();
	});
});
/****end popup code**/

/****submit popup after code**/
jQuery(document).ready(function() {
     if (jQuery("#lasbombas-call-popup .invalid").attr('data-status') !== undefined && jQuery("#lasbombas-call-popup .invalid").attr('data-status') == 'invalid') {
        //console.log('The name attribute invalid');
		jQuery("#lasbombas-container").show();
    }
    else if(jQuery("#lasbombas-call-popup .failed").attr('data-status') !== undefined && jQuery("#lasbombas-call-popup .failed").attr('data-status') == 'failed') {
        //console.log('The name attribute failed');
		jQuery("#lasbombas-container").show();
    }
	else if(jQuery("#lasbombas-call-popup .sent").attr('data-status') !== undefined && jQuery("#lasbombas-call-popup .sent").attr('data-status') == 'sent') {
		//console.log('The name attribute sent');
		jQuery("#lasbombas-container").show();
		setTimeout(function() {
			jQuery(document).ready(function() {
				var getlng = jQuery('html').attr('lang');
				if( getlng == 'de-DE' ) { location.href = ''; }
				if( getlng == 'en-US' ) { location.href = 'home'; }
			});
		}, 1500);
    }
	else { 
	}
});
/****end submit popup after code**/

/****start Slick slider**/
jQuery(document).ready(function() {
	jQuery('.slider-for').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		asNavFor: '.slider-nav'
	});
	jQuery('.slider-nav').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		asNavFor: '.slider-for',
		dots: false,
		focusOnSelect: true
	});
});
/****End Slick slider**/

/****start scroll menu**/
jQuery(window).scroll(function(){
    if (jQuery(this).scrollTop() > 50) {
		jQuery('header').addClass('sticky');
    } else {
		jQuery('header').removeClass('sticky');
    }
});
jQuery(document).ready(function() {
	let anchorSelector = 'a[href^="#"]';
	jQuery(anchorSelector).on('click', function (e) {
		e.preventDefault();
		let destination = jQuery(this.hash);
		let scrollPosition = destination.offset().top-179;
		let animationDuration = 500;
		jQuery('html, body').animate({
			scrollTop: scrollPosition
		}, animationDuration);
	});
});
/****end scroll menu**/
