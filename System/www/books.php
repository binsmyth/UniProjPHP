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
<link rel="stylesheet" type="text/css" href="styles/style.css" media="screen, tv, projection" />
<title>Your Books</title>
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
<h2>Your Books</h2>

<?php
include 'classes/book.php';
	

	$db = new Database("localhost", "root", "", "shareddb");	
	$r = new book(0,0,0,0,0);
	
	$a = $r->viewbook($_SESSION['user_id']);
	echo "<table border=\"1\">";
	
	echo "<tr>";
	
	echo "<td>";
	echo "Book ID";
	echo "</td>";
	
	echo "<td>";
	echo "Book Title";
	echo "</td>";
	
	echo "<td>";
	echo "Author";
	echo "</td>";
	
	echo "<td>";
	echo "Publisher";
	echo "</td>";
	
	echo "<td>";
	echo "Publish Date";
	echo "</td>";
	
	echo "<td>";
	echo "Borrower ID";
	echo "</td>";
	
	echo "<td>";
	echo "Lender ID";
	echo "</td>";
	
	echo "<td>";
	echo "Delete";
	echo "</td>";
	
	echo "<td>";
	echo "Add To Circle";
	echo "</td>";	
	echo "</tr>";
	
	if($a)
	{
		while ($row = mysql_fetch_assoc($a)) 
		{		
			echo "<tr>";
			echo "<td>";
			echo $row["book_id"];
			echo "</td>";
			echo "<td>";
			echo $row["title"];
			echo "</td>";
			echo "<td>";
			echo $row["author"];
			echo "</td>";
			echo "<td>";
			echo $row["publisher"];
			echo "</td>";
			echo "<td>";
			echo $row["publish_date"];
			echo "</td>";
			echo "<td>";
			echo $row["borrower_id"];
			echo "</td>";
			echo "<td>";
			echo $row["lender_id"];
			echo "</td>";
			echo "<td>";
			echo "<a href=\"books.php?delete={$row['book_id']}\">Delete</a>";
			echo "</td>";
			echo "<td>";
			echo "<a href=\"addbookcircle.php?bookid={$row['book_id']}&title={$row['title']}\">Add To Circle</a>";
			echo "</td>";
			echo "</tr>";
		}
	}
	echo "</table>";
?>
<br />
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="footer">&copy; copyright@ 2013 Ideal<strong> Book Shelf</strong></div>
</div>
</div>
</body></html>
<?php
}
else
{
	$book = $_GET['delete'];
	include './classes/book.php';
	$db = new Database("localhost", "root", "", "shareddb");	
	$r = new book(0,0,0,0,0);
	
	$rows = $r->deletebook($book);
	if($rows>0)
	{
		$rows2 = $r->deletebookcircle($book);
		if($rows2>0)
		{
			header("Location:books.php");
		}
		else
		{
			header("Location:books.php");
		}
	}
	else
	{
		echo "Something went wrong. Please press the back button.";
	}
}
?>