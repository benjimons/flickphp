<?php

$username = "me@example.com";
$password = "mypassword";

function getprice($url, $bearercode) {
	$ch = curl_init();  // Initialising cURL
	curl_setopt($ch, CURLOPT_URL, $url);    // Setting cURL's URL option with the $url variable passed into the function
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Setting cURL's option to return the webpage data
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'authorization: '.$bearercode,
	));
	$data = curl_exec($ch); // Executing the cURL request and assigning the returned data to the $data variable
	curl_close($ch);    // Closing cURL
	return $data;   // Returning the data from the function
}

function getbearercode($username, $password){
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL,"https://api.flick.energy/identity/oauth/token");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS,
	            "grant_type=password&client_id=le37iwi3qctbduh39fvnpevt1m2uuvz&client_secret=ignwy9ztnst3azswww66y9vd9zt6qnt&username=".$username."&password=".$password);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$server_output = curl_exec ($ch);

	curl_close ($ch);
	$jsonArray = json_decode($server_output,true);
	$bearercode=$jsonArray['id_token'];

	return $bearercode;
}

$mybearercode = getbearercode($username, $password);

$flickoutput = getprice("https://api.flick.energy/customer/mobile_provider/price", $mybearercode);  

echo $flickoutput;
?>
