<?php

class DefaultCommand implements BaseCommand 
{
	private $dao;
	
	public function __construct()
	{
		$this->dao = new CountryDAO();
	}
	
	public function  execute()
	{
		$renderer = new HTMLRenderer($this->setJS());
		$renderer->output($this->setHTML());
	}
	
	protected function  setHTML()
	{
		return "<table id='list'></table>
                <div id='pager'></div>";
	}
	protected function  setJS()
	{
		$country_options= implode(";", $this->dao->getCountrys());
		return "$('#list').jqGrid({
		url: 'list',
		datatype: 'json',
		mtype: 'POST',
		colNames: ['name', 'email', 'country'],
		colModel: [
		{ name: 'name', width: 120, editable:true, edittype:'text' },
		{ name: 'email', width: 120, editable:true , formatter:'email', editrules:{email:true} },
		{ name: 'country', width: 120, editable:true, edittype:'select',
		editoptions:{value:\"{$country_options} \"}
	}
	],
	pager: '#pager',
	autowidth: true,
	shrinkToFit: true,
	sortname: 'name',
	pager: '#pager',
	rowNum: -1 ,height:'200',
	viewrecords: true,
	sortorder: 'desc',
	guiStyle: 'bootstrap',
	caption: 'User List'
	});
	
	
	jQuery('#list').jqGrid('navGrid', '#pager',
	{edit:true,add:true,del:true,search:false}, // options
	{closeAfterEdit:true, url:'edit'}, // edit options
	{closeAfterAdd:true, url:'add'},  // add options
	{url:'delete'}   //del options
	);";
	}
}
?>