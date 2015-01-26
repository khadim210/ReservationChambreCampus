<?php
               #require_once 'Vue/Vue.php';
               require_once 'modele/Etudiant.class.php';

				
				/**
				* 
				*/
				class Ctr_Authentification 
				{

					
                     
 
					  public function connexion($pseudo)//affichage  du formulaire d'authentification
					     {  
				             $classe=Etudiant::getClasse($pseudo);
                       
                     
                       if ( count($classe)==1 && $classe[0]['formation_etudiant'] !="D.U.T.2" ) 
                             { 
                                $user=Etudiant::seConnecter($pseudo);

                                if (count($user)==1) 
                                   {

                                       #session_start();
                                       
                                       $_SESSION['compt_visit']=1;
                                       $_SESSION['nom']=$user[0]['nom'];
                                       $_SESSION['prenom']=$user[0]['prenom'];
                                       $_SESSION['sexe']=$user[0]['sexe_etudiant'];
                                       $_SESSION['identifiant']=$pseudo ;

                                       $_SESSION['classe']=$classe;


                                       $tab_reservation=Reservation::GetInfos($pseudo);//on verifie si l'etudiant a deja reserve

                                       if (count($tab_reservation)==1) 
                                         {
                                        
                                           $_SESSION['no_reservation']=$tab_reservation[0]['id'];
                                           $_SESSION['date_reservation']=$tab_reservation[0]['date'];
                                           $_SESSION['etat_reservation']=$tab_reservation[0]['state'];
                                           $_SESSION['chambre_reserve']=$tab_reservation[0]['chambre'];
                                            require_once 'vue/recap.php';
                                           

                                         }                               
                                       else                                     
                                           require_once 'vue/page_reservation.php';                    


                                   }
                                 
                             
                             }
                           else
                            echo "<h1>Désolé vous n'êtes pas autorise à faire une réservation</h1>";

                     
                                                        
                             
               }


                      public function page_authentification()
                      {
                          require_once 'vue/login.php';
                      }



				  }

?>