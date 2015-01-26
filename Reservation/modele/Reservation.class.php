<?php
	      require_once 'modele/Etudiant.class.php';
	      require_once 'modele/Chambre.class.php';
			/**
			* definition de la classe Reservation
			*/
			class Reservation

			{ 
				
				private $nomDept ;
				private $id;
				
				

				function __construct() //constructeur pour insertion
				     
				     {
					     
			         }

			         public static function getParam()
					  {
					 	  $pdo=Base::getBDD();
		                  $query=$pdo->prepare('select * from parametre_reservation');
		                  $query->execute();
		                  $rows=$query->fetchAll();
		                  return $rows;

					  }

              public  static function GetInfos ($mat)
		              {

					 	  $pdo=Base::getBDD();
		                 
		                  $query=$pdo->prepare('select idReservation as id ,date_reservation as date ,etat_reservation as state,chambre_reserve as chambre from reservation where No_Etu=?');
		                 
		                  $query->execute(array($mat));
		                 
		                  $rows=$query->fetchAll();
		                  #var_dump($rows);
		                  
		                  return $rows;
		              	
		              }


		       public  static function remove_reservation ($id_reservation)
		              {

					 	  $pdo=Base::getBDD();
		                 
		                  $query=$pdo->exec('delete from reservation where idReservation='.$id_reservation);
		                 
		                  		                 
		                  	                  
		                  return intval($query );
		              	
		              }
						
				 
				  public function save_reservation($matricule,$chambre)
					  {
					  	$array_students=Etudiant::getOccupants($chambre);
					  	if (count($array_students)<=1) 

					  	     {   
					  	         
					  	         $pdo=Base::getBDD();
							  	 try 
							  	     {
							  	     	 $pdo->beginTransaction();
							  	     	 $query=$pdo->prepare('insert into reservation (date_reservation,etat_reservation,No_Etu,chambre_reserve) values (now(),:etat,:etudiant,:chambre)');
							  	 	     $query->execute( array(    
							  	 	                                  
							  	 	     	                          'etat'=>"en attente de codification",

							  	 	     	                          'etudiant'=>$matricule,

							  	 	     	                          'chambre'=>$chambre


							  	 	     	                    )



							  	 	     	             );

							  	 	      $pdo->commit();
							  	 	      $recap_reservation=Reservation::GetInfos($matricule);//recuperartion de l'id
							  	 	      
							  	 	      return $recap_reservation;
							  	     } 

							  	 catch (Exception $e) 
							  	      {
							  	      	$pdo->rollback();

							  	      	return 0;
							  	 	
							  	      } 

					  		
					  	     }

					  	     else 
					  	     	 return 0 ; 
					  	 
					  	 
					  }

					  
			}



		


			