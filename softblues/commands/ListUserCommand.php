<?php

class ListUserCommand implements BaseCommand 
{
	private $dao;
	
	public function __construct()
	{
		$this->dao = new UserDAO();
	}
	
	public function  execute()
	{
		$user_data_list=$this->dao->getUserList();
		$data_grid= new stdClass();
		$data_grid->rows=array();
		$i=0;
		foreach($user_data_list as $data){
			$data_grid->rows[$i]['id']=$data->id;
			$data_grid->rows[$i]['cell']=array($data->name, $data->email, $data->country);
			$i++;
		}
		$renderer = new JSONRenderer();
		$renderer->output($data_grid);
	}
}
?>