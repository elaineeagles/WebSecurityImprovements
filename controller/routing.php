<?php
function route($url, $method, $data)
{
	$wclient = curl_init();
	curl_setopt($wclient, CURLOPT_RETURNTRANSFER, 1);
	if ($method == "POST")
	{
		 curl_setopt($wclient, CURLOPT_POST, true);
		 curl_setopt($wclient, CURLOPT_POSTFIELDS, http_build_query($data));
	}
	else if ($method == "GET")
	{
		$url .= '?' . http_build_query($data);
	}
	curl_setopt($wclient, CURLOPT_HTTPHEADER, array('Accept: application/json'));
	curl_setopt($wclient, CURLOPT_URL, $url);
	
	$response = curl_exec($wclient);
	$result = json_decode($response);
	$sensor_data = $result->data;	
	//print_r($sensor_data);
	curl_close($wclient);
	return $sensor_data;	
}
?>