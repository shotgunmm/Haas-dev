<?

// CORE APP FUNCTIONS HERE
	errors();
	
	// PRINT ANY KIND OF VARIABLE
	function print_a( $variable, $hide = false ) {
		$style = $hide ? ' style="display:none"' : '';
		echo '<pre' . $style . '>';
		print_r( $variable );
		echo '</pre>';
	}

	function errors() {
		error_reporting(E_ALL);
		ini_set('display_errors', 1);
	}
	
	function has_val( $value ) {
		if( isset( $value ) ) if( trim( $value ) != '' ) return true;
		return false;
	}
	

// THEME FUNCTIONS
	add_theme_support( 'post-thumbnails' ); 

	remove_role('author');
	remove_role('contributor');
	remove_role('editor');
	remove_role('subscriber');


// EXTEND WORDPRESS
	function is_login_page() {
	    return in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') );
	}
	
	function get_featured_image_uri( $id ) {
		return wp_get_attachment_url( get_post_thumbnail_id( $id ) );
	}

	function build_object( $post, $type = false ) {
		$prefix = $type ? $type . '_' : '';
		$id = ! in_array( $type, array( false, 'user' ) ) ? $post->term_id : $post->ID;
		foreach( get_fields( $prefix . $id ) as $key => $value ) $post->{ str_replace('-', '_', $key) } = $value;
		return $post;
	}
	
	function get_surrounding_numbers( $start, $surrounding, $min, $max ) {
		$return = array();
		$possibilities = range( $min, $max );
		if( ( $start - $surrounding ) <= $min ) for( $i = $min; $i <= ( $min + $surrounding + 2 ); $i++ ) $return[] = $i;
		if( ( $start + $surrounding ) >= $max  ) for( $i = $max; $i >= ( $max - $surrounding - 2 ); $i-- ) $return[] = $i;
		if( empty( $return ) ) for( $i = ( $start - $surrounding ); $i <= ( $start + $surrounding ); $i++ ) $return[] = $i;
		foreach( $return as $key => $value ) if( ! in_array( $value, $possibilities ) ) unset( $return[ $key ] );
		asort( $return );
		return array_unique( $return );
	}	

	function post_type_archive( $post_type, $link_base = '' ) {
		global $wpdb, $wp_locale;
	
		$last_changed = wp_cache_get( 'last_changed', 'posts' );
		if ( ! $last_changed ) :
			$last_changed = microtime();
			wp_cache_set( 'last_changed', $last_changed, 'posts' );
		endif;
	
		$query = "SELECT YEAR(post_date) AS `year`, MONTH(post_date) AS `month`, count(ID) as posts FROM $wpdb->posts WHERE post_type = '$post_type' AND post_status = 'publish' GROUP BY YEAR(post_date), MONTH(post_date) ORDER BY post_date DESC";
		$key = md5( $query );
		$key = "wp_get_archives:$key:$last_changed";
		if ( ! $results = wp_cache_get( $key, 'posts' ) ) :
			$results = $wpdb->get_results( $query );
			wp_cache_set( $key, $results, 'posts' );
		endif;
	
		if ( $results ) :
			echo '<ul>';
			foreach ( (array) $results as $result ) :
				echo '<li><a href="' . $link_base . '?year=' . $result->year . '&month=' . $result->month . '">' . date( 'F Y', strtotime( $result->month . '/01/' . $result->year ) ) . '</a>';
			endforeach;
			echo '</ul>';
		endif;
	}


// GLOBALS		
	
	// PAGE GLOBALS	(sets up all pages and preloads them with their custom fields- changes custom field names from '-' to '_')
	$uri = explode( '/', trim( $_SERVER['REQUEST_URI'], '/' ) );
	$single_page = count( array_intersect( $uri, array( 'news-events', 'careers' ) ) ) <= 0 ? true : false; 
	
	$pages = array(
		5 => 'home',
		7 => 'about_us',
		9 => 'varieties',
		11 => 'products',
		13 => 'resources',
		15 => 'partners',
		17 => 'why_haas',
		19 => 'contact_us'
	);
	
	foreach( $pages as $id => $page ) ${$page} = build_object( get_post( $id ) );
?>