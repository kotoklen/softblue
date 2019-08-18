<?php

abstract class BaseUserCommand implements BaseCommand 
{
	protected $dao;
	protected $user_data;
	protected $log;
	
	public function __construct($user_data)
	{
		$this->dao = new UserDAO();
		$this->log = new MyLog();
		$this->user_data=$user_data;
	}
	
	abstract function  execute();
}
?>