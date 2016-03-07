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
		'first_name',
		'last_name',
		'email',
		'company',
		'subject',
		'comment'
	);
	
	
	foreach( $fields as $key => $field ) add_post_meta( $post_ID, $field, $_POST[ $field ], 1 );

	//$to = 'p.o.modest@gmail.com';
	//$to = 'info@johnihaas.com';
	//$subject = 'New Inquiry @ ' . get_bloginfo( 'name' );
$to = get_option('to_name');
//	$to = "testingshotgunflat@gmail.com";
	$subject = get_option('to_subject');
	$headers = 'From: "HAAS" <service@shotgunflat.com>';

	$br = "\n";		
	$message = $_POST['first_name'] .' '. $_POST['last_name'] . ' asked a question on ' . date('m j, Y') . $br . $br;

	$message .= 'Go here to view the inquiry: ' . get_bloginfo('url') . '/wp-admin/post.php?post=' . $post_ID . '&action=edit';

	if( wp_mail( $to, $subject, $message ) ) :
		$response['status'] = true;
		//$response['msg'] = "Thank you for your interest in Haas. Your inquiry is appreciated and we will respond to you as soon as possible. Cheers.";
		$response['msg'] = get_option('to_thank');
	else :
		$response['status'] = false;
		//$response['msg'] = "We're sorry, there seems to have been an error. Please refresh the page and try again.";
		$response['msg'] = get_option('to_error');
	endif;

	echo json_encode($response);
	
endif;
?>