<?
	/* ADMIN QUERY FUNCTIONS */
	function pre_query( $query ) {
		
		if( $query->is_admin && isset( $_GET['post_type'] ) ) :
			
			if( in_array( $_GET['post_type'], array( 'case-study', 'job' ) ) ) : 
				$query->set( 'orderby', 'title' );
				$query->set( 'order', 'ASC' );
			endif;

		endif;	
		
		return $query;
		
	}
	add_filter('pre_get_posts', 'pre_query');

	/* ASSETS */
	
	// STYLES AND SCRIPTS
	function admin_styles_scripts() {
		wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/library/structure/admin/admin.css' );
		wp_enqueue_script( 'script-name', get_template_directory_uri() . '/library/structure/admin/admin.js', array(), '1.0.0', true );
	}
	add_action( 'admin_enqueue_scripts', 'admin_styles_scripts' );
	
	// HIDE WP UPDATES
	function hide_update_banners() { remove_action( 'admin_notices', 'update_nag', 3 ); }
	add_action( 'admin_menu','hide_update_banners' );

	// ADMIN FOOTER ( LEFT )
	function admin_footer_left() { echo ''; }
	add_filter( 'admin_footer_text', 'admin_footer_left' );
	
	// ADMIN FOOTER ( RIGHT )
	function admin_footer_right() { return '<a href="http://holland-mark.com" class="hm-link"><img src="' . get_template_directory_uri() . '/library/images/holland-mark.png" /></a> <span>x</span> <a href="http://shotgunflat.com" class="sgf-link"><img src="' . get_template_directory_uri() . '/library/images/shotgunflat.png" /></a> '; }
	add_filter( 'update_footer', 'admin_footer_right', 100 );

	// SHOTGUNFLAT COLOR SCHEME
	function add_color_scheme() {
		wp_admin_css_color(
			'shotgunflat',
			__( 'Shotgunflat', 'shotgunflat-color-scheme' ),
			get_template_directory_uri() . '/library/structure/admin/shotgunflat.css',
			array( '#231f20', '#ab0635', '#808285', '#ab0635' )
		);
	}
	function load_default_css() {
		global $wp_styles;
		$color_scheme = get_user_option( 'admin_color' );
		if ( 'shotgunflat' === $color_scheme || in_array( get_current_screen()->base, array( 'profile', 'profile-network' ) ) ) :
			$wp_styles->registered[ 'colors' ]->deps[] = 'colors-fresh';
		endif;
	}
	add_action( 'admin_enqueue_scripts', 'load_default_css' );
	add_action( 'admin_init', 'add_color_scheme' );
	
	/* SET COLOR SCHEME */
	function set_color_scheme( $user_login, $user ) {
		update_user_meta( $user->ID, 'admin_color', 'shotgunflat' );
	}
	add_action('wp_login', 'set_color_scheme', 10, 2);

	
	/* DASHBOARD */
	function remove_dashboard_meta() {
		remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
		remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');//since 3.8
	}
	add_action( 'admin_init', 'remove_dashboard_meta' );
?>