<?php	
	$sub = (filter_input(INPUT_GET, "submitall"));
	if ((isset($sub) && $sub == "GetAll")) $sid = -1;
	else $sid  = filter_input(INPUT_GET, "sid");
	/* connect to web api to collect data */
	if (!empty($sid))
	{
		$url = "http://localhost:8090/WAPIv2/model/webapi.php";
		$get_data = array("qry" => $sid);
		$data = route($url, "GET", $get_data);
		
		include_once("view/sensor_view.php");
		
		include_once("view/form_view.php");
	}
	else
	include_once("view/form_view.php");


// make some hard coded chart data
	$cdata = '{
					  "cols": [
							{"id":"","label":"sensors","pattern":"","type":"string"},
							{"id":"","label":"Proportions","pattern":"","type":"number"}
						  ],
					  "rows": [
							{"c":[{"v":"1","f":null},{"v":5,"f":null}]},
							{"c":[{"v":"2","f":null},{"v":3,"f":null}]},
							{"c":[{"v":"3","f":null},{"v":5,"f":null}]},
							{"c":[{"v":"4","f":null},{"v":7,"f":null}]}
						  ]
					}';
	include_once("view/chart_view.php");
?>