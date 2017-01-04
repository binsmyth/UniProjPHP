<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_POST['addcircle'])){ //If user did NOT submit the form
session_start();
if (!isset($_SESSION['user_id']))
{
	header ("Location:signin.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="application/xhtml+xml; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="./styles/style.css" media="screen, tv, projection" />

<script>
function formValidation()
{
var circlename = document.registration.txtCircleName.value;
var circledescription = document.registration.txtCircleDescription.value;


if(circlename=="")
	{
	 alert("Circle Name empty");
	 return false;
	}	
	 
if(circledescription=="")
	{
		alert("Circle Description empty");
		return false;
	}
}
</script>
<title>Create Circle</title>
</head>

<body>
<div id="bodyDiv">


<div id="header">

<div id="headMain"><h1>Ideal Book Shelf</h1>
<div id="contentbutton">
<?php echo $_SESSION['username']?> | <a href="logout.php">logout</a>
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


<p><a href="borrow.php">Borrow</a></p>
<p><a href="lend.php">Lend</a></p>	

</div>
    
<div id="contentMiddle" height:400px;>
<h2>Add Circle</h2>

<form action="<?php print basename($_SERVER['PHP_SELF']); ?>" method="POST" name="registration" onSubmit="return formValidation();">

<table border="0" >

<tr>
<td>Circle Name:</td>
<td><input type="text" name="txtCircleName" /></td>
</tr>

<tr>
<td>Description:</td>
<td><input type="text" name="txtCircleDescription" /></td>
</tr>

</table>
<input type="submit" class = "buttonLink" name="addcircle" value="Add">
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
<html><head><title>Add Circle</title></head>
<body bgcolor="#FFFFFF" text="#000001">
<p> <font color="#3366CC">
<?php
session_start();
$user= $_SESSION['user_id'];	
include './classes/circle.php';
    $db = new Database("localhost", "root", "", "shareddb");	
	
	$circle_name = $_POST['txtCircleName']; 
	$circle_description = $_POST['txtCircleDescription'];
	
	$r = new circle("{$circle_name}","{$circle_description}","{$user}");
	
	$a= $r->addcircle();
	$circle_id = $r->getcirclesid($circle_name,$user);
	if ($a == true)
	{
		echo "alert(\"Circle Added\")";
		header("Location:addusercircle.php?circleid={$circle_id}&circlename={$circle_name}");
	}
	else
	{
		echo "Circle Exists<br />";
		echo "<a href=\"createcircle.php\">Try again";
	}
    ?>
</body></html>
<?php } //End of else ?>