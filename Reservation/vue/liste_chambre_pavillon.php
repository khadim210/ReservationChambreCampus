<!doctype html>


     <head>
             <meta name="viewport" content="width=device-width ;text/html;  charset='utf-8' "/>
     	         <script src="js/jquery.js"></script>
               <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
               <link href="media/css/jquery.dataTables.css" rel="stylesheet">
               <script src="Bootstrap/js/bootstrap.js"></script>
               <script src="Bootstrap/js/scripts.js"></script>
               <script src="media/js/jquery.dataTables.js"></script>
              
     </head>

     <style type="text/css">

         .form-control{width:110px;margin: 3px;}
         #tableau{width: 70%;
         }
         tr{height:20px;
            widt:120px;}
        td,th{
             width:70px;
        }

     </style>
  <body>
  	<div class="container">
  	
  		<?php require_once('menu_admin.php'); 

            



      ?>

           <div class="modal fade" id="infos">
                <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                       <button type="button" id='close_modal' class="close" datadismiss="modal"><span class='glyphicon glyphicon-remove'></span> </button>
                       <h4 class="modal-title">Description etape suivante</h4>

                     </div>
                      <div class="modal-body">
                           Maintenant l'etape qui suit consiste a modifier les chambre ne se trouvant pas au bon etage
                           ou de supprimer les chambres en exces .

                      </div>

                </div>
              </div> 
         </div>

           <div class="row">
               
             <div class="col-lg-offset-5" style='margin-bottom:20px'>
                <caption >Liste chambre du <?php echo$nom_pav?></caption>

             </div>  
 
           </div>
               
                
             <div class='row'>

                              
               <form method='POST' action='index.php?action=validate'>

                  

                <table id='tableau' cellpadding='0' cellspacing='0' border='0' class='display'>
                  <thead>
                     <tr>
                        <th >Numero de la chambre</th>
                        <th >Numero Couloir</th>
                        <th >Actions</th>
                     </tr>
                   </thead>

                      <tfoot>
                           <tr>
                              <th >Numero de la chambre</th>
                              <th >Numero Couloir</th>
                              <th >Actions</th>
                           </tr>
                   </tfoot>


                   <tbody>

                     <?php
                     
                      $count=0;
                      foreach ($liste_chambre as $key)
                       {
                           $id=$key['enregistrement_chambre'];

                           echo "<tr id='ligne_".$id."'>";                                                   

                           echo "<td><input type='text' class='form-control '   value='".$key["Code_chambre"]."'"."/> </td>" ;

                           echo "<td><input type='text' class='form-control'   value='".$key["Ref_Couloir"]."'"."/> </td>" ;
                           
                           
                            
                            echo "<td>
                                      <span class='btn  icon-update glyphicon glyphicon-floppy-save' title='enregistrer la modification'></span>
                                      <span class='btn  icon-delete glyphicon glyphicon-remove ' title='supprimer la ligne choisie'></span>
                                                                  
                                  </td>";



                            
                            echo "</tr>";

                            
                         
                         } 

                        
                      ?>




                   </tbody>

                  
                 </table>

                  <button id="button" type='submit' class="btn btn-primary col-lg-offset-5 " > 
                          <span class='glyphicon glyphiconok'></span> Terminer

                   </button>

               </form> 
              



             </div>




                           
                   
                 
             
               
                 
           </div>

       


  		</div>



  	</div>


  </body>

</html>