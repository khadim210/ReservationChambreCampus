<?php
require_once 'Controleur/Routeur.php';

 /**
 * 
 */
     class Ctr 
     {
         private $routeur;
         function __construct()
         {
             $this->routeur=new routeur();

         }
         public function control()
         {
            
             $this->routeur->routerRequete();         
         }
     }


    $crt=new CTR();
    $crt->control();


?>