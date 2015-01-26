<?php
						require_once('modele/Chambre.class.php');
						require_once('modele/Etage.class.php');
						require_once('modele/Couloir.class.php');


				/**
				* 
				*/
				class Ctr_Batiment
				{
					
					private $chambre;

										  
					  
						    public function getChambres($nom_pav)
						   {
						   	 $etages=Etage::getEtagesPavillon($nom_pav);

                             
                             session_start();
  
						   	 foreach ($etages as $etagee) 
						   	 {
						   	 	 $etage[]=$etagee;
						   	 	 $couloir[]=Couloir::getCouloirsEtage($etagee['Code_Etage'],$_SESSION['sexe']);
						   	 
						   	 }
                              #var_dump($couloir);

                             

						   	 for ($j=0;$j<count($couloir);$j++)
						   	 {
						   	 	$k=0;
						   	 	$couloirs=$couloir[$j];
						   	 	 foreach ($couloirs as $couloirr ) 
						   	 	 {
						   	 	 	
						   	 	 	$chambre[$j][$k]=Chambre::getChambresCouloir($couloirr['Code_Couloir']);
						   	 	 	$k++;
						   	 	 }
						   	 	 

						   	 }
						   	  
						   	
						   	require_once 'vue/choix_chambre.php' ;
						   }

						     
						   	
						  	    


					  





				    public function page_new_pavillon()
				      {
					      require_once 'vue/ajout_pavillon.php';
				     }
 

			    }

?>