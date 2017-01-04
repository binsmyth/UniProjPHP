<?php
require_once './classes/database.php';
class book
{
    protected $title;
    protected $author;
	protected $publisher;
	protected $publish_date;
	
	public function __construct($title, $author,$publisher, $publish_date, $lender_id)
	{
		$this->title = mysql_real_escape_string($title);
        $this->author = mysql_real_escape_string($author);
		$this->publisher = mysql_real_escape_string($publisher);
		$this->publish_date = mysql_real_escape_string($publish_date);
		$this->lender_id = mysql_real_escape_string($lender_id);	
	}
	
	public function addbook()
    {		
		$query = "INSERT INTO `book`(`book_id`, `title`, `author`, `publisher`, `publish_date`, `lender_id`) VALUES 	(NULL,'{$this->title}','{$this->author}','{$this->publisher}','{$this->publish_date}', '{$this->lender_id}');";
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
	
	public function deletebook($book_id)
	{
		$query = "DELETE FROM `book` WHERE `book_id` = {$book_id}";
		$result = mysql_query($query);
		if (!$result) 
			{ 
				die('Invalid query: ' . mysql_error());
			}
		return mysql_affected_rows();
	}
	
	public function deletebookcircle($book_id)
	{
		$query = "DELETE FROM `circle_book` WHERE `book_id` = {$book_id}";
		$result = mysql_query($query);
		if (!$result) 
			{ 
				die('Invalid query: ' . mysql_error());
			}
		return mysql_affected_rows();
	}
	
	public function viewbook($user_id)
	{
		$query= "SELECT * FROM book WHERE book.lender_id = {$user_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;	
	}
	
	public function viewborrowedbooks($user_id)
	{
		$query= "SELECT * FROM book WHERE book.borrower_id = {$user_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;	
	}
		
	public function viewallbook($email,$postcode)
	{
		$query="SELECT book.* FROM book, circle_user,circle_book,users Where book.book_id = circle_book.book_id and circle_user.circle_id = circle_book.circle_id and circle_user.email='{$email}' and users.postcode = {$postcode} and book.borrower_id = 0 and users.email<> '{$email}' GROUP BY circle_book.book_id";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}
	
	public function getbook()
	{
		$query= "SELECT * FROM book";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;	
	}
	public function getcirclebook()
	{
		$query= "SELECT * FROM circle_book";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;
	}
	
	public function borrowbook($book_id,$user_id)
	{
		$query = "UPDATE book SET borrower_id = {$user_id} WHERE book_id = {$book_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;		
	}
	
	public function returnbook($book_id)
	{
		$query = "UPDATE book SET borrower_id = 0 WHERE book_id = {$book_id}";
		$result = mysql_query($query);
		if (!$result) 
		{ 
   			die('Invalid query: ' . mysql_error());
		}
		return $result;		
	}

    protected function _checkCredentials()
    {
        $query = "SELECT *
                    FROM book
                    WHERE title = '$this->title'";
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