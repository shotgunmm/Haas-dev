<?

// CORE APP FUNCTIONS HERE
// 	errors();
	
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
	
	function custom_excerpt_more( $more ) {
		return '... &nbsp;<small><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a></small>';
	}
	add_filter( 'excerpt_more', 'custom_excerpt_more' );



// EXTEND WORDPRESS
	function is_login_page() {
	    return in_array( $GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php') );
	}
	
	function get_featured_image_uri( $id ) {
		return wp_get_attachment_url( get_post_thumbnail_id( $id ) );
	}

/*
	function build_object( $post, $type = false ) {
		$prefix = $type ? $type . '_' : '';
		$id = ! in_array( $type, array( false, 'user' ) ) ? $post->term_id : $post->ID;
		if( function_exists( 'get_fields' ) ) :
			foreach( get_fields( $prefix . $id ) as $key => $value ) $post->{ str_replace('-', '_', $key) } = $value;
		endif;
		return $post;
	}
*/
	function build_object( $post, $user = false ) {
		$prefix = $user ? 'user_' : '';
		if( is_numeric( $post ) ) $post = get_post( $post );
		foreach( get_fields( $prefix . $post->ID ) as $key => $value ) $post->{ str_replace('-', '_', $key) } = $value;
		$post->permalink = get_permalink( $post->ID );
		$post->featured = has_post_thumbnail( $post->ID ) ? get_post( get_post_thumbnail_id( $post->ID ) ) : false;
		if( $post->featured ) $post->featured->uri = isset( $post->featured->guid ) ? $post->featured->guid : false;
		foreach( get_object_taxonomies( $post->post_type ) as $tax ) $taxes[$tax] = wp_get_post_terms( $post->ID, $tax );
		$post->taxonomies = isset( $taxes ) ? (object) $taxes : array();
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
				echo '<li><a href="' . $link_base . '?y=' . $result->year . '&month=' . $result->month . '">' . date( 'F Y', strtotime( $result->month . '/01/' . $result->year ) ) . '</a>';
			endforeach;
			echo '</ul>';
		endif;
	}


// GLOBALS		
	
	// PAGE GLOBALS	(sets up all pages and preloads them with their custom fields- changes custom field names from '-' to '_')
	$uri = explode( '/', trim( $_SERVER['REQUEST_URI'], '/' ) );
	$single_page = count( array_intersect( $uri, array( 'news-events', 'careers', 'blog', 'library' ) ) ) <= 0 ? true : false; 
	
	$pages = array(
		5 => 'home',
		7 => 'about_us',
		9 => 'varieties',
		11 => 'products',
		13 => 'resources',
		15 => 'partners',
		17 => 'why_haas',
		19 => 'contact_us',
		23 => 'careers'
	);
	foreach( $pages as $id => $page ) ${$page} = build_object( get_post( $id ) );

	function register_my_page(){

		add_menu_page( 'Contact Us Details', 'Contact us Form Details', 'manage_options', 'contact_us_details', 'contact_us_info'); 

	}
	add_action( 'admin_menu', 'register_my_page' );

	// Modify capability
function contact_us_info() {
		if(isset($_POST['to_submit'])){
			update_option('to_name',$_POST['to_name']);
			update_option('to_subject',$_POST['to_subject']);
			update_option('to_thank',$_POST['to_thank']);
			update_option('to_error',$_POST['to_error']);
		}
		echo "<h2>Contact Us Form Details</h2>";		
		echo "<form method='POST'>";
		$to_name = get_option('to_name');
		$to_subject = get_option('to_subject');
		$to_thank = get_option('to_thank');
		$to_error = get_option('to_error');
		echo "<table>";
		echo "<tr><th>To: </th><td><input type='text' name='to_name' value='".$to_name."' required></td></tr>";
		echo "<tr><th>Subject: </th><td><input type='text' name='to_subject' value='".$to_subject."' ></td></tr>";
		echo "<tr><th>Thank you message: </th><td><input type='text' name='to_thank' value='".$to_thank."'></td></tr>";
		echo "<tr><th>Error message: </th><td><input type='text' name='to_error' value='".$to_error."'></td></tr>";
		echo "<tr><td colspan='2'><input type='submit' value='SUBMIT' name='to_submit'></td></tr>";
		echo "</table>";
		echo "</form>";		
	}

		function library_register_my_page(){

		add_menu_page( 'Library Details', 'Library Form Details', 'manage_options', 'library_details', 'library_form_info'); 

	}
	add_action( 'admin_menu', 'library_register_my_page' );

	// Modify capability
function library_form_info() {
		if(isset($_POST['library_submit'])){
			update_option('library_subject',$_POST['library_subject']);
			update_option('library_from',$_POST['library_from']);
			/*update_option('library_thanks',$_POST['library_thanks']);*/
		}
		echo "<h2>Library Form Details</h2>";		
		echo "<form method='POST'>";		
		$library_subject = get_option('library_subject');
		$library_from = get_option('library_from');
		$library_thanks = get_option('library_thanks');
		echo "<table>";		
		echo "<tr><th>To: </th><td><input type='text' name='library_from' value='".$library_from."' ></td></tr>";
		echo "<tr><th>Subject: </th><td><input type='text' name='library_subject' value='".$library_subject."' ></td></tr>";
		/*echo "<tr><th>Email Thank You Message: </th><td><input type='text' name='library_thanks' value='".$library_thanks."' ></td></tr>";*/
		echo "<tr><td colspan='2'><input type='submit' value='SUBMIT' name='library_submit'></td></tr>";
		echo "</table>";
		echo "</form>";		
	}

	add_action( 'after_setup_theme', 'baw_theme_setup' );
	function baw_theme_setup() {	 
	  add_theme_support('post-thumbnails');
	  if ( function_exists('add_image_size') ) { 
	  	add_image_size( 'blog-thumb', 508, 193 , true ); 
	  }
	}	
?>