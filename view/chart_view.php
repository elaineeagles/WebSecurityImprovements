<h4>Sensor Charts</h4>
<div id="SChart_div" style="width: 0 auto; margin:auto" ></div>
<div class="w3-bar w3-white w3-margin-top">
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('ALLchart', 'type')">All (1)</button>
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('ONE', 'type')">specific</button>
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('clear', 'type')">Clear</button>
</div>	
<div id="ALLchart" class="w3-container type" style="display:none">
	fdgfsgdf <div id="schart"></div>
</div>
<div id="ONE" class="w3-container type" style="display:none">
  <p>fgsgfdsgdfgsdgf</p>
</div>
<div id="clear" class="w3-container type" style="display:none">
</div>
   
<script type="text/javascript">    
	function openChartArea(descName, descType) {
		var i;
		var x = document.getElementsByClassName(descType);
		for (i = 0; i < x.length; i++) {
		   x[i].style.display = "none";  
		}
		document.getElementById(descName).style.display = "block"; 	
	}
</script>

<script type="text/javascript">
		// Load the Visualization API and the piechart package.
	google.load('visualization', '1', {'packages':['corechart']});      
	// Set a callback to run when the Google Visualization API is loaded.
	google.setOnLoadCallback(drawCharts);
	// draws an individual google chart using the API
	// passed in JSON data from controller

	
	function do_chart(mbpair, title, divVal, chartType, width, height)
	{		
		var data = new google.visualization.DataTable(mbpair); 		  
		 // Set chart options
		var options = {'title' : title, hAxis: {title: 'dd'},vAxis: {title: 'ee'},'width':width,'height':height, legend: { position: 'bottom' }};
		  // Instantiate and draw our chart, passing in some options.
		if (chartType == "BarChart")
			var chart = new google.visualization.BarChart(document.getElementById(divVal));
		else if (chartType == "PieChart")
			var chart = new google.visualization.PieChart(document.getElementById(divVal));
		else if (chartType == "LineChart")
			var chart = new google.visualization.LineChart(document.getElementById(divVal));
		chart.draw(data, options);
	}
	
	function drawCharts() 
	{
		var cwidth = window.innerWidth * 0.30;
		var cheight = window.innerHeight * 0.30;
		 // To draw the data charts     
		 // Create data table out of JSON data loaded from sensor_controller.php
			 
		var mbpair = <?=$cdata?>;
		 do_chart(mbpair, 'sensors', 'schart','PieChart', cwidth, cheight);
	}
</script>