<?php
require "vendor/autoload.php";

	try {
		$parser = new RequestParser();
		$command = $parser->parseRequest($_REQUEST);
		$command->execute();
	} catch (Exception $e) {
		$renderer = new HTMLRenderer();
		$renderer->output($e->getMessage());

	}

?>