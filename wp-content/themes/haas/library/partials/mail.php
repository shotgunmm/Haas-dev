<?php
session_start();
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );
$emailErr = ''; 
//if(isset($_POST['download'])){
$headers = 'Content-type: text/html;charset=utf-8' . "\r\n";
	$email = $_POST['email'];
	$to=$from = get_option('library_from');
	$to = explode(',',$to);
	$first = $_POST['first'];
	$last = $_POST['last'];
	$company = $_POST['company'];
	$subject = get_option('library_subject');
	$message = 'First Name: '.$first.'<br> Last Name: '.$last.'<br>Email: '.$email.'<br>Company: '.$company.'';
	$header = "From: ".$from;	//echo $to.' to'.$subject.' sub'.$message.'mes '.$header;
	if(wp_mail($to,$subject,$message, $headers)){
		echo $_SESSION['msg'] = "Thank you for downloading.";		
	}else{
		//echo $_SESSION['msg'] = "ERROR";			
	}
	
//}
?>