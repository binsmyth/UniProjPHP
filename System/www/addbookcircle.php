<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_POST['addemail'])){ //If user did NOT submit the form
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
<title>Add Book to Circle</title>
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
    
<div id="contentMiddle">
<h2>Add Books To Circle</h2>

<h3>Book Title: <?php echo $_GET['title'];?></h3>
<form action="<?php print basename($_SERVER['PHP_SELF']); ?>?bookid=<?php echo $_GET['bookid'];?>&title=<?php echo $_GET['title'];?>" method="POST" id="register-form" novalidate="novalidate">

<table border="0" >
<tr>
<td>Select Circle:</td>
<td>
<?php

$user= $_SESSION['user_id'];	
include './classes/circle.php';

$db = new Database("localhost", "root", "", "shareddb");	
$r = new circle("0","0","0");
?>
<select name="circles[]" multiple="multiple">
<?php 
$a = $r->viewcircle($_SESSION['user_id']);
if($a)
{
	while ($row = mysql_fetch_assoc($a)) 
	{
		echo "<option value=\"{$row['circle_id']}\">{$row['circle_name']}</option>";

	}
}
?>
</select>
</td>
</tr>
</table>
<input type="submit" class = "buttonLink" name="addemail" value="Add">
<input type="reset" class="buttonLink" name="reset" value="Clear"><br />

</form>

<br />
<p>&nbsp;</p>
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
include './classes/circle.php';
$bookid = $_GET['bookid'];
$title = $_GET['title'];
$db = new Database("localhost", "root", "", "shareddb");	
$r = new circle("0","0","0");

foreach ($_POST['circles'] as $option)
{
	$b = $r->addbookcircle($bookid,$option);
	if ($b == true)
	{
		echo "{$title} Added To Circle<br>";
		echo "<a href=\"books.php?\">Click to add other books to circle</a>";
	}
	else
	{
		echo "{$title} already added to circle<br />";
		echo "<a href=\"addbookcircle.php?bookid={$bookid}&title={$title}\">Click to add other books to circle</a>";
	}
}

?>
</body></html>
<?php } //End of else ?>