<?php

spl_autoload_register(function ($class_name) {
	if (file_exists($class_name . '.php')) 
	include $class_name . '.php';
	if (file_exists('class/'.$class_name . '.php'))
		include 'class/'.$class_name . '.php';
});
	require "vendor/autoload.php";

	use Monolog\Logger;
	use Monolog\Handler\StreamHandler;
	
	// create a log channel
	$log = new Logger('name');
	$log->pushHandler(new StreamHandler('monolg.log', Logger::INFO));
	
	// add records to the log


	try {
		$path_inf = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "";
		$path_array = explode("/", $path_inf);
//		$apiContactName="apiContactBy".ucfirst($path_array[1]);
		error_log(var_export($path_array,1));
		$user_list = new UserList($_REQUEST);
		if ($path_array[1]=='grid'){
			$user_list->showlist();
		}else if ($path_array[1]=='edit'){
			
			$db = new db();
			if($_REQUEST['oper']=='add'){
				$log->info('add', $_REQUEST);
				$db->insertUser($_REQUEST);
			}elseif($_REQUEST['oper']=='edit'){
				$log->info('edit', $_REQUEST);
				$db->updateUser($_REQUEST);
			}elseif($_REQUEST['oper']=='del'){
				$log->info('delete', $_REQUEST);
				$db->deleteUser($_REQUEST);
			}


		}else{
			$user_list->showHTML();
		}
	} catch (Exception $e) {
		$log->error($e->getMessage());
	}

?>