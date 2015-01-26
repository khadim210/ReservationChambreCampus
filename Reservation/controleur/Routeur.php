<?php
		require_once 'Controleur/Ctr_Batiment.php';
		require_once 'Controleur/Ctr_Authentification.php';
		require_once 'Controleur/Ctr_Etudiant.php';
		require_once 'Controleur/Ctr_Reservation.php';
		
		class Routeur 
	  {
	  	  private  $ctr_accueil_auth;
          private  $ctr_etud;
          private  $ctr_reservation;
         
           function __construct() 
		    {
		    	 
		    	 $this->ctr_pav=new Ctr_Batiment();
		    	 $this->ctr_etud= new Ctr_Etudiant();
		    	 $this->ctr_reservation=new Ctr_Reservation();
		    	 $this->ctr_accueil_auth=new Ctr_Authentification();

		    }

		    public function Redirect()
		     {     	    	    
		     	$ok_period=$this->ctr_reservation->verification();
		     	
		     	 
		     	 if ( isset($_SESSION['identifiant']) && $ok_period==true && !isset($_SESSION['no_reservation']) ) 
		     	  
		     	             require_once 'vue/page_reservation.php';	

		     	         else
		     	         	 if ( isset($_SESSION['identifiant']) && $ok_period==true && isset($_SESSION['no_reservation']) ) 
		     	         	      
		     	         	       require_once 'vue/recap.php';

		     	         	 else
		     	 	             $this->ctr_accueil_auth->page_authentification();

		     }
             
            
		  
		  // Traite une requête entrante
		  public function routerRequete() 
		  {
		         $ok_period=$this->ctr_reservation->verification();
		         

		         if($ok_period==true)
		             {    
		             	 if (isset($_REQUEST['action']) ) 
			                  {
							     

                                  if ( substr($_REQUEST['action'],0,8)=="Pavillon") 
							          {
							       	         
							       	         $pav=implode(" ", explode("_", $_REQUEST['action']));
							       	         
							       	         $this->ctr_pav->getChambres($pav);
							          }


							     switch ($_REQUEST['action']) 

							      {
							         case 'logout':
							         	{
							         		session_start();
							         		session_destroy();
							         		$this->ctr_accueil_auth->page_authentification();


							         	}
							         	break;


							         case 'login':
							     	                  { 
							     	                  	 session_start();

											             if ( (isset($_REQUEST['login'])) && !isset($_SESSION['identifiant']) ) 
											                      {
											                      	
											                      	$this->ctr_accueil_auth->connexion($_REQUEST['login']);#,$_REQUEST['password']);
                                                                    
											                      } 
											                 else							             
		                                                         $this->Redirect();
		                                                
		                                              } 
							      	   break;

							      	        case 'get_occupant':
							     	                  { 
							     	                  	 session_start();

											            if  (isset($_SESSION['identifiant']) && isset($_REQUEST['no_chamb']) )  # && (isset($_REQUEST['password'])) )
											                 {
											                   	
											                   	 $this->ctr_etud->getOccupant($_REQUEST['no_chamb'] );
											                 }
											             		                                                
		                                              } 
							      	         break;


							      	    case 'choix':
							     	                  { 
							     	                  	 session_start();

											            if  ( isset($_SESSION['identifiant']) && $ok_period==true && !isset($_SESSION['no_reservation']) )  # && (isset($_REQUEST['password'])) )
											                 {
											                   	
											                   	 require_once 'vue/page_reservation.php';
											                 }
											             else        
		                                                       $this->Redirect();
		                                                
		                                              } 
							      	   break;

							      	    case 'reserver':
							     	                  { 
							     	                  	 session_start();

											             if ( isset($_SESSION['identifiant']) && isset($_REQUEST['chambre']) && $ok_period==true && !isset($_SESSION['no_reservation'])) 
											              
											                	$this->ctr_reservation->new_reservation($_SESSION['identifiant'],$_REQUEST['chambre']);
											               else
											               	 $this->Redirect();
		                                              } 
							      	   break;


							      	     case 'del_reservation':
							     	                  { 
							     	                  	 session_start();

											             if ( isset($_SESSION['identifiant']) && isset($_REQUEST['numero']) && $ok_period==true && isset($_SESSION['no_reservation'])) 
											              
											                	$this->ctr_reservation->delete_reservation(intval($_REQUEST['numero']) );
											               else
											               	 $this->Redirect();
		                                              } 
							      	   break;

							       }


                              }
		                  else
		                      {
		                      	session_start();
		                      	 $this->Redirect();
		                      }                 
		           	         
								 


	                                                                                               	 
		           	                
                         

		             }

		             else
			          echo "<h1>La reservation est fermee pour le moment</h1>";
                 
                     
         }
         
      }

  






?>