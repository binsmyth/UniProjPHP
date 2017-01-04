<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_POST['signup'])){ //If user did NOT submit the form
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
var uemail = document.registration.txtEmail.value; 
var upostcode = document.registration.txtPostcode.value;
var cpassid = document.registration.txtConfirmPass.value;

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

if(passid != cpassid)
	{
	alert("password and confirmation password do not match");
	return false;
	}
if(cpassid=="")
	{
	 alert("confirm password empty");
	 return false;
	}
if(uemail=="")
	{
	 alert("Email empty");
	 return false;
	}	
var emailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(!(uemail.match(emailformat)))  
	{  
		alert("You've entered an invalid email address!");    
		return false;  
	}  
if(upostcode=="")
	{
		alert("postcode empty");
		return false;
	}
var numbers = /^\d+$/;
if(!(upostcode.match(numbers)))  
	{  
		alert('post code must have numeric characters only');    
		return false; 
	}
if (upostcode.length<4 || upostcode.length>4)
	{
		alert("postcode must be 4 numbers");
		return false;
	}

}
</script>
<title>Sign Up</title>
</head>

<body>
<div id="bodyDiv">


<div id="header">

<div id="headMain"><h1>Ideal Book Shelf</h1>
<div id="contentbutton">
<a href="signin.php">Sign in</a>
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
    
<div id="contentMiddle">
<h2>Sign Up</h2>

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

<tr>
<td>Confirm Password:</td>
<td><input type="password" name="txtConfirmPass" /></td>
</tr>

<tr>
<td>Email:</td>
<td><input type="text" name="txtEmail" /></td>
</tr>

<tr>
<td>Postcode:</td>
<td><input type="text" name="txtPostcode" /></td>
</tr>

</table>
<input type="submit" class = "buttonLink" name="signup" value="Sign Up">
<input type="reset" class="buttonLink" name="reset" value="Clear"><br />

</form>
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

include './classes/user.php';
    $db = new Database("localhost", "root", "", "shareddb");	
	$username = $_POST['txtUsername']; 
	$password = md5($_POST['txtPassword']);
	$email = $_POST['txtEmail'];
	$postcode = $_POST['txtPostcode'];
	$r = new user("{$username}","{$password}","{$email}","{$postcode}");
	$a= $r->adduser();
//	$b=$r->_checkCredentials();
	if ($a == true)
	{
		header ("Location:index.php");
	}
	else
	{
		echo "Account Exists";
	}
		
    ?>
<?php } //End of else ?>
</body>
</html>