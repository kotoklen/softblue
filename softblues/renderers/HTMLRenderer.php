<?php

class HTMLRenderer implements Renderer
{
	private $output;
	
	public function __construct($js_top='')
	{
		$this->output="
            <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
            <html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
            <head>
            <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
            <meta http-equiv='X-UA-Compatible' content='IE=edge' />
            <title>User List</title>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css'>
                <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css'>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
                <script src='https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js'></script>
            <script type='text/javascript'>
            $(function () {
            {$js_top}
            });
              </script>
            				
            </head>";
	}
	
	public function output($html_body)
	{
		$this->output.="
            <body >
            <form id='form' method='post' >
            {$html_body}
            </form>
            </body></html>";
		echo $this->output;
	}
}