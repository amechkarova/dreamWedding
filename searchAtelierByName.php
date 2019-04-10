<?php 
	/**
	 * This php file is responsible for mapping the client queries to remote REST API Call and returning
	 * the response to the client
	 */
	$myName=$_GET["atelName"];
	$ateliersServerSocket = "192.168.1.101:8080";
	$service_url = 'http://' . $ateliersServerSocket . '/DreamWeddingAteliersServer/ateliers/' . $myName;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	echo $curl_response;
	curl_close($curl);
	
?>