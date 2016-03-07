<? /* Template Name: Blog  */ ?>

<?
	// MAIN
$main_args = array(
	'post_type' => 'blog',
	'posts_per_page' => 4
	);

if( isset( $_GET['search'] ) ) $main_args['s'] = $_GET['search'];
if( isset( $_GET['paginate'] ) ) $main_args['paged'] = $_GET['paginate'];
if( isset( $_GET['y'] ) ) $main_args['year'] = $_GET['y'];
if( isset( $_GET['month'] ) ) $main_args['monthnum'] = $_GET['month'];
if( isset( $_GET['author'] ) ) $main_args['author_name'] = $_GET['author'];
if( isset( $_GET['category'] ) ) $main_args['tax_query'] = array( array( 'taxonomy' => 'blog', 'field' => 'slug', 'terms' => $_GET['category'] ) );

$main = new WP_Query( $main_args );

$cat_args = array(
	'post_type' => 'blog',
	'tax_query' => array(
		array(
			'taxonomy' => 'blog_cat',
			'field' => 'id'
			)
		)
	);

$news_args = $events_args = $cat_args;
$news_args['tax_query'][0]['terms'] = 23;
$events_args['tax_query'][0]['terms'] = 24;


$recent_events = new WP_Query( $events_args );
$recent_news = new WP_Query( $news_args );

$news_posts_ids = array();
		if( $recent_news->have_posts() ) :
			while( $recent_news->have_posts() ) :  $recent_news->the_post() ;
				$news_posts_ids[] = get_the_ID();
			endwhile; 
		endif;
$events_posts_ids = array();
		if( $recent_events->have_posts() ) :
			while( $recent_events->have_posts() ) :  $recent_events->the_post() ;
				$events_posts_ids[] = get_the_ID();
			endwhile; 
		endif;
?>

<? get_header() ?>

							
  <?php // add_filter("the_content", "plugin_myContentFilter");

  function plugin_myContentFilter($content)
  {
    $start = strpos($content, '<p>'); 
    if($start >= 5){
    	$start = 0;
    }
 	
	$pos = strpos($content, '</p>');

	if($pos >= 300){
		$pos = 200;
	}
	
    return substr($content,$start,$pos);
  } ?>

<section id="blog" data-speed="4" data-type="background" class="blog">
	<div class="container">
		<div class="row">
			<h2 class="event-title" id="resource-menu-nav">THE HAAS BLOG</h2>

			<? if( isset( $_GET['search'] ) ) : ?><h3 class="search news">Results for: <em><?= $_GET['search'] ?></em></h3><? endif ?>

			<div class="col-md-8">
				<div class="event-block">
					<div class="event-block-inner">
						<div class="event-sub-container">

							<? if( $main->have_posts() ) : ?>
								<? while( $main->have_posts() ) : ?>
									<? $main->the_post() ?>
										<div class="event-container">
											
											<div class="col-md-10 title" style="height:auto;">
												<a href="<?= get_permalink() ?>"><h3><?= get_the_title() ?></h3></a>
												<span class="posted"><?= get_the_date( 'M j, Y' ) ?></span>
												<span class="author"><?= get_the_author() ?></span>
											</div>
			
											<?/* if( get_featured_image_uri( get_the_ID() ) ) : ?>
											<div class="posited-img"><img src="<?= get_featured_image_uri( get_the_ID() ) ?>" class="img-responsive" alt=""></div>
										<? endif */?>
			
										<? if( has_post_thumbnail()) : 								
												$img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-thumb',true);//print_r($img)?>
											<div class="posited-img tme"><img src="<?php echo $img[0] ?>" class="img-responsive" alt=""></div>
										<? endif ?>
			
										<?php
			
											$content = get_the_content();
											//$pos = strpos($content, '\n');
											
												$pos = 240;
											
											echo '<p>' . substr( strip_tags( $content ), 0, $pos ) . '</p>';
										/*ob_start();
										the_content();
										$content = ob_get_clean();
			
										*/
			
										 ?>
										<div class="more"><a href="<?= get_permalink() ?>">More &gt;</a></div>
										<div class="line-divider"><img src="<?= get_template_directory_uri() ?>/library/images/divider.png" width="509" height="43" alt=""></div>
									</div>										
								<? endwhile ?>

							<? else : ?>
								<div class="event-container">
									<h3>Sorry no results found.</h3>
									<a href="<?= site_url() ?>/blog"><h4>Please expand your search</h4></a>
									<a class="" href="<?= get_bloginfo('url') ?>/blog">&#65513; back</a>
								</div>
							<? endif ?>

						</div>
					</div>

					<? if( $main->have_posts() ) : ?>
						<?
							$pagaginate = isset( $_GET['paginate'] ) ? $_GET['paginate'] : 1;
							$q = '';
							foreach( $_GET as $key => $value ) if( $key != 'paginate' ) $q = '&' . $key . '=' . $value;							
						?>
						<ul class="blog-pagination">
							<? if( $pagaginate != 1 ) : ?>
								<!--<li><a class="button" href="/blog<?= $q ? '?' . ltrim( $q, '&' ) : '' ?>">&lt;&lt;</a></li>-->
								<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=1">&lt;&lt;</a></li>
								<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= $pagaginate - 1 ?><?= $q ?>">&lt;</a></li>
							<? endif ?>
					
							<? foreach( get_surrounding_numbers( $pagaginate, 2, 1, $main->max_num_pages ) as $link ) : ?>
								<li><a class="button<? if( $link == $pagaginate ) : ?> active<? endif ?>" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= $link ?><?= $q ?>"><?= $link ?></a></li>
							<? endforeach ?>
				
							<? if( $main->max_num_pages != $pagaginate ) : ?>
								<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= ( $pagaginate + 1 ) ?><?= $q ?>">&gt;</a></li>
								<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= ( $main->max_num_pages ) ?><?= $q ?>">&gt;&gt;</a></li>
							<? endif ?>
						</ul>
					<? endif ?>
				</div>
			</div>
			<? get_sidebar() ?>
		</div>
	</div>
</section>
<?php //remove_filter("the_content", "plugin_myContentFilter");?>
<? get_footer() ?>