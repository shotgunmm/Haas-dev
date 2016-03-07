<? /* Template Name: Blog Taxonomy  */ ?>

<?
$term = get_term_by('slug', get_query_var('blog_cat'), 'blog_cat' );
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

//$main = new WP_Query( $main_args );

$cat_args = array(
	'post_type' => 'blog',
	'tax_query' => array(
		array(
			'taxonomy' => 'blog_cat',
			'field' => 'slug',
			'terms' => $term->slug
			)
		),
	'posts_per_page' => 4
	);


$cat_posts = new WP_Query( $cat_args );//echo "<pre>";print_r($cat_posts);exit;
//$title = $cat_posts['tax_query']['queries'][0]['terms'][0];

?>

<? get_header() ?>

<section id="blog" data-speed="4" data-type="background">
	<div class="container">
		<div class="row">
			<h2 class="event-title" id="resource-menu-nav">THE HAAS BLOG</h2>

			<? if( isset( $_GET['search'] ) ) : ?><h3 class="search news">Results for: <em><?= $_GET['search'] ?></em></h3><? endif ?>

			<div class="col-md-8">
				<div class="event-block">
					<div class="event-block-inner">
						<div class="event-sub-container">

							<? if( $cat_posts->have_posts() ) : ?>
							<? while( $cat_posts->have_posts() ) : ?>
							<? $cat_posts->the_post() ?>
							<div class="event-container">
								<div class="col-md-2 image">
									<div class="icon-posted">
										<img src="<?= get_template_directory_uri() ?>/library/images/news-icon.png" class="img-responsive" alt="news-icon">										
									</div>
								</div>

								<div class="col-md-10 title">
									<a href="<?= get_permalink() ?>"><h3><?= get_the_title() ?></h3></a>
									<span class="posted"><?= get_the_date( 'M j, Y' ) ?></span>
									<span class="author"><?= get_the_author() ?></span>
								</div>

								<? /*if( get_featured_image_uri( get_the_ID() ) ) : ?>
									<div class="posited-img"><img src="<?= get_featured_image_uri( get_the_ID() ) ?>" class="img-responsive" alt=""></div>
								<? endif*/ ?>

								<? if( has_post_thumbnail()) : 								
											$img = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'blog-thumb',true);//print_r($img)?>
										<div class="posited-img"><img src="<?php echo $img[0] ?>" class="img-responsive" alt=""></div>
									<? endif ?>

							
							<?= the_excerpt() ?>
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

	<? if( $cat_posts->have_posts() ) : ?>
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

	<? foreach( get_surrounding_numbers( $pagaginate, 2, 1, $cat_posts->max_num_pages ) as $link ) : ?>
	<li><a class="button<? if( $link == $pagaginate ) : ?> active<? endif ?>" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= $link ?><?= $q ?>"><?= $link ?></a></li>
<? endforeach ?>

<? if( $cat_posts->max_num_pages != $pagaginate ) : ?>
<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= ( $pagaginate + 1 ) ?><?= $q ?>">&gt;</a></li>
<li><a class="button" href="<?= get_bloginfo('url') ?>/blog/?paginate=<?= ( $cat_posts->max_num_pages ) ?><?= $q ?>">&gt;&gt;</a></li>
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