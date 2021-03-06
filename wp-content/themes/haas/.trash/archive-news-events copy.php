<? /* Template Name: News & Events  */ ?>

<?
	// MAIN
$main_args = array(
	'post_type' => 'news-events',
	'posts_per_page' => 4
	);

if( isset( $_GET['search'] ) ) $main_args['s'] = $_GET['search'];
if( isset( $_GET['paginate'] ) ) $main_args['paged'] = $_GET['paginate'];
if( isset( $_GET['y'] ) ) $main_args['year'] = $_GET['y'];
if( isset( $_GET['month'] ) ) $main_args['monthnum'] = $_GET['month'];
if( isset( $_GET['author'] ) ) $main_args['author_name'] = $_GET['author'];
if( isset( $_GET['category'] ) ) $main_args['tax_query'] = array( array( 'taxonomy' => 'news-events', 'field' => 'slug', 'terms' => $_GET['category'] ) );

$main = new WP_Query( $main_args );

$cat_args = array(
	'post_type' => 'news-events',
	'tax_query' => array(
		array(
			'taxonomy' => 'news-events',
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

<section id="event" data-speed="4" data-type="background">
	<div class="container">
		<div class="row">
			<h2 class="event-title" id="resource-menu-nav">NEWS & EVENTS</h2>

			<? if( isset( $_GET['search'] ) ) : ?><h3 class="search news">Results for: <em><?= $_GET['search'] ?></em></h3><? endif ?>

			<div class="col-md-8">
				<div class="event-block">
					<div class="event-block-inner">
						<div class="event-sub-container">

							<? if( $main->have_posts() ) : ?>
							<? while( $main->have_posts() ) : ?>
							<? $main->the_post() ?>
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
									<a href="<?= get_permalink() ?>"><h3><?= get_the_title() ?></h3></a>
									<span class="posted"><?= get_the_date( 'M j, Y' ) ?></span>
								</div>

								<? if( get_featured_image_uri( get_the_ID() ) ) : ?>
								<div class="posited-img"><img src="<?= get_featured_image_uri( get_the_ID() ) ?>" class="img-responsive" alt=""></div>
							<? endif ?>

							<?= apply_filters( 'the_content', get_the_content() ) ?>

							<div class="line-divider"><img src="<?= get_template_directory_uri() ?>/library/images/divider.png" width="509" height="43" alt=""></div>
						</div>										
					<? endwhile ?>

				<? else : ?>
				<div class="event-container">
					<h3>Sorry no results found.</h3>
					<a href="<?= site_url() ?>/news-events"><h4>Please expand your search</h4></a>
					<a class="" href="<?= get_bloginfo('url') ?>/news-events">&#65513; back</a>
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
		<li><a class="button" href="/blog<?= $q ? '?' . ltrim( $q, '&' ) : '' ?>">&lt;&lt;</a></li>
		<li><a class="button" href="/news-events/?paginate=<?= $pagaginate - 1 ?><?= $q ?>">&lt;</a></li>
	<? endif ?>

	<? foreach( get_surrounding_numbers( $pagaginate, 2, 1, $main->max_num_pages ) as $link ) : ?>
	<li><a class="button<? if( $link == $pagaginate ) : ?> active<? endif ?>" href="/news-events/?paginate=<?= $link ?><?= $q ?>"><?= $link ?></a></li>
<? endforeach ?>

<? if( $main->max_num_pages != $pagaginate ) : ?>
<li><a class="button" href="/news-events/?paginate=<?= ( $pagaginate + 1 ) ?><?= $q ?>">&gt;</a></li>
<li><a class="button" href="/news-events/?paginate=<?= ( $main->max_num_pages ) ?><?= $q ?>">&gt;&gt;</a></li>
<? endif ?>
</ul>
<? endif ?>
</div>
</div>

<? get_sidebar() ?>
</div>
</div>
</section>
<? get_footer() ?>