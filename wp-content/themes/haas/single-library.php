<? /* Template Name: Single Library  */ ?>
<?php 
error_reporting(0);
?>


<? get_header() ?>

<?php

	$cat_args = array(
	'post_type' => 'library',
	'tax_query' => array(
		array(
			'taxonomy' => 'library',
			'field' => 'id'
			)
		)
	);

	$events_args = $cat_args;

	$events_args['tax_query'][0]['terms'] = 24;
	$recent_events = new WP_Query( $events_args );


	$events_posts_ids = array();
		if( $recent_events->have_posts() ) :
			while( $recent_events->have_posts() ) :  $recent_events->the_post() ;
				$events_posts_ids[] = get_the_ID();
			endwhile; 
		endif;

wp_reset_postdata();	

?>

<section id="library-pg" data-speed="4" data-type="background" class="library">
	<div class="container">
		<div class="row">
			<h2 class="event-title" id="resource-menu-nav">RESOURCE LIBRARY</h2>

			<div class="col-md-12">
				<div class="event-block">
					<div class="event-block-inner">
						<div class="event-sub-container">								
							<div class="event-container">
								

								<div class="col-md-10 title">
									<h3><b><?= get_the_title() ?></b></h3>
									<!--<span class="posted">Posted by <?= get_the_author() ?> on <?= get_the_date( 'M j, Y' ) ?></span> -->
									<span class="posted"><?php the_author(); ?><?php // get_the_date( 'M j, Y' ); ?></span>
								</div>
								<div class="share">
						
						<span>Share</span>
						<?php  echo do_shortcode('[feather_share]'); ?>
						</div>
							 <!--div class="col-md-2 image">
									<div class="icon-posted">
										<img src="<?= get_template_directory_uri() ?>/library/images/news-icon.png" class="img-responsive" alt="news-icon">
										<?php// if(has_post_thumbnail()){
												//$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail',true);?>
												<img src="<?php //echo $img[0];?>" class="img-responsive">
										<?php// }else{ ?>									
												<img src="<?= get_template_directory_uri() ?>/library/images/square-image-placeholder.png" class="img-responsive" alt="plae-holder">
										<?php// } ?>
									</div>
								</div--> 
								<? /*if( get_featured_image_uri( get_the_ID() ) ) : ?>
								<div class="posited-img"><img src="<?= get_featured_image_uri( get_the_ID() ) ?>" class="img-responsive" alt=""></div>
							<? endif */?>
							<div class="lib-content">
								<?//apply_filters( 'the_content', $post->post_content ) ?>
<div class="col-md-7 right-padd lib-form-image">
									<a href="<?= get_featured_image_uri( get_the_ID() ) ?>"><img class="alignleft size-full wp-image-1062" src="<?= get_featured_image_uri( get_the_ID() ) ?>" alt="Haas-Beer Pour" width="440" height="294" /></a>
								</div>
								<? if(get_field('upload_pdf')){ ?>
								<div class="left-padd"><?= get_sidebar() ?></div>
								<? } ?>
								<div class="col-md-12 no-padd">
									<?= apply_filters( 'the_content', $post->post_content ) ?>

									<?php 
									if(get_field('info_content', '851')){
										$info_content = get_field('info_content');
										foreach ( $info_content as $info ) {
											?>
											<div class="info">
												<h3><b><?= $info['title']; ?> </b></h3>
												<?= $info['content']; ?>
												<?php
											}
											?>
										</div>
										<? }  ?>
									</div>	
							<div class="line-divider"><img src="<?= get_template_directory_uri() ?>/library/images/divider.png" width="509" height="43" alt=""></div>
							<!--<a class="" href="<?= get_bloginfo('url') ?>/library">&#65513; back</a>-->
																
					</div>
				</div>
			</div>
			<?php// get_sidebar() ?>
		</div>		
	</div>
</div>

</section>

<style>
h5{float:left;}
</style>
<? get_footer() ?>
