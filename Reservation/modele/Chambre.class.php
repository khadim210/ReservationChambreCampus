<?php
  /**
  * 
  */
  class Chambre 
  {
  	   private $code_chambre;
  	   private $ref_couloir;
     
  	
  	  function __construct($id_chambre,$no_couloir)
  	     {
  		     $this->code_chambre=$id_chambre;
  		     $this->ref_couloir=$no_couloir;
  	     }

	   
     public static function getChambresCouloir($couloir)
           {
            $bdd=Base::getBDD();
            $req=$bdd->prepare('SELECT Code_Chambre from chambre WHERE Ref_Couloir=? ');

            $req->execute(array($couloir));
           

            return  $req->fetchAll();
           }


     public static function getId($chamb)
           {
            $bdd=Base::getBDD();
            $req=$bdd->prepare('SELECT enregistrement_chambre from chambre WHERE Code_chambre=? ');

            $req->execute(array($chamb));
           

            $rows=$req->fetchAll();

           
           
            if (count($rows)==1) 

                return intval($rows[0]['enregistrement_chambre']);
            
           }


           

            


  }

?>