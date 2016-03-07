function carettab(){

	
	$('body').on('click touch','#about-menu-nav',function(){
		var www = $(window).width();
		if(www < 750){
			$('ul#about-tab-mobile').toggle();
			$(this).toggleClass('open');
		}
	});
	$('body').on('click touch','#resource-menu-nav',function(){
	var www = $(window).width();
		if(www < 750){
			$('ul#resource-mob-tab').toggle();
			$(this).toggleClass('open');
		}
	});
	$('body').on('click touch','#about-tab-mobile li',function(){
		var www = $(window).width();
		if(www < 750){
			$('#about-tab-mobile').hide();
			$('#about-menu-nav').toggleClass('open');
		}
	});
	$('body').on('click touchstart','#resource-mob-tab li',function(){ 
		var www = $(window).width();
		if(www < 750){
			//$(this).find(a).click();	
			setTimeout(function() {	
				$('#resource-mob-tab').hide();
			},200);
			$('#resource-menu-nav').toggleClass('open');

		}
	});

	$('.nav.navbar-nav.top-nav li').click(function() {
		var www = $(window).width();
		if(www < 750){
			$('#navbar').removeClass('in');
		}
	});
}

$(document).ready(function() {
		
$('.lib-content .right-padd img').attr('height',$('.lib-content .left-padd-inner').height());
$('.lib-content .left-padd-inner .left-container').css('height',$('.lib-content .left-padd-inner').height());

	var teamBxSlider = $('#team-box').bxSlider({
		'pager'			: 0,
		'infiniteLoop'	: 0,
		'onSlideAfter'	: function( a, b, c ){
			if( $('#abt-meet .bx-controls').is(':visible') ) {
				var curSlideIndex = teamBxSlider.getCurrentSlide();
				if( curSlideIndex == 0 ) {
					$('#abt-meet .bx-controls .bx-prev').hide();
					$('#abt-meet .bx-controls .bx-next').show();
				} else if( curSlideIndex == ( teamBxSlider.getSlideCount() - 1 ) ) {
					$('#abt-meet .bx-controls .bx-next').hide();
					$('#abt-meet .bx-controls .bx-prev').show();
				} else {
					$('#abt-meet .bx-controls').find('.bx-prev, .bx-next').show();
				}
			}
		}
	});
	
// 	if( logged_in ) {
		$('.tab-reset-overview').on('click', function(){
			
		})
		$('.tab-reset-overview a[href="#abt-meet"]').on('click', function(){
			$('.divisions li:eq(0) a').trigger('click');
			$('#team-box').css('opacity', 0);
			setTimeout(function(){ reset_team_slider( $('.divisions li:eq(0) a') ); $('#team-box').animate({ 'opacity' : 1 }, 1000) }, 750 );
		})
		
		$('.divisions li a').on('click', function(e){
			e.preventDefault();
			reset_team_slider( $(this) );
		})
	
		$(window).on('resize', function(){
			if( $('#abt-meet').length > 0 ) reset_team_slider( $('.divisions li a.active') );
		})
		
		function reset_team_slider( elem ) {
			var ww = $(window).width();
			if( ww < 521 ) {
				quantity = 4;
			} else if( ww >= 521 && ww < 678 ) {
				quantity = 9;
			} else if( ww >= 678 && ww < 981 ) {
				quantity = 8;
			} else if( ww >= 981 ) {
				quantity = 10;
			}
			
			$('.divisions li a').removeClass('active');
			var division = elem.addClass('active').attr('href')
			
			$('.team-member').removeClass('display').attr('data-transfer', '-1');
			
			var transfercount = 0;
			
			if( division == '#' ) {
				for( var t = 0; t < $('.team-member').length; t++ ) {
					var elem = $('.team-member[data-order="' + t + '"]');
					if( elem.length > 0 ) {
						elem.addClass('display').attr('data-transfer', transfercount );
						$('#temp-space').append( elem );
						transfercount++;
					}
				}
				
			} else {
				for( var t = 0; t < $('.team-member').length; t++ ) {
					var elem = $('.team-member[data-order="' + t + '"]');
					if( elem.length > 0 ) {
						var divisions = elem.attr('data-divisions').split('|');
						if( in_array( division, divisions ) ) {
							elem.addClass('display').attr('data-transfer', transfercount );
							transfercount++
						}
						$('#temp-space').append( elem );
					}
				}
			}
	
			$('#team-box').empty();
			
			var total = Math.ceil( $('#temp-space .team-member.display').length / quantity );
			for( var i = 0; i < total; i++ ) {
				$('#team-box').append('<li class="slide' + i + '"><ul class="meet-team"></ul></li>');
				for( s = 0; s < quantity; s++ ) {
					if( $('#temp-space .team-member[data-transfer="' + ( ( i * quantity ) + s ) + '"]').length > 0 ) {
						$('#team-box .slide' + i + ' ul.meet-team').append( $('#temp-space .team-member[data-transfer="' + ( ( i * quantity ) + s ) + '"]') )
					}
				}
			}
			$('#abt-meet .bx-controls').find('.bx-prev, .bx-next').show();
			if( total == 1 ) $('#abt-meet .bx-controls').hide()
			else $('#abt-meet .bx-controls').show().find('.bx-prev').hide();
	
			teamBxSlider.reloadSlider();
	
			return false;
		}
/*
	} else {
		
	}
*/

	var ww = $(window).width();
/*var is_firefox_check = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
	if (!is_firefox_check && navigator.userAgent.toLowerCase().indexOf("iphone") ==-1) {
		
	}else{
		//iphone
		carettab();
	}

if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	carettab();
}*/

carettab();


	slider1 = $('.bxslider').bxSlider({
		pager: false,
		infiniteLoop: false,
		hideControlOnEnd: true
	});

	abt_slider = $('.abt-bxslider').bxSlider({
		minSlides: 2,
		maxSlides: 2,
		slideWidth: 1000,
		slideMargin: 10,
		pager: false,
		infiniteLoop: false,
		hideControlOnEnd: true
	});


	var ww = $(window).width();
	if (ww > 750) {
		slider2 = $('.other').bxSlider({
			minSlides: 2,
			maxSlides: 2,
			slideWidth: 1000,
			slideMargin: 10,
			pager: false
		});
		$('.bxslider2').bxSlider({
			pager: false,
			infiniteLoop: false,
			hideControlOnEnd: true
		});
	}

	$('a[aria-controls="abt-history"]').click(function() {
		setTimeout(function() {
			slider1.reloadSlider();
		}, 200);
	});

	$('a[aria-controls="abt-haas"]').click(function() {
		setTimeout(function() {
			abt_slider.reloadSlider();
		}, 200);
	});




	$('a[aria-controls="oth-res"]').click(function() {
		if (ww > 750) {
			setTimeout(function() {
				slider2.reloadSlider();
			}, 200);
		}
	});

});
$(window).load(function() {
	var winwid = $(window).width();
	if (winwid > 992) {
		var maxHeight = -1;
		$('div.find-height').each(function() {
			maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
		});


		$('div.find-height').css('min-height', (maxHeight - 70) + "px");


		var maxHeight1 = -1;
		$('div.other-height').each(function() {
			maxHeight1 = maxHeight1 > $(this).height() ? maxHeight1 : $(this).height();
		});
		$('div.other-height').each(function() {
			$(this).css('min-height', maxHeight1 + "px");
		});
	}
});

$(window).resize(function(){
	/*if (navigator.userAgent.toLowerCase().indexOf("iphone") ==-1) {
		carettab();
	}*/
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	carettab();
}
});

function in_array( needle, haystack ) {
	var length = haystack.length;
	for(var i = 0; i < length; i++) if(haystack[i] == needle) return true;
	return false;
}