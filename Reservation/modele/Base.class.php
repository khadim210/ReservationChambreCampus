<?php
require_once 'parametre.conf.php';
/**
* 
*/
    class Base 
   {
   	    private $conf;
	
		public static function getBDD() //instanciation de l'objet PDOs
			{
			  $conf=new Conf();

              $db_info=$conf->SGBD.':host='.$conf->dbhost.';dbname='.$conf->dbname;
              
              $pdo = new PDO($db_info,$conf->user,$conf->pwd,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
              	
		      return $pdo;
		   }
	

}  


?>