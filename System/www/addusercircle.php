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

<script>
function formValidation()
{
var uemail = document.registration.txtEmail.value; 

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


}
</script>
<title>Add User to Circle</title>
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
<h2>Add User</h2>

<h3>Circle: <?php echo $_GET['circlename'];?></h3>
<form action="<?php print basename($_SERVER['PHP_SELF']); ?>?circlename=<?php echo $_GET['circlename'];?> & circleid=<?php echo $_GET['circleid'];?>" method="POST" name="registration" onSubmit="return formValidation();">

<table border="0" >
<tr>
<td>Email:</td>
<td><input type="text" name="txtEmail" /></td>
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
session_start();
$user= $_SESSION['user_id'];	
include './classes/circle.php';
    $db = new Database("localhost", "root", "", "shareddb");	
	
	$r = new circle("0","0","0");
	$circle_name = $_GET['circlename'];
	$circle_id = $_GET['circleid'];
	$email = $_POST['txtEmail'];
	$a= $r->addusercircle($circle_name, $email,$circle_id);

	if ($a == true)
	{
		echo "Email Added<br>";
		
		$to = "{$email}";
		$subject = "You have been added to {$circle_name}";
		$message = "Hi, this is to inform you that you have been added in a circle and you can access products that the user provides in your circle. Thanks.";
		$from = "admin@admin.com";
		$headers = "From:" . $from;
		mail($to,$subject,$message,$headers);
		echo "Mail Sent.";
		
		echo "<a href=\"addusercircle.php?circlename={$circle_name}& circleid={$circle_id} \">Click to add more emails</a>";
	}
	else
	{
		echo "Email Exists<br />";
		echo "<a href=\"addusercircle.php?circlename={$circle_name}?circleid={$circle_id}\">Try again</a>";
	}
    ?>
</body></html>
<?php } //End of else ?>