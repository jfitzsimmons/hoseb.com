<?php

	$session = curl_init($_GET['url']); 	               
	curl_setopt($session, CURLOPT_HEADER, false); 	       
	curl_setopt($session, CURLOPT_RETURNTRANSFER, true);   
	$xml = curl_exec($session); 	                       
	header("Content-Type: text/xml"); 	               
	echo $xml; 	      
	curl_close($session); 
?>