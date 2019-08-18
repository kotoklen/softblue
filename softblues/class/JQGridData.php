<?php

class JQGridData
{
	private $data_grid;
	
	function __construct($data_list){
		$this->data_grid= new stdClass();
		$this->data_grid->rows=array();
		$this->data_grid->page = 0;
		$this->data_grid->total = 0;
		$this->data_grid->records = 0;
		$i=0;
		foreach($data_list as $data){
			$this->data_grid->rows[$i]['id']=$data->id;
			$this->data_grid->rows[$i]['cell']=$data->colls((array)$data);
			$i++;
		}
	}
	
	function response(){
		error_log(var_export($this->data_grid,1));
		header("Content-type: text/script;charset=utf-8");
		echo json_encode($this->data_grid);
	}
	
}
?>