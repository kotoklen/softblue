<?php

class JSONRenderer implements Renderer
{
	
	public function output($data)
	{
		header("Content-type: text/script;charset=utf-8");
		echo json_encode($data);
	}
}