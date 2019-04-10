<?php
	session_start();
	
	$searchedItem = $_SESSION['searchedItem'];
	$service_url = 'http://localhost:8080/DreamWeddingHairdressingSalonsServer/searchSalon/'.$searchedItem;

	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
    	$info = curl_getinfo($curl);
    	curl_close($curl);
    	die('error occured during curl exec. Additional info: ' . var_export($info));
	}

	curl_close($curl);
	echo $curl_response; 

?>
