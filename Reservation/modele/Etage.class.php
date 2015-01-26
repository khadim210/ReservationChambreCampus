<?php

  /**
  * 
  */
  class Etage 
    {
    	 private $id_etage;
    	 private $pavillon;
    	 private $niveau_etage;

  	
  	     function __construct()
  	      {
  	        	
    	      }

  	      public static function getEtagesPavillon($pavillon)
             {
            
                $bdd=Base::getBDD();
                $req=$bdd->prepare('SELECT Code_Etage ,niveau_Etage from etage where Ref_pavillon=?');
                $req->execute(array($pavillon));
                $rep=$req->fetchAll();
                
                return $rep;
             }


  }


?>