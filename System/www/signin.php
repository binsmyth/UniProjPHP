<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_POST['signin'])){ //If user did NOT submit the form
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen, tv, projection" />
<script>
function formValidation()
{
var user = document.registration.txtUsername.value;
var passid = document.registration.txtPassword.value;

if (user=="")
	{
		alert("empty username");
		return false;
	}

if(passid=="")
	{
	 alert("please enter password");	
	 return false;
	}
if(passid.length<6)
	{
	alert("Password length too short. password should be minimum 6 charecter");
	return false;
	}
}
</script>
<title>Sign In</title>
</head>

<body>
<div id="bodyDiv">


<div id="header">

<div id="headMain"><h1>Ideal Book Shelf</h1>
<div id="contentbutton">
<a href="signup.php">Sign up</a>
</div>
</div>

<div id="headMenu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="aboutus.html">About us</a></li>
<li><a href="faq.html">FAQ</a></li>
<li><a href="contactus.html">Contact Us</a></li>

</ul>
</div>


<div id="contentDiv">
<div id="contentLeft">


<p><a href="Aboutbooks.html">About Books</a></p>
<p><a href="Aboutusers.html">About Users</a></p>	

</div>
    
<div id="contentMiddle" height:430px;>
<h2>Sign In</h2>

<form action="<?php print basename($_SERVER['PHP_SELF']); ?>" method="POST" name="registration" onSubmit="return formValidation();">

<table border="0" >

<tr>
<td>Username:</td>
<td><input type="text" name="txtUsername" /></td>
</tr>

<tr>
<td>Password:</td>
<td><input type="password" name="txtPassword" /></td>
</tr>

</table>
<input type="submit" class = "buttonLink" name="signin" value="Sign In">
<input type="reset" class="buttonLink" name="reset" value="Clear"><br />

</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><br />
</p>
<div id="footer">&copy; copyright@ 2013 Ideal<strong> Book Shelf</strong></div>
</div>
</div>
<?php
} //End of if(!isset($_POST[‘goButton’]))
else{ //If user submitted the form
?>
<html><head><title>Logging In</title></head>
<body bgcolor="#FFFFFF" text="#000001">
<p> <font color="#3366CC">
<?php
include './classes/login.php';
    $db = new Database("localhost", "root", "", "shareddb");	
	
	$username = $_POST['txtUsername'];
	$password = md5($_POST['txtPassword']);
	$l = new login($username,$password);
	
    $a = $l->signin();
	if ($a == true)
	{
		session_start();
		$_SESSION['user_id'] = $a['user_id'];
		$_SESSION['username'] = $username;
		$_SESSION['postcode'] = $a['postcode'];
		$_SESSION['email'] = $a['email']; 
		header ("Location:login-home.php");
	}
	else
	{
		echo "Could Not Log In.";
	}
    ?>
</body></html>
<?php } //End of else ?>