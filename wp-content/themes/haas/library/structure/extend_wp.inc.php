<?
	// EXTEND WORDPRESS
	
	function tiny_excerpt( $excerpt, $limit = 20 ) {
		$excerpt = str_replace( array( '<p>', '</p>' ), '', $excerpt );
		$excerpt = strip_tags($excerpt);
		$words = explode( ' ', $excerpt );
		return implode( ' ', array_splice( $words, 0, $limit ) ).'...';
	}
	
	
?>
