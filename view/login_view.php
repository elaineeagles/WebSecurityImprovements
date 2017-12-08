<!-- The login form -->
<?php if (isset($_SESSION['loggedOn']) && $_SESSION['loggedOn'] == 1) {
	?>
		<h2>Signout</h2>

		  <form  method="POST" action="">
			<p>      
			<input type="submit" name="signout" value="signout" />
		  </form>
		  <a href="index.php?signout=y">signout</a>

<?php
}
else if (!isset($_SESSION['loggedOn']) || $_SESSION['loggedOn'] == 0) {
	?>
			
	  <h2>Login</h2>
	  <form  method="POST" action="">
		<p>      
		<label><b>Username</b></label>
		<input class="w3-input w3-border w3-white" name="username" type="text"></p>
		<p>      
		<label ><b>Password</b></label>
		<input class="w3-input w3-border w3-white" name="password" type="password"></p>
		<p>
		<button class="w3-btn w3-black">Login</button></p>
	  </form>

	<?php
}
?>
<?php if (!empty($loginMsg)) echo "<div class=\"w3-red\">$loginMsg</div>"; ?>