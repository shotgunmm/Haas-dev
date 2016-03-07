<?	
/* PRINT HTML FUNCTIONS */
	
function haas_title() {
	if( get_the_title() == 'HOME' ) return 'HAAS';
	else if( is_page_template( 'archive-news-events.php' ) ) return 'News and Events | HAAS';
	else return get_the_title() . ' | ' . 'HAAS';
}

function is_single_page() {
	global $home, $about_us, $varieties, $products, $resources, $partners, $why_haas, $contact_us;
	foreach( array( $home, $about_us, $varieties, $products, $resources, $partners, $why_haas, $contact_us ) as $page ) $titles[] = $page->post_name;
	$titles[] = '';
	if( in_array( get_query_var( 'name' ), $titles ) ) return true;
	else return false;
}
	
function product_list_item( $product, $class = false ) {
	$product = build_object( $product );
	?>
		<li<? if( $class ) : ?> class="<?= $class ?>"<? endif ?>>
			<h6><?= $product->post_title ?></h6>
			<? if( $product->product_tech_specs || $product->product_safety_info ) : ?>
				<ul class="pro-down">
					<li>DOWNLOADS:</li>
					<? if( $product->product_tech_specs ) : ?><li><a href="<?= $product->product_tech_specs ?>" target="_blank">TECH SPECS</a></li><? endif ?>
					<? if( $product->product_safety_info ) : ?><li><a href="<?= $product->product_safety_info ?>" target="_blank">SAFETY INFO</a></li><? endif ?>
				</ul>
			<? endif ?>
		</li>
	<?
}

function get_bold_first_word( $words ) {
	$words = explode( ' ', trim( $words ) );
	$first = $words[0];
	unset( $words[0] );
	return '<strong>' . $first . '</strong> ' . implode( ' ', $words );
}

function format_product_title( $title ) {
	return str_replace( ' ', '<br/>', get_bold_first_word( strtoupper( $title ) ) );
}