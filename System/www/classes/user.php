<?php
require_once './classes/database.php';
class user
{
    protected $username;
    protected $password;
	protected $email;
	protected $postcode;
	
	public function __construct($username, $password,$email, $postcode)
	{
		$this->email = mysql_real_escape_string($email);
        $this->password = mysql_real_escape_string($password);
		$this->username = mysql_real_escape_string($username);
		$this->postcode = mysql_real_escape_string($postcode);
	}
	
	public function adduser()
    {
        $query = "INSERT INTO `users`(`user_id`, `username`, `password`, `email`, `postcode`) VALUES 	(NULL,'{$this->username}','{$this->password}','{$this->email}','{$this->postcode}');";
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
	
	public function deleteuser($user_id)
	{
		$this->user_id = mysql_real_escape_string($user_id);
		$query = "DELETE FROM `users` WHERE `user_id` = {$user_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return mysql_affected_rows();
	}
	
	public function viewuser()
	{
		$query = "SELECT * FROM `users`";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}
	
	public function getcircleuser()
	{
		$query= "SELECT * FROM circle_user";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}

    public function _checkCredentials()
    {
        $query = "SELECT *
                    FROM users
                    WHERE email = '$this->email'";
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