<?php
require_once 'modele/Reservation.class.php';
require_once 'modele/Etudiant.class.php';

class  Ctr_Reservation
	{

         private $reservaton;

         function __construct() 
         {
         	$this->reservation = new Reservation();
         }
		 // verification de la periode de reservaton
		      public function verification()//affichage  du formulaire d'authentification
					     { 
                             $date=date("y-m-d");// recuperer la date que l'internaute a voulu se connecter
                             
                             $time=date('H:i');// recuperer l'heure que l'internaute a voulu se connecter
                             $params=Reservation::getParam();
                             
		                        if (count($params)==1) 
		                          {
		                                                  

			                         if ( ( (strtotime($date) >strtotime($params[0]['date_debut']) )  && (strtotime($date) < strtotime($params[0]['date_fin'])) ) 

			                              || (  strtotime($date)==strtotime($params[0]['date_debut'])  && strtotime($time)>= strtotime($params[0]['heure_debut']) ) 

			                              || (strtotime($date)==strtotime($params[0]['date_fin'])  && strtotime($time)< strtotime($params[0]['heure_fin']) ) 


			                            )
			                              {
			                                  #require("vue/login.php");
			                              	  return true;
			                              }
			                              else 
                                           {
			                                  #echo "<h1>La reservation est indisponible pour le moment</h1>";
                                           	 return false;
			                              }

		                          }
	                          else
                                 #echo "<h1>La reservation est fermee pour le moment</h1>";
	                          	return false ;


                 }


                public function new_reservation($mat_etudiant,$no_chambre)
                
                      {
                      	$ok_reservation=false;
                      	$array_students=Etudiant::getOccupants($no_chambre); //recuperer les occupants de la chambre
                      	if (count($array_students)<=1)  //0 ou 1 personne a reserve a cette chambre
	                      	{
	                      	  $tab_reservation=$this->reservation->save_reservation($mat_etudiant,$no_chambre);

	                      	 
	                      	  if (count($tab_reservation)==1) 
	                      	       {
	                      	       	  $ok_reservation=true ;
	                      	  	      $_SESSION['no_reservation']=$tab_reservation[0]['id'];
	                      	  	      $_SESSION['date_reservation']=$tab_reservation[0]['date'];
	                      	  	      $_SESSION['etat_reservation']=$tab_reservation[0]['state'];
	                      	  	      $_SESSION['chambre_reserve']=$tab_reservation[0]['chambre'];
	                      	  	      require_once 'vue/recap.php';
	                      	       }
	                      	       
	                      	}

	                      if ($ok_reservation==false) 
	                         {
	                      	     $message="Votre reservation n'est pas effectuee !!! Veuillez chercher une autre chambre ." ;
                                 
                                 require_once 'vue/page_reservation.php';
	                         }
                 

                      }

                   public static function delete_reservation($no_reservation)
                
                      {
                      	 $ok_delete=Reservation::remove_reservation($no_reservation);

	                      	 
	                      	  if ($ok_delete==1) 
	                      	       {
	                      	       	  unset($_SESSION['no_reservation']);
	                      	  	      
	                      	  	      $message="votre reservation a été annulée . vous pouvez reserver dans les chambres restantes";

	                      	  	      require_once 'vue/page_reservation.php';

	                      	       }
	                      	       
	                      		

	                      	
	                      
                 

                      }

		




	}

?>