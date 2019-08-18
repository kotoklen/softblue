<?php

class RequestParser 
{
	function parseRequest($request) 
	{
		$path_inf = isset($_SERVER["PATH_INFO"]) ? $_SERVER["PATH_INFO"] : "";
		$path_array = explode("/", $path_inf);
		$user_data = new UserData();
		$user_data->post2data($request);
		$command_class_name=ucfirst($path_array[1])."UserCommand";
		if (class_exists($command_class_name)){
			return new $command_class_name($user_data);
		}else{
			return new DefaultCommand();
		}
	}
}
?>