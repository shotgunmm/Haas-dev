<? /* Template Name: Single News & Events  */ ?>

<? get_header() ?>

<?php

	$cat_args = array(
	'post_type' => 'news-events',
	'tax_query' => array(
		array(
			'taxonomy' => 'news-events',
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

<section id="event" data-speed="4" data-type="background">
	<div class="container">
		<div class="row">
			<h2 class="event-title" id="resource-menu-nav">NEWS & EVENTS</h2>

			<div class="col-md-8">
				<div class="event-block">
					<div class="event-block-inner">
						<div class="event-sub-container">								
							<div class="event-container">
								<div class="col-md-2 image">
									<div class="icon-posted">
										<? if(in_array(get_the_ID(),$events_posts_ids)){ ?>
											<img src="<?= get_template_directory_uri() ?>/library/images/event-icon.png" class="img-responsive" alt="">
										<? }else{ ?>
											<img src="<?= get_template_directory_uri() ?>/library/images/news-icon.png" class="img-responsive" alt="news-icon">
										<? } ?>
									</div>
								</div>

								<div class="col-md-10 title">
									<h3><?= get_the_title() ?></h3>
									<!--<span class="posted">Posted by <?= get_the_author() ?> on <?= get_the_date( 'M j, Y' ) ?></span> -->
									<span class="posted"><?= get_the_date( 'M j, Y' ) ?></span>
								</div>

								<? if( get_featured_image_uri( get_the_ID() ) ) : ?>
								<div class="posited-img"><img src="<?= get_featured_image_uri( get_the_ID() ) ?>" class="img-responsive" alt=""></div>
							<? endif ?>

							<?= apply_filters( 'the_content', $post->post_content ) ?>

							<div class="line-divider"><img src="<?= get_template_directory_uri() ?>/library/images/divider.png" width="509" height="43" alt=""></div>
							<!--<a class="" href="<?= get_bloginfo('url') ?>/news-events">&#65513; back</a>-->
						</div>										
					</div>
				</div>
			</div>
		</div>

		<? get_sidebar() ?>
	</div>
</div>
</section>
<? get_footer() ?>