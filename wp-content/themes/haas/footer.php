<? global $single_page ?>
<? global $post, $page ?>
<? global $contact_us ?>

<footer class="footer">
    <?php if(have_rows('footer_left_section',19)):?>
    <ul>
        <?php while(have_rows('footer_left_section',19)):the_row();?>
        <li>
            <a href="<?php echo home_url(); the_sub_field('footer_left_text_link',19); ?>">
                <?php the_sub_field('footer_left_text',19); ?>
            </a>
        </li>
        <?php endwhile; ?>
    </ul>
    <?php endif; ?>
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
