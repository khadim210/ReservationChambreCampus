<?php
/**
* 
*/
class Conf
{
	public $SGBD;
	public $dbhost;
	public $dbname;
	public $user;
	public $pwd ;
	
	public function __construct()
	{
		 $this->SGBD='mysql';
         $this->dbhost='localhost';
         $this->dbname='campus';
         $this->user='root';
         $this->pwd='';
	}

}




?>