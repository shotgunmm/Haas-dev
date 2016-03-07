jQuery(document).ready(function() {
    jQuery('.gallery-icon a').fancybox(
      {'overlayShow': true, 'hideOnContentClick': true, 'overlayOpacity': 0.85,
		callbackOnShow		:	function(){if(($(window).width()>=768)&&($(window).width()<=1024)) {var win=$(window).scrollTop();console.log(win);$('body').css('overflow','hidden');$('body').animate({'scrollTop': win});}},
		callbackOnClose		:	function(){$('body').css('overflow','visible');},}
    );
});
