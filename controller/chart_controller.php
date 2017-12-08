<h4>Sensor Charts</h4>
<div id="SChart_div" style="width: 0 auto; margin:auto" ></div>
<div class="w3-bar w3-white w3-margin-top">
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('ALL', 'type')">All (1)</button>
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('ONE', 'type')">specific</button>
	<button class="w3-bar-item w3-button w3-tiny w3-border w3-light-grey w3-hover-dark-grey" onclick="openChartArea('clear', 'type')">Clear</button>
</div>	

<div id="ALL" class="w3-container type" style="display:none">
  <p>Es agfdagf</p>
</div>
<div id="ONE" class="w3-container type" style="display:none">
  <p>Is adfgdfdg.</p>
</div>
<div id="clear" class="w3-container type" style="display:none">
</div>
   
<script>
function openChartArea(descName, descType) {
	var i;
	var x = document.getElementsByClassName(descType);
	for (i = 0; i < x.length; i++) {
	   x[i].style.display = "none";  
	}
	document.getElementById(descName).style.display = "block"; 			
}
</script>