<!DOCTYPE html>
<?php session_start();
      include_once("controller/routing.php"); ?>
<html>
<head>
	<title>Sensor Monitor</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Standard charting via Google API -->
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript" src="AScripts/js/AjaxLib.js"></script>

</head>
<body>

<div class="w3-container">
  <h2>Sensors</h2>
  <p>List of sensor data</p>
  <?php include_once("controller/sensor_controller.php");?>
</div>

<div class="w3-container">
  <?php include_once("controller/login_controller.php");?>
</div>


</body>
</html> 
