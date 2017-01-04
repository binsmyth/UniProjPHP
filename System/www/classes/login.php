<?php
require_once './classes/database.php';
class login
{
    private $username;
    private $password;

    public function __construct($username, $password)
	{
		$this->username = mysql_real_escape_string($username);
        $this->password = mysql_real_escape_string($password);		
	}
	
	public function signin()
    {
        $user = $this->_checkCredentials();
        if($user){
            return $user;
        }
        return false;
    }

    protected function _checkCredentials()
    {
        $query = "SELECT *
                    FROM users
                    WHERE username = '$this->username'";
        $result = mysql_query($query);
        if(!empty($result)){
            $user = mysql_fetch_assoc($result);
            $submitted_pass = $this->password;
            if($submitted_pass == $user['password']){
                return $user;
            }
        }
        return false;
    }   
}
?>