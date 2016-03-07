<?php
session_start();

	$pdf =$_GET['pdf'];
	header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename=John_I_Haas_Advanced_Hop_Bitter_Product_Handling_and_Dosing.pdf;');
    readfile($pdf); 
    //readfile("http://haas.shotgunflat8.com/haas/wp-content/themes/haas/Blog_and_Resources_Layout_for_SGF.pdf"); 

?>