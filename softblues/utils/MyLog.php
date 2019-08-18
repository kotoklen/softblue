<?php

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MyLog 
{
	private $log;
	
	public function __construct()
	{
		$this->log = new Logger('users');
		$this->log->pushHandler(new StreamHandler('mylog.log', Logger::INFO));
	}

	public function log($msg)
	{
		$this->log->info($msg);
	}
}
?>