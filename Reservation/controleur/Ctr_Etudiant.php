<?php
  require_once 'modele/Etudiant.class.php';

/**
* 
*/
class Ctr_Etudiant
{
	
	function __construct()
	{
		# code...
	}


	public function getOccupant($chambre)
	     {
		    $array_students=Etudiant::getOccupants($chambre);
		    if (count($array_students)>0) 
		    {
		    	foreach ($array_students as $occupant ) 
		    	{
		    		echo $occupant['prenom'].' '.$occupant['nom'];
		    		echo "\n";
		    	}
		    }
		    else
		    	 echo "Aucune personne n'a fait de reservation pour cette chambre ";
		    	
	     }
}

?>