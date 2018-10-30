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
(function($) {

/*
*  new_map
*
*  This function will render a Google Map onto the selected jQuery element
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$el (jQuery element)
*  @return	n/a
*/

function new_map( $el ) {
	
	// var
	var $markers = $el.find('.marker');
	
	
	// vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false
	};
	
	
	// create map	        	
	var map = new google.maps.Map( $el[0], args);
	
	
	// add a markers reference
	map.markers = [];
	
	
	// add markers
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	
	// center map
	center_map( map );
	
	
	// return
	return map;
	
}

/*
*  add_marker
*
*  This function will add a marker to the selected Google Map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	$marker (jQuery element)
*  @param	map (Google Map object)
*  @return	n/a
*/

function add_marker( $marker, map ) {

	// var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	// create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	// add to array
	map.markers.push( marker );

	// if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		// create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		// show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

/*
*  center_map
*
*  This function will center the map, showing all markers attached to this map
*
*  @type	function
*  @date	8/11/2013
*  @since	4.3.0
*
*  @param	map (Google Map object)
*  @return	n/a
*/

function center_map( map ) {

	// vars
	var bounds = new google.maps.LatLngBounds();

	// loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	// only 1 marker?
	if( map.markers.length == 1 )
	{
		// set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		// fit to bounds
		map.fitBounds( bounds );
	}

}

/*
*  document ready
*
*  This function will render each map when the document is ready (page has loaded)
*
*  @type	function
*  @date	8/11/2013
*  @since	5.0.0
*
*  @param	n/a
*  @return	n/a
*/
// global var
var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		// create map
		map = new_map( $(this) );

	});

});

})(jQuery);
/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
( function() {
	var container, button, menu, links, subMenus, i, len;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}

	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};

	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
( function() {
	var isWebkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    isOpera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    isIe     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( isWebkit || isOpera || isIe ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var id = location.hash.substring( 1 ),
				element;

			if ( ! ( /^[A-z0-9_-]+$/.test( id ) ) ) {
				return;
			}

			element = document.getElementById( id );

			if ( element ) {
				if ( ! ( /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();
