<?php
session_start();
if (isset($_SESSION['user_id']))
{
	header ("Location:login-home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen, tv, projection" />
<title>Homepage</title>
</head>
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
  
</head>

<body>
<div id="header">
</div>
<div id="bodyDiv">
<div id="headMain">
  <h1>Ideal BOOk Shelf</h1>
  <div id="contentbutton">
    <a href="signup.php">Sign up</a>/<a href="signin.php">Sign in</a>
    
</div>
  <p>&nbsp;</p>
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
    <p><a href="Aboutbooks.html">About Books </a></p>
    <p><a href="Aboutusers.html">About Users</a></p>	
    
  </div>
  <div id="contentMiddle" style="height:430px">
    <h2>Home </h2>
			
    <p>Welocome to our Homepage. You can sign up for a new account or sign in if you are an existing user.</p>
    <p>The website is about to share things such as books with friends and neighbours.Our web application also consists of several major components such as registration for the user , creating a circle of family and friends, listing items (lending aswell as borrowing items).    </p>
    <p><img src="images/tumblr_lkj0wvc5lP1qz7uhg.png" width="346" height="243" /></p>
    <div id="footer">&copy; copyright@ 2013 Ideal<strong> Book Shelf</strong></div>

</div>
</div>
</body>
</html>