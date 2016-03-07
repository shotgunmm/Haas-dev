<? global $single_page ?>
<? global $post, $page ?>
<? global $contact_us ?>

<footer class="footer">
	<p class="footer-para"><?= $contact_us->footer ?></p>

</footer>
		<script>
			var template_directory = '<?= get_template_directory_uri() ?>';
			var single_page = <?= $single_page ? 'true' : 'false' ?>;
			<? if( $single_page ) : ?>
				var initial_scroll_element = 'nav a[link="<?= site_url() ?><? if( ! is_home() ) : ?>/<?= $post->post_name ?><? endif ?>"]';
				console.log( initial_scroll_element )
			<? endif ?>
		</script>
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/bootstrap.min.js"></script> 
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/jquery.easing.min.js"></script> 
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/scrolling-nav.js"></script> 
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/hamburger.js"></script> 
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/jquery.mCustomScrollbar.concat.min.js"></script>
		<script src="<?= get_template_directory_uri() ?>/library/javascripts/init.js"></script>
		
<script>
    (function($){
      $(window).load(function(){
        
        $(".product-list").mCustomScrollbar({
          setHeight:450,
          theme:"haas"
        });
        
          $(".var-sort-list").mCustomScrollbar({
          setHeight:300,
          theme:"haas"
        });
        
      });
    })(jQuery);
  </script>

  	<?php  wp_footer();?>
	</body>

</html>
