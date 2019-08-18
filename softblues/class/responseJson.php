<?php

class responseJson{
		private $output='test';
		public $country_options='';

		
		public function response() {

			
	$this->output="
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta http-equiv='X-UA-Compatible' content='IE=edge' />
<title>My First Grid</title>
 
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/css/ui.jqgrid.min.css'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.15.5/jquery.jqgrid.min.js'></script>


<script type='text/javascript'>
$(function () {
    $('#list').jqGrid({
        url: 'grid',
        datatype: 'json',
        mtype: 'POST',
        colNames: ['name', 'email', 'country'],
        colModel: [

            { name: 'name', width: 120, editable:true, edittype:'text' },
{ name: 'email', width: 120, editable:true , formatter:'email', editrules:{email:true} },
{ name: 'country', width: 120, editable:true, edittype:'select',  editoptions:{value:\"".$this->country_options."\"}}
        ],
        pager: '#pager',
		editurl: 'edit',
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: 'invid',
        sortorder: 'desc',
        viewrecords: true,
        gridview: true,
        autoencode: true,
		guiStyle: 'bootstrap',
        caption: 'User List'
    }); 

 
jQuery('#list').jqGrid('navGrid', '#pager', 
{edit:true,add:true,del:true,search:false}, // options
            {closeAfterEdit:true}, // edit options
            {closeAfterAdd:true},  // add options
            {},   //del options
            {},  // search options
	);

}); 
  </script>

</head>
<body >

<form id='form' method='post' >
<div>test</div>
	<table id='list'></table>
	<div id='pager'></div>
</form>
</body></html>";
			
			
			echo $this->output;
		}
}
?>