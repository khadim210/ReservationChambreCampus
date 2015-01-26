<!doctype html>


     <head>
             <meta name="viewport" content="width=device-width"  charset='utf-8'/>
     	       <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
             <script src="js/jquery.js"></script>
             <script src="Bootstrap/js/bootstrap.min.js"></script>
             
              

             </script>

              
     </head>
 

     
    
   <body >
     <div class="col-xs-offset-4 col-xs-offset-8"><img scr="media/images/coud.jpg"/></div>


  <!-- Conteneur principal -->
    <div class="container"  >
        
      <?php   require_once 'header.php'; ?>


        <center><h1>  RECAPITULATIF  <h1></center>
        <br/><br/>
           
            <div class=" col-lg-offset-3 col-lg-6">
               
                <table id='tab' class="table table-bordered table-striped" >
              <tbody>
              <tr>
                     <td>
                      <h3>No RESERVATION </h3>
                     </td>  
                     <td>
                      <h4><?php echo  $_SESSION['no_reservation'] ?></h4>
                     </td> 
              </tr>

              <tr>
                      <td>
                        <h3>DATE RESERVATION </h3> 
                      </td>  
                      
                      <td>
                        <h4><?php echo  $_SESSION['date_reservation']?></h4> 
                      </td>
              </tr>

              <tr>
                     <td>
                      <h3>ETAT RESERVATION  </h3> 
                      </td>  

                      <td>
                        <h4><?php echo $_SESSION['etat_reservation']?></h4>
                      </td> 
              </tr>

              <tr>
            
                   <td>
                     <h3>CHAMBRE  </h3> 

                    </td>  

                    <td>

                         <h4><?php echo  $_SESSION['chambre_reserve']?></h4> 
                   </td>
                </tr>

                

              </tbody>

              </table>


            </div>

            
             
        
         <div class="row"> <?php echo '<a  href="index.php?action=del_reservation&numero='.$_SESSION['no_reservation'].'" class="btn btn-warning col-lg-offset-5" >' ;?> Annuler votre reservation</a> </div>
        
 
    </div>
    </body>
</html>