<?
	function custom_login() {
		wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/library/structure/admin/shotgunflat.css' );
		?>
			<style>
				#login { padding-top: 13%; }
				body.login div#login h1 a {
					width: 320px;
					height: 77px;
					background-size: 100%;
					background-image: url(<?= get_template_directory_uri() ?>/library/images/login-logo.png);
					margin-left: 0;
				}
			</style>
		<?
	}
	add_action( 'login_enqueue_scripts', 'custom_login' );
	
	function login_logo_url(){ return ( get_bloginfo('url') ); }
	add_filter('login_headerurl', 'login_logo_url');
?>