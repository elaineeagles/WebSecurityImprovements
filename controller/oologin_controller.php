<?php
//---------------------------------------------------
// LOGIN
//---------------------------------------------------
class loginMsg extends router {
	
	public $loginMsg = "";
	private $uname = "";
	private pw = "";
	private $signout = "";
	
	public function __construct()
    {
		   $this->db = -1;
		   if (isset($_POST['username'])) $this->uname = (filter_input(INPUT_POST, "username"));
		   if (isset($_POST['password'])) $this->pw = (filter_input(INPUT_POST, "password"));
		   if (isset($_POST['signout']))  $this->signout = (filter_input(INPUT_POST, "signout"));
		   else if (isset($_GET['signout']))  $this->signout = (filter_input(INPUT_GET, "signout"));
	
		//echo $sclsapiURL.$authLoc;
		if (!empty($pw) && !empty($uname))
		{
			echo "logging in with $uname and $pw";
			$url = "http://localhost:8090/WAPIv2/model/authapi.php";
			$post_data = array(
				"uname" => $uname,
				"pw" => $pw,
				);
			$uData = route($url, "POST", $post_data);
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
			else
			{
				$_SESSION['loggedOn'] = 0;
				$loginMsg = "username and/or password are incorrect";
				
			}
		}
		else if (!empty($signout)) {
			
			session_destroy();
			header("Location: index.php?lo=y");	
		}
		
		if (isset($_GET['lo'])) $loginMsg = "logged out";
		include_once("view/login_view.php");
	}
}
//---------------------------------------------------
// END OF LOGIN
//---------------------------------------------------

	
?>