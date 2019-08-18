<?php

class UserData
{
    public $id;
    public $name;
    public $email;
    public $country_id;
    public $country;
    
    /**
     * serialize no empty fild
     */
    public function logSerialize()
    {
    	$log_serialize='';
    	$myfields = get_class_vars(get_class($this));
    	foreach ($myfields as $key=>$dummy) {
    		if(!is_null($this->{$key})&&($this->{$key}!='_empty')){
    			$log_serialize.=" {$key}=".$this->{$key}.", ";
    		}
    	}
    	return $log_serialize;
    }
    
    /**
     * converts data from $_POST to php class variables
     * @param a_array - array of pair key - value ($_POST)
     */
    public function post2data($a_array)
    {
    	foreach ($a_array as $k=>$v) {
    		$a_array[strtolower($k)]=$v;
    	}
    	$myfields = get_class_vars(get_class($this));
    	foreach ($myfields as $key=>$dummy) {
    		if(isset($a_array[$key])){
	    		if($key=='country'){
	    			$this->country_id = trim($a_array[$key]);
	    		}else{
	    			$this->{$key} = trim($a_array[$key]);
	    		}
    		}
    	}
    	return ;
    } 
    
}
?>