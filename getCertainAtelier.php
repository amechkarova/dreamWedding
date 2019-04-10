<?php 
	/**
	 * This php file is responsible for redirecting the client queries regarding the search of an atelier
	 * by its Id. After the response is received, it is returned in JSON format to the client (handled on remote server)
	 */
	$myID=$_GET["atelId"];
	$ateliersServerSocket = "192.168.1.101:8080";
	$service_url = 'http://' . $ateliersServerSocket . '/DreamWeddingAteliersServer/ateliers/getById/' . $myID;
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);

	echo $curl_response;
	curl_close($curl);
?>