// BASIC FUNCTIONS
function pxval( val ) { return parseInt( val.split('px').join() ); }
function in_array( needle, haystack ) {
    for( var i = 0; i < haystack.length; i++ ) if( haystack[i] == needle ) return true;
    return false;	    
}
function array_similarities( array1, array2 ) {
	for( var i = 0; i < array1.length; i++ ) if( array2.indexOf( array1[i] ) > -1 ) return true;
	return false;
}
function is_email( email ) {
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return regex.test( email );
}


var curwindow = { breakPoint: undefined };
var videos = {};
var autoplay = {};
var arrowShowHideSpeed = 200;
var scrollSpeed = 1000;
var transformKeys = [];
var transform = {};
var canAutoplay = ! $('body').is('.ios');
var canParralax = $('body').is('.js-parallax');
var bodyClasses = $('body').attr('class').split(/\s+/);
var sliderVariables = {
	pagination: '.pagination',
	paginationClickable: true,
	onSlideChangeEnd: function(object){ showHideSliderArrows( $('#' + object.container.id) ); console.log('hi') }
}

// COPY BREAKPOINTS FROM SASS
var breakPoints = {
	0: { min: -1,	max: 749 },
	1: { min: 750,	max: 969 },
	2: { min: 970,	max: 1169 },
	3: { min: 1170,	max: 99999 }
};

// INITIATE EVERYTHING ONCE DOCUMENT IS READY
$(document).ready(function(){
	
	// SETUP PAGE ID's
	$('.page').each(function(){ $(this).attr( 'id', 'page-' + $(this).attr('id') ) });
	$('nav#primary a.single-page').each(function(){ $(this).attr( 'href', $(this).attr('href').split('/').join('#') ) })
	
	// MOBILE HAMBURGER
	$('.hamburger').on('click', function(){
		if( $('nav#primary .mobile-nav-wrap ul').is('.active') ) $('nav#primary .mobile-nav-wrap ul').removeClass('active')
		else {
			$('nav#primary .mobile-nav-wrap ul').addClass('active');
			var innerwidth = 5;
			$('.mobile-nav-wrap ul li:visible').each(function(){ innerwidth = innerwidth + $(this).width() + 5 })
			$('.mobile-nav-wrap ul').width( innerwidth )
		}
	})
	
	// SETUP VIDEOS AND OBJECTS
	if( canAutoplay ) {
		$('video.autoplay').each(function(){
			var current = $(this);
			$(this).attr('id', $(this).closest('.page.video').attr('id') + '-video' )		
			videos[ $(this).attr('id') ] = $(this).get(0);
			
			if( $(this).is('.autoplay') ) autoplay[ $(this).attr('id') ] = $(this).get(0);		
			videos[ $(this).attr('id') ].addEventListener('loadeddata', function() { current.addClass('loaded').siblings('.background-image').remove(); setWindowSize(); })
		})
	}
	
	// INITIAL SIZING AND SCROLL POSITION
	setTransitionKey();
	removeAllListBottomMargin('.bottom-list');
	setWindowSize();
	setScrollPosition();
	
	// RESIZE 
	$(window).bind('resize', function(){ setWindowSize(); })

	// INITIALIZE SLIDERS
	var sliders = [];
	$('.swiper-container').each(function(){
		var thisSliderVariables = sliderVariables; 
		
		$(this).children('.pagination').attr('id', $(this).attr('id') + '-pagination' );
		thisSliderVariables['pagination'] = '#' + $(this).attr('id') + '-pagination';
		
		sliders[ $(this).attr('id') ] = $( '#' + $(this).attr('id') ).swiper( thisSliderVariables );
		var curswiper = sliders[ $(this).attr('id') ];
		showHideSliderArrows( $(this) );
		$(this).find('.prev').on('click', function(e){ e.preventDefault(); curswiper.swipePrev(); })
		$(this).find('.next').on('click', function(e){ e.preventDefault(); curswiper.swipeNext(); })
	})
	
	// FADE IN HTML
	$('html').animate({ opacity: 1 }, 'slow');
	
	// SCROLL TO INITIAL POSITION
	var initial_page = $('#page-' + page);
	if( initial_page.length > 0 ) scrollToElement( initial_page );
})

// ANIMATE SCROLL TO PAGE (CLICKING MENU ITEMS)
$(document).on('click', 'a[href*=#]:not([href=#])', function(e) {
	if( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {
		var target = $(this.hash);
		target = target.length ? target : $('#page-' + this.hash.slice(1) );
		if( target.length ) scrollToElement( target );
		if( target.is( '#page-home' ) ) { window.location.hash = '#'; e.preventDefault(); }
	}
});

// HIDE BUTTONS NEXT/PREV IF FIRST/LAST SLIDE
function showHideSliderArrows( container ) {
	if( container.find('.swiper-slide-active').is( container.find('.swiper-wrapper li.swiper-slide:last-child') ) ) container.find('.page-arrows .next').animate({ right: -28 }, arrowShowHideSpeed);
	else container.find('.page-arrows .next').animate({ right: 0 }, arrowShowHideSpeed);
	if( container.find('.swiper-slide-active').is( container.find('.swiper-wrapper li.swiper-slide:first-child') ) ) container.find('.page-arrows .prev').animate({ left: -28 }, arrowShowHideSpeed);
	else container.find('.page-arrows .prev').animate({ left: 0 }, arrowShowHideSpeed);
}

// FIRE FUNCTION ON SCROLL (requestAnimationFrame)
var scroll = window.requestAnimationFrame ||
	window.webkitRequestAnimationFrame ||
	window.mozRequestAnimationFrame ||
	window.msRequestAnimationFrame ||
	window.oRequestAnimationFrame ||
	function( callback ){ window.setTimeout( callback, 1000/60 ) };


// ALL WINDOW-SIZE ADJUSTMENTS
function setWindowSize() {
	curwindow = setCurWindow();
	
	// ADJUST HEIGHT OF WINDOWS
	$('.page').not('.long-page').height( curwindow.height );

	// CENTER BLOCKS VERTICALLY
	$('.vcenter').each(function(){
		var pageHeight = $(this).closest('.page').height();
		var boxheight = $(this).height() + pxval( $(this).css('padding-top') ) + pxval( $(this).css('padding-bottom') );
		$(this).css( 'margin-top', Math.max( 0, ( ( ( pageHeight - curwindow.navHeight ) - boxheight ) / 2 ) ) )
	})

	// CENTER VIDEO
	$('video.autoplay').each(function(){
		var videoDimensions = { width: $(this).width(), height: $(this).height() };
		var videoOffset = { right: 0, top: 0 };
		if( videoDimensions.width > curwindow.width ) videoOffset.right = -( ( videoDimensions.width - curwindow.width ) / 2 ) + 'px';
		if( videoDimensions.height > curwindow.height ) videoOffset.top = -( ( videoDimensions.height - curwindow.height ) / 2 ) + 'px';
		$(this).css({ right: videoOffset.right, top: videoOffset.top }).attr( 'offsetRight', videoOffset.right ).attr( 'offsetTop', videoOffset.top );
	})
}

// SET BASED ON SCROLL POSITION
function setScrollPosition() {
	var scrollposition = $(document).scrollTop();
	var playvideo = [];	
	
	$('.page').each(function(){
	
		// GET PERCENTAGE OF PAGE SHOWING
		if( ! $(this).is(':visible') ) var percentVisible = 0;
		else percentVisible = ( ( curwindow.height - Math.abs( $(this).offset().top - scrollposition ) ) / curwindow.height ) * 100;
		
						
		// SWITCH NAVIGATION
		if( percentVisible > 50 && ! $(this).is('.cur-page') ) {
			curwindow.curpage = $(this).attr('id');
			$('.page').removeClass('cur-page');
			$(this).addClass('cur-page');
			$('#primary ul li a').removeClass('active');
			$('#primary ul li a[href="#' + $(this).attr('id').split('page-').join('') + '"]').addClass('active');
		}
		
		// FIND VISIBLE VIDEOS TO START PLAYING
		if( canAutoplay && percentVisible > 5 ) playvideo.push( $(this).find('video.autoplay').attr('id') );
				
		// PARALLAX SCROLLING
		if( canParralax && percentVisible > 0 ) {
			var offset = ( ( ( ( $(this).height() - ( $(this).offset().top - scrollposition ) ) / $(this).height() ) * 100 ) - 100 ) * curwindow.parralax;

			if( $(this).find('.autoplay').length > 0 ) {
				offset = ( offset - pxval( $(this).find('.autoplay').attr('offsetTop') ) );
				var parallax = $(this).find('.autoplay');
			} else var parallax = $(this).find('.background-image');

			$.each( transformKeys, function( key, value ){ transform[value] = 'translate3d(0, ' + offset + 'px, 0)' });
			parallax.css( transform );
		}
	})
	
	// START/STOP VIDEOS
	if( canAutoplay ) {
		$.each( autoplay, function( id, object ){
			if( in_array( id, playvideo ) && object.paused ) object.play();
			else if( ! in_array( id, playvideo ) && ! object.paused ) object.pause();
		})
	}
	
	// RESET SCROLL FUNCTION (requestAnimationFrame)
	scroll( setScrollPosition );
}

// SET/UPDATE CURWINDOW VARIABLE
function setCurWindow() {
	// SWITCH BREAKPOINT
	$.each( breakPoints, function( key, values ) {
		if( ( curwindow.width >= values.min && curwindow.width <= values.max ) && curwindow['breakPoint'] != key ) {
			curwindow['breakPoint'] = key;
			return false;
		}
	})
	curwindow = { width: $(window).width(), height: $(window).height(), navHeight: $('nav#primary').height(), breakPoint: curwindow.breakPoint, parralax : ( $(window).height() / 100 ) }
	curwindow['contentHeight'] = curwindow.height - curwindow.navHeight;
	return curwindow;
}

// SCROLL TO AN ELEMENT (ANIMATED)
function scrollToElement( element ) {
	$('html,body').animate( { scrollTop: element.offset().top }, scrollSpeed, function(){ setScrollPosition(); } );
}

function setTransitionKey() {
	if( in_array( 'ie', bodyClasses ) ) transformKeys = [ '-ms-transform' ];
	else if( array_similarities( [ 'safari', 'opera' ], bodyClasses ) ) transformKeys = [ '-webkit-transform' ];
	else transformKeys = [ 'transform' ];
}

// REMOVE MARGIN FROM LAST ROW OF LISTS
function removeAllListBottomMargin( cssAttribute ) {
	$(cssAttribute).each(function() { removeListBottomMargin( $(this) ) })
}

function removeListBottomMargin( list ) {
	if( list.find('li:first-child').is('.span-12') ) var cols = 1;
	else if( list.find('li:first-child').is('.span-6') ) var cols = 2;
	else if( list.find('li:first-child').is('.span-4') ) var cols = 3;
	else if( list.find('li:first-child').is('.span-3') ) var cols = 4;
	
	if( cols != undefined ) {
		var items = list.find( '>li' ).length;
		var remainder = ( ( items / cols ) - Math.floor( items / cols ) );
		var last_items = remainder == 0 ? cols : Math.round( remainder / ( 1 / cols ) );
		list.find( '>li' ).slice( - last_items ).css('margin-bottom', 0);
	}
}