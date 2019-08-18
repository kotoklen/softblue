<?php

class CountryDAO extends BaseDAO
{
	public function getCountrys()
	{
		$query = "SELECT Concat(id,':', country) FROM `countries` ";
		$sth = $this->db->query($query);
		$res=  $sth->fetchAll(PDO::FETCH_COLUMN, 0);
		return $res;
	}
}

?>