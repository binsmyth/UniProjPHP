<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
if(!isset($_POST['addbook'])){ //If user did NOT submit the form
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
	var title = document.registration.txtTitle.value;
	var author = document.registration.txtAuthor.value;
	var publisher = document.registration.txtPublisher.value; 
	var publishdate = document.registration.txtPublishDate.value;
	
	
	if (title=="")
		{
			alert("title username");
			return false;
		}
	
	if(author=="")
		{
		 alert("please enter author");	
		 return false;
		}
	
	if(publisher=="")
		{
		 alert("Publisher empty");
		 return false;
		}
	if(publishdate=="")
		{
		 alert("Publish Date empty");
		 return false;
		}
	
	var dateformat = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;  
	  // Match the date format through regular expression  
	  if(publishdate.match(dateformat))  
	  {  
	  document.registration.txtPublishDate.focus();  
	  //Test which seperator is used '/' or '-'  
	  var opera1 = publishdate.split('/');  
	  var opera2 = publishdate.split('-');  
	  lopera1 = opera1.length;  
	  lopera2 = opera2.length;  
	  // Extract the string into month, date and year  
	  if (lopera1>1)  
	  {  
	  var pdate = publishdatet.split('/');  
	  }  
	  else if (lopera2>1)  
	  {  
	  var pdate = publishdate.split('-');  
	  }  
	  var dd = parseInt(pdate[0]);  
	  var mm  = parseInt(pdate[1]);  
	  var yy = parseInt(pdate[2]);  
	  // Create list of days of a month [assume there is no leap year by default]  
	  var ListofDays = [31,28,31,30,31,30,31,31,30,31,30,31];  
	  if (mm==1 || mm>2)  
	  {  
	  if (dd>ListofDays[mm-1])  
	  {  
	  alert('Invalid date format!');  
	  return false;  
	  }  
	  }  
	  if (mm==2)  
	  {  
	  var lyear = false;  
	  if ( (!(yy % 4) && yy % 100) || !(yy % 400))   
	  {  
	  lyear = true;  
	  }  
	  if ((lyear==false) && (dd>=29))  
	  {  
	  alert('Invalid date format!');  
	  return false;  
	  }  
	  if ((lyear==true) && (dd>29))  
	  {  
	  alert('Invalid date format!');  
	  return false;  
	  }  
	  }  
	  }  
	  else  
	  {  
	  alert("Invalid date format!(dd/mm/yyyy)");  
	  document.registration.txtPublishDate.focus();  
	  return false;  
	  } 	
}
</script>
<title>Add Book</title>
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
<h2>Add Book</h2>

<form action="<?php print basename($_SERVER['PHP_SELF']); ?>" method="POST" name="registration" onSubmit="return formValidation();">

<table border="0" >

<tr>
<td>Title:</td>
<td><input type="text" name="txtTitle" /></td>
</tr>

<tr>
<td>Author:</td>
<td><input type="text" name="txtAuthor" /></td>
</tr>

<tr>
<td>Publisher:</td>
<td><input type="text" name="txtPublisher" /></td>
</tr>

<tr>
<td>Publish Date:</td>
<td><input type="text" name="txtPublishDate" /></td>
</tr>

</table>

<input type="submit" class = "buttonLink" name="addbook" value="Add">
<input type="reset" class="buttonLink" name="reset" value="Clear"><br />

</form>
<br />
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div id="footer">&copy; copyright@ 2013 Ideal<strong> Book Shelf</strong></div>
</div>
</div>
<?php
} //End of if(!isset($_POST[‘goButton’]))
else{ //If user submitted the form
?>
<html><head><title>Add Book</title></head>
<body bgcolor="#FFFFFF" text="#000001">
<p> <font color="#3366CC">
<?php
session_start();
$user= $_SESSION['user_id'];	
include './classes/book.php';
    $db = new Database("localhost", "root", "", "shareddb");	
	
	$title = $_POST['txtTitle']; 
	$author = $_POST['txtAuthor']; 
	$publisher = $_POST['txtPublisher']; 
	$publish_date = $_POST['txtPublishDate']; 
	
	$r = new book("{$title}","{$author}","{$publisher}","{$publish_date}","{$user}");
	
	$a= $r->addbook();

	if ($a == true)
	{
		echo "Book Added";
		header("Location:addbook.php");
	}
	else
	{
		echo "Book Exists<br />";
		echo "<a href=\"addbook.php\">Try again";
	}
    ?>
</body></html>
<?php } //End of else ?>