
<?

/* HTML PARTS */

// 	if ( ! is_admin() && ! is_login_page() ) :
		include( 'library/structure/init.php' );
		include( 'library/structure/html.inc.php' );
		include( 'library/structure/extend_wp.inc.php' );
// 	endif;
	
	// CONTROL PANEL
	if ( is_admin() || is_login_page() ) include( 'library/structure/admin/admin.php' );

	// LOGIN PAGE
	if( is_login_page() ) include( 'library/structure/admin/login.php' );

	function get_tab_id($tab_id){
		if(isset($tab_id)){
			$start_pos = strpos($tab_id,'/');
			 $final_tab_id = substr($tab_id, $start_pos+1);
			 return $final_tab_id;
		}else{
			return 'abt-ovr';
		}
	}
?>
