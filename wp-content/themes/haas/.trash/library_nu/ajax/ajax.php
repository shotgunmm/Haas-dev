<?
require_once( '../../../../../wp-load.php' );
errors();

if( isset( $_POST ) ) :

	$current_user = wp_get_current_user();
	$uid = $current_user->ID ? $current_user->ID : 1; 
	
	$post = array(
		'post_title' => $_POST['email'] . ' submitted an inquiry on ' . date('m/j/Y'),
		'post_type' => 'contact',
		'post_status' => 'publish',
		'post_author' => $uid
	);
	
	$post_ID = wp_insert_post( $post );
	
	$fields = array(
		'name',
		'email',
		'website',
		'subject',
		'comment'
	);
	
	foreach( $fields as $key => $field ) add_post_meta( $post_ID, $field, $_POST[ $field ], 1 );
					
// 		$to = get_admin_emails();		
/*
		$to = 'p.o.modest@gmail.com';
		$subject = 'New Inquiry @ ' . get_bloginfo( 'name' );
		$headers = 'From: "Flats at 44" <913@mediumstudio.com>';

		$br = "\n";		
		$message = $_POST['first-name'] . ' ' . $_POST['first-name'] . ' posted a message on ' . date('m d Y') . $br . $br;

		$message .= 'Go here to view the information: ' . get_bloginfo('url') . '/wp-admin/post.php?post=' . $post_ID . '&action=edit';

		wp_mail( $to, $subject, $message );
*/
		echo 1;

endif;
?>