<?php

spl_autoload_register(function ($class_name) {
	if (file_exists($class_name . '.php'))
		include $class_name . '.php';
});

class db extends PDO{
	protected $user='root';
	protected $password='';
	protected $dsn ='mysql:host=localhost;dbname=softblues';
	
	public function __construct() {
			parent::__construct($this->dsn, $this->user, $this->password);
	}
	
	private function runQuery($query, $param=array()){
		$sth = $this->prepare($query);
		$sth->execute($param);
	}
	
	public function getList($query, $param=array(), $className=null){
		$sth = $this->prepare($query);
		$sth->execute($param);
		$result = array();
		if($className){
			while ($obj = $sth->fetchObject($className)) {
				$result[]=$obj;
			}
		}
		return $result;	
	}
	
	public function getUserList(){
		$query = "select u.*, c.country from users u 
LEFT JOIN  countries c on c.id = u.country_id";
		return $this->getList($query, array(), "UserData");
	}
	
	public function insertUser ( $param=array())
	{
		$query = 'INSERT INTO users(name, email, country_id) VALUES(:name, :email, :country_id)';
		$this->runQuery($query, array(':name'=>$param['name'], ':email'=>$param['email'], ':country_id'=>$param['country']));
	}
	
	public function updateUser ( $param=array())
	{
		$query = 'Update users SET name=:name, email=:email, country_id=:country_id
				WHERE id=:id ';
		$this->runQuery($query, array(':name'=>$param['name'], ':email'=>$param['email'], ':country_id'=>$param['country'], ':id'=>$param['id']));
	}
	
	public function deleteUser ( $param=array())
	{
		$query = 'DELETE FROM users WHERE id=:id ';
		$this->runQuery($query, array(':id'=>$param['id']));
	}
	
	public function getCountrys(){
		$query = "SELECT Concat(id,':', country) FROM `countries` ";
		$sth = $this->query($query);
		$res=  $sth->fetchAll(PDO::FETCH_COLUMN, 0);
		error_log(var_export(implode(",", $res),1));
		return $res;
	}
}

?>