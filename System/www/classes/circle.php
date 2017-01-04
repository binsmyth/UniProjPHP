<?php
require_once './classes/Database.php';
class circle
{
    protected $circle_name;
    protected $circle_description;
	protected $circle_id;
	protected $user;
	
	public function __construct($circle_name, $circle_description, $user)
	{
		$this->circle_name = mysql_real_escape_string($circle_name);
        $this->circle_description = mysql_real_escape_string($circle_description);
		$this->user = mysql_real_escape_string($user);
	}
	
	public function addcircle()
    {
		$query = "INSERT INTO `circle`(`circle_id`, `circle_name`, `circle_description`, `user_id`) VALUES 	(NULL,'{$this->circle_name}','{$this->circle_description}', '{$this->user}');";
		$check = $this->_checkCredentials();
		if ($check)
		{
			return false;
		}
		else
		{
			$result = mysql_query($query);
			if (!$result) 
			{ 
				die('Invalid query: ' . mysql_error());
			}
       		return $result;	
		}
			
    }
	
	public function getcirclesid($circle_name,$user_id)
	{
		$query = "SELECT `circle_id` FROM `circle` WHERE `circle_name` = '{$circle_name}' AND `user_id` = {$user_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}		
		$circle = mysql_fetch_array($result);
		return $circle['circle_id'];
	}
	
	public function deletecircle($circle_id)
	{
		$this->
		$query = "DELETE FROM `circle` WHERE `circle_id` = {$circle_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return mysql_affected_rows();
	}
	
	public function viewcircle($user_id)
	{
		$query = "SELECT * FROM `circle` WHERE `user_id` = {$user_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}
	
	public function getcircle()
	{
		$query= "SELECT * FROM circle";
		$result = mysql_query($query);
		return $result;
	}
	public function circleuser($email)
	{
		$query = "SELECT * FROM users JOIN circle_user ON users.email = circle_user.email WHERE users.email = '{$email}';";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}
	
	public function addusercircle($circle_name,$email,$circle_id)
	{
		$query = "SELECT * FROM circle_user WHERE circle_id = '{$circle_id}' AND email = '{$email}'";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		if(mysql_num_rows($result))
		{
			return false;
        }
		else
		{
			$query = "INSERT INTO `circle_user`(`circle_id`,`email`) VALUES ('{$circle_id}', '{$email}');";
			$result = mysql_query($query);
			return $result;
			if (!$result) 
			{ 
				die('Invalid query: ' . mysql_error());
			}
		}		
	}
	
	public function addbookcircle($bookid,$circleid)
	{
		$query = "SELECT * FROM circle_book WHERE book_id = '$bookid' AND circle_id = '$circleid'";
        $result = mysql_query($query);
		if(mysql_num_rows($result))
		{
			return false;
        }
		else
		{
			$query = "INSERT INTO `circle_book`(`book_id`, `circle_id`) VALUES 	('{$bookid}','{$circleid}')";
        	$result = mysql_query($query);
			return $result;	
		}
	}
	
	public function getcircleid($circle_name)
	{
		$query = "SELECT circle_id FROM circle WHERE circle_name='{$circle_name}'";
		$result = mysql_query($query);
		$id = mysql_fetch_array($result);
		return $id['circle_id'];
	}
	
    public function _checkCredentials()
    {
		
        $query = "SELECT *
                    FROM circle
                    WHERE circle_name = '$this->circle_name' AND user_id = '$this->user'";
        $result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
        if(mysql_num_rows($result))
		{
			return true;
        }
		else
		{
			return false;
        	
		}
    }   
}
?>