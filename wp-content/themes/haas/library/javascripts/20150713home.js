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

$('document').ready(function() {
	
	var teamBxSlider = $('#team-box').bxSlider({ 'pager' : 0, 'infiniteLoop' : 0 });
	
	$('.tab-reset-overview').on('click', function(){
// 		console.log('test');
	})
	$('.tab-reset-overview a[href="#abt-meet"]').on('click', function(){
		$('#team-box').css('opacity', 0);
		setTimeout(function(){ teamBxSlider.reloadSlider(); $('#team-box').animate({ 'opacity' : 1 }, 1000) }, 750 );
	})
	
	$('.divisions li a').on('click', function(){
		
		$('.divisions li a').removeClass('active');
		var division = $(this).addClass('active').attr('href')
		
		$('.team-member').removeClass('display').attr('data-transfer', '-1');
		
		if( division == '#' ) {
			var transfercount = 0;
			$('.team-member').each(function(){
				$(this).addClass('display').attr('data-transfer', transfercount );
				$('#temp-space').append( $(this) );
				transfercount++;
			})
			
		} else {
			var transfercount = 0;
			$('.team-member').each(function(){
				var divisions = $(this).attr('data-divisions').split('|');
				if( in_array( division, divisions ) ) {
					$(this).addClass('display').attr('data-transfer', transfercount );;
					transfercount++
				}
				$('#temp-space').append( $(this) );
			})
		}

		$('#team-box').empty()
		var total = Math.ceil( $('#temp-space .team-member.display').length / 8 );
		for( var i = 0; i < total; i++ ) {
			$('#team-box').append('<li class="slide' + i + '"><ul class="meet-team"></ul></li>');
			for( s = 0; s < 8; s++ ) {
				if( $('#temp-space .team-member[data-transfer="' + ( ( i * 8 ) + s ) + '"]').length > 0 ) {
					$('#team-box .slide' + i + ' ul.meet-team').append( $('#temp-space .team-member[data-transfer="' + ( ( i * 8 ) + s ) + '"]') )
				}
			}
		}

		teamBxSlider.reloadSlider();

		return false;
	})
	
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
		//console.log('hello');
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