<?php

class BaseDAO 
{
	protected $user='root';
	protected $password='';
	protected $dsn ='mysql:host=localhost;dbname=softblues';
	protected $db;
	
	public function __construct() 
	{
		$this->db = new PDO ($this->dsn, $this->user, $this->password);
	}
	
	protected function runQuery($query, $param=array())
	{
		$sth = $this->db->prepare($query);
		$sth->execute($param);
	}
}

?>