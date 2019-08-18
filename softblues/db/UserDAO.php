<?php

class UserDAO extends BaseDAO
{
	public function getUserList()
	{
		$query = "select u.*, c.country from users u 
            LEFT JOIN  countries c on c.id = u.country_id";
		$sth = $this->db->query($query);
		$result = array();
		while ($obj = $sth->fetchObject("UserData")) {
		    $result[]=$obj;
		}
		return $result;	
	}
	
	public function insertUser ( $name, $email, $country_id)
	{
		$query = 'INSERT INTO users(name, email, country_id) VALUES(:name, :email, :country_id)';
		$this->runQuery($query, array(':name'=>$name, ':email'=>$email, ':country_id'=>$country_id));
	}
	
	public function updateUser ($name, $email, $country_id, $id)
	{
		$query = 'Update users SET name=:name, email=:email, country_id=:country_id
				WHERE id=:id ';
		$this->runQuery($query, array(':name'=>$name, ':email'=>$email, ':country_id'=>$country_id,':id'=>$id));
	}
	
	public function deleteUser ( $id)
	{
		$query = 'DELETE FROM users WHERE id=:id ';
		$this->runQuery($query, array(':id'=>$id));
	}

}
?>