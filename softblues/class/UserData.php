<?php

class UserData
{
    public $id;
    public $name;
    public $email;
    public $country_id;
    public $country;
    
    
    function colls($array){
    	$colls=array();
    	if(isset($array['name']))
    			$colls[] = $array['name'];
    	if(isset($array['email']))
    			$colls[] = $array['email'];
    	if(isset($array['country']))
    			$colls[] = $array['country'];

    	return $colls;
    }
    

}
?>