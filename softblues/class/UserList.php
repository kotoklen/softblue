<?php
spl_autoload_register(function ($class_name) {
	if (file_exists($class_name . '.php'))
		include $class_name . '.php';
});

class UserList  
{
	protected $db;
	protected $param;
	protected $response;
	protected $user_data_list;
	protected $show_grid=false;
	
	function __construct($param){
		$this->db = new db();
		$this->parseParam($param);

	}
   
	public function parseParam($param){
		error_log(var_export($param,1));
		$this->param = $param;
	}
    
    public function showList(){
    	$this->user_data_list=$this->db->getUserList();
    	error_log(var_export($this->user_data_list,1));
    	$this->response= new JQGridData($this->user_data_list);
    	$this->response->response();
    }
    
    public function showHTML(){
    	$response= new responseJson();
    	$response->country_options = implode(";", $this->db->getCountrys());
    	$response->response();
    }
}
    
 ?>