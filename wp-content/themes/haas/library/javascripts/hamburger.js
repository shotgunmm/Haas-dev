/**
* hamburger.js
*
* Mobile Menu Hamburger
* =====================
* A hamburger menu for mobile websites
*
* Created by Thomas Zinnbauer YMC AG | http://www.ymc.ch
* Date: 21.05.13
*/

$(document).ready(function(){
	$('#hamburger').on('click',function(){
		var $this = $(this);
		$(this).toggleClass('active').promise().done(function(){
			if($this.hasClass('active')){
				$('div.navsection').css('display','block');
				$('div.navsection').css('opacity', 1);
				$('div.navsection ul').css('display','block');
				$('div.navsection').animate({"marginRight": ["70%", 'easeOutExpo']}, {
					duration: 700
				});
			}else{
				$('div.navsection').css('display','none');
				$('div.navsection').css('opacity', 0);
				$('div.navsection ul').css('display','none');
				$('div.navsection').animate({"marginRight": ["-1", 'easeOutExpo']}, {
					duration: 700
				});
			}

		});
	});

	$('div.navsection ul li a.page-scroll').on('click',function(){
		$('#hamburger').trigger('click');
	});
});







/*
document.querySelector( "#hamburger" )
.addEventListener( "click", function() {
this.classList.toggle( "active" );
});
jQuery(document).ready(function () {


//Open the menu
jQuery("#hamburger").click(function () {

if(jQuery(this).hasClass('active')){
//jQuery('.navbar-nav').show();
jQuery('.navsection').show();
jQuery('.navbar-nav').show();
//jQuery('#content').css('min-height', jQuery(window).height());

jQuery('div.navsection').css('opacity', 1);

//set the width of primary content container -> content should not scale while animating
var contentWidth = jQuery('#content').width();

//set the content with the width that it has originally
jQuery('#content').css('width', contentWidth);

//display a layer to disable clicking and scrolling on the content while menu is shown
jQuery('#contentLayer').css('display', 'block');

//disable all scrolling on mobile devices while menu is shown
jQuery('.navsection').bind('touchmove', function (e) {
e.preventDefault()
});

//set margin for the whole container with a jquery UI animation
jQuery(".navsection").animate({"marginRight": ["70%", 'easeOutExpo']}, {
duration: 700
});


}else{

//enable all scrolling on mobile devices when menu is closed
jQuery('.navsection').unbind('touchmove');
//jQuery('.navbar-nav').hide();
jQuery('.navbar-nav').hide();
jQuery('.navsection').hide();

//set margin for the whole container back to original state with a jquery UI animation
jQuery(".navsection").animate({"marginRight": ["-1", 'easeOutExpo']}, {
duration: 700,
complete: function () {
jQuery('#content').css('width', 'auto');
jQuery('#contentLayer').css('display', 'none');
jQuery('div.navsection').css('opacity', 0);
jQuery('#content').css('min-height', 'auto');

}
});
}
return false;

});

//close the menu
jQuery("#contentLayer").click(function () {

//enable all scrolling on mobile devices when menu is closed
jQuery('#container').unbind('touchmove');

//set margin for the whole container back to original state with a jquery UI animation
jQuery("#container").animate({"marginLeft": ["-1", 'easeOutExpo']}, {
duration: 700,
complete: function () {
jQuery('#content').css('width', 'auto');
jQuery('#contentLayer').css('display', 'none');
jQuery('div.navsection').css('opacity', 0);
jQuery('#content').css('min-height', 'auto');

}
});
});

});

jQuery('div.navsection li a').on('click',function(){
jQuery('#hamburger').removeClass('active');
//enable all scrolling on mobile devices when menu is closed

jQuery('.navsection').unbind('touchmove');
//jQuery('.navbar-nav').hide();
jQuery('.navbar-nav').hide();
jQuery('.navsection').hide();

//set margin for the whole container back to original state with a jquery UI animation
jQuery(".navsection").animate({"marginRight": ["-1", 'easeOutExpo']}, {
duration: 700,
complete: function () {
jQuery('#content').css('width', 'auto');
jQuery('#contentLayer').css('display', 'none');
jQuery('div.navsection').css('opacity', 0);
jQuery('#content').css('min-height', 'auto');

}
});
});
*/