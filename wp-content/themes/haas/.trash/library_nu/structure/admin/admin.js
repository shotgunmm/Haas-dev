jQuery(function( $ ){
	$(document).ready(function(){
		
		$('#menu-posts-contact').before('<li class="wp-not-current-submenu wp-menu-separator"><div class="separator"></div></li>');
		
		// INQUIRY PAGE
		$('body.post-php.post-type-contact #poststuff').find('input,textarea').each(function(){
			$(this).attr('disabled','disabled');
		})
	})
})