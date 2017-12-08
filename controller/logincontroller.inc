<?php
session_start();
function route($url)
{
	echo $url;
	$wclient = curl_init($url);
	curl_setopt($wclient, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($wclient);
	$result = json_decode($response);
	$sensor_data = $result->data;	
	print_r($sensor_data);
	return $sensor_data;	
}
//---------------------------------------------------
// LOGIN
//---------------------------------------------------
	$loginMsg = "";
	$uname = (filter_input(INPUT_POST, "username"));
	$pw = (filter_input(INPUT_POST, "password"));
	echo "logging in with $uname and $pw";
	//echo $sclsapiURL.$authLoc;
	if (!empty($pw) && !empty($uname))
	{
		//$url = "http://$sclsapiURL/$authLoc?uname=$uname&pw=$pw";
		$url = "http://localhost:8090/WAPIv2/model/authapi.php?uname=$uname&pw=$pw";
		$uData = route($url);
		if ($uData)
		{
			$_SESSION['loggedOn'] = 1;
			$uData = explode(":", $uData);
			$_SESSION['uID'] = $uData[0];
			$_SESSION['uRole'] = $uData[1];
			$_SESSION['udgID'] = $uData[2];
			$_SESSION['uName'] = $uname;
		    // header("Location: index2.php");
			$loginMsg = "Successfully logged in";
		}
	}
	else {
		$_SESSION['loggedOn'] = -1;
		$loginMsg = "Invalid username or password";
	}
//---------------------------------------------------
// LOGIN
//---------------------------------------------------

	include_once("../view/login_view.php");
?>