<?php
	session_start();

	$searchedRestaurant = $_SESSION['searchedItem'];
	$resourceURL = 'http://192.168.1.4:8080/DreamWeddingRestaurantsServer/getSearchedRestaurant/'.$searchedRestaurant;
	$curl = curl_init();
	curl_setopt($curl,CURLOPT_URL, $resourceURL);
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	$result = curl_exec($curl);

	if(!$result)
	{
		curl_close($curl);
		die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
	}

	curl_close($curl);
	echo $result;
?>