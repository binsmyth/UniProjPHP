<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_GET['delete']))
{ 
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
<title>Users</title>
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
<h2>Users</h2>

<?php
include './classes/user.php';
	$db = new Database("localhost", "root", "", "shareddb");	
	$r = new user(0,0,0,0);
	
	$a = $r->viewuser();
	echo "<table border=\"1\">";
	echo "<table border=\"1\">";
	
	echo "<tr>";
	
	echo "<td>";
	echo "User ID";
	echo "</td>";
	
	echo "<td>";
	echo "Username";
	echo "</td>";
	
	echo "<td>";
	echo "Email";
	echo "</td>";
	
	echo "<td>";
	echo "Postcode";
	echo "</td>";
	
	echo "<td>";
	echo "Delete";
	echo "</td>";
		
	echo "</tr>";
	if($a)
	{
		while ($row = mysql_fetch_assoc($a)) 
		{
			echo "<tr>";
			echo "<td>";
			echo $row["user_id"];
			echo "</td>";
			echo "<td>";
			echo $row["username"];
			echo "</td>";
			echo "<td>";
			echo $row["email"];
			echo "</td>";
			echo "<td>";
			echo $row["postcode"];
			echo "</td>";
			echo "<td>";
			echo "<a href=\"users.php?delete={$row['user_id']}\">Delete</a>";
			echo "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>
<br />
<p>&nbsp;</p>
<div id="footer">&copy; copyright@ 2013 Ideal<strong> Book Shelf</strong></div>
</div>
</div>
</body></html>
<?php
}
else
{
	$user = $_GET['delete'];
	include './classes/user.php';
	$db = new Database("localhost", "root", "", "shareddb");	
	$r = new user(0,0,0,0);
	
	$rows = $r->deleteuser($user);
	if($rows>0)
	{
		header("Location:users.php");
	}
	else
	{
		echo "Something went wrong. Please press the back button.";
	}
}
?>