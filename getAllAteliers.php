<?php 
	/**
	 * This file is responsible for redirecting client queries to the relevant DB (ateliers server). 
	 * After receiving the response, it is redirected to be handled by front end.
	 */
	$ateliersServerSocket = "192.168.1.101:8080";
	$service_url = 'http://' . $ateliersServerSocket . '/DreamWeddingAteliersServer/ateliers';
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	echo $curl_response;
	curl_close($curl);
?>