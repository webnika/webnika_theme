jQuery.noConflict();
(function( $ ) {
  	$(function() {

  		$(window).scroll(function() {    
		    var scroll = $(window).scrollTop();

		    if (scroll >= 100) {
		        $("#masthead").addClass("after-scroll");
		        $("#scroll-top").show();
		    } else {
		        $("#masthead").removeClass("after-scroll");
		        $("#scroll-top").hide();
		    }
		});

	  	jQuery(document).ready(function($) {

	  		// SEARCH
  			$(document).on("click", function () {
		  		if( $("#search-btn").hasClass('active') ) {
				    $("#search").slideUp();
				    $("#search-btn").removeClass('active');
		    	}
			});
		    
			$("#search").on("click", function (event) {
			    event.stopPropagation();
			});

	   		$("#search-btn").on("click", function (event) {
			    event.stopPropagation();
			    $("#search").slideToggle();
			    $(this).toggleClass('active');
			});

			// ADD CLASS TO TABLE ELEMENT 
		    $( "table" ).addClass( "table" );
		    // add wrap class for responsive tables
		    $( ".table" ).wrap( "<div class='table-responsive'></div>" );

	  		// NAVIGATION 
	  		$(".menu-toggle").on("click",function(event) {
	  			$("#site-navigation").toggle();
	  			$("#site-navigation").toggleClass("show");
	  			$("#masthead").toggleClass("show-nav");
	  			event.stopPropagation();
	  		});

	  		// SWIPER

		    // CAROUSEL BASIC
	  		var swiper = new Swiper('.swiper-container', {
		        pagination: '.swiper-pagination',
		        paginationClickable: true,
    	        nextButton: '.swiper-button-next',
        		prevButton: '.swiper-button-prev'
		    });

		    // ADD CLASS TO TABLE ELEMENT 
		    $( "table" ).addClass( "table" );
		    // add wrap class for responsive tables
		    $( ".table" ).wrap( "<div class='table-responsive'></div>" );

			// SCROLL TO TOP
			$("#scroll-top").click(function() {
			  	$("html, body").animate({ scrollTop: 0 }, "slow");
			  	return false;
			});

			// BTN HOSTESKY FIGURANTKY SCRLL TO SECTION
			$("#btn-hosteskyFigurantky").click(function() {
			  	$('html, body').animate({
			    	scrollTop: $("#hostesky-figurantky").offset().top
				}, 1500)
			});

			// BTN PORTFOLIO SCRLL TO SECTION
			$("#btn-portfolio").click(function() {
			  	$('html, body').animate({
			    	scrollTop: $("#portfolio").offset().top
				}, 1500)
			});
		});

	  	// TABS 
	  	$('#tabs .tab-nav').each(function(){
		  // For each set of tabs, we want to keep track of
		  // which tab is active and its associated content
		  var $active, $content, $links = $(this).find('a');

		  // If the location.hash matches one of the links, use that as the active tab.
		  // If no match is found, use the first link as the initial active tab.
		  $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
		  $active.addClass('active');

		  $content = $($active[0].hash);

		  // Hide the remaining content
		  $links.not($active).each(function () {
		    $(this.hash).hide();
		  });

		  // Bind the click event handler
		  $(this).on('click', 'a', function(e){
		    // Make the old tab inactive.
		    $active.removeClass('active');
		    $content.hide();

		    // Update the variables with the new link and content
		    $active = $(this);
		    $content = $(this.hash);

		    // Make the tab active.
		    $active.addClass('active');
		    $content.show();

		    // Prevent the anchor's default click action
		    e.preventDefault();
		  });
		});
  	});
})(jQuery);