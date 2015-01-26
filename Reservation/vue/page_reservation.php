<!doctype html>


     <head>
             <meta name="viewport" content="width=device-width" charset='UTF-8'/>
     	       <link href="Bootstrap/css/bootstrap.css" rel="stylesheet">
             <script src="js/jquery.js"></script>
             <script src="Bootstrap/js/bootstrap.min.js"></script>
             
             <script type="text/javascript">
                $(document).ready(function()        

                  { 

                        $('img').mouseenter(function () 

                           {
                              
                              $(this).popover("show");
                           });

                         $('img').mouseleave(function () 

                           {
                              
                              $(this).popover("hide");
                           });
                   
                    });

             </script>
     

              
     </head>
 

     
  <body >
  	<div class="container" style='white' >
  	
  		

      <div class='row '>
            

                   
                <?php 

                    require_once 'header.php';
                       
                        if ($_SESSION['compt_visit']==1) //on visite pour la premiere fois la page
                        {
                          echo '<div class="col-lg-6 col-lg-offset-3 alert alert-success alert-dismissible" role="alert">
                       <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <strong>Ouverture de session reussie!!!! Bienvenue </strong> </div>';
                          $_SESSION['compt_visit']++;
                        }

                         if (isset($message)) 

                             {
                              echo '<div class=" col-lg-offset-2 col-lg-8 alert alert-warning alert-dismissible" role="alert">
                              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                              <strong>'.$message.' </strong> </div>';

                           
                             }       

                       

                 ?>


               </div>
                
                 <h1><span class="label label-default col-lg-offset-4">Choisissez votre pavillon</span></h1>

           <?php  
            echo " <div class='row'>

                     <div class='col-lg-2 col-lg-offset-5'>
                        <a href='index.php?action=Pavillon_A' ><img data-toggle='popover' data-placement='top' data-content='Pavillon A ' src='img/pav.jpg'></a>
                         
                    </div>  

                     <div class='col-lg-3 col-lg-offset-8'>
                        <a href='index.php?action=Pavillon_C' ><img data-toggle='popover' data-placement='top' data-content='Pavillon C ' src='img/pav.jpg'></a>
                         
                     </div>       
              


              </div> "; 

               echo "
                    <div class='col-lg-3 col-lg-offset-3'>
                        <a href='' ><img data-toggle='popover' data-placement='top' data-content='Quel pavillon choisir ???? ' src='img/homme.png'></a>
                         
                     </div ";

             if ($_SESSION['classe']=="DIC3" or $_SESSION['classe']=="DESCAF3") 

             echo " <div class='row'>

                     <div class='col-lg-2 col-lg-offset-2'>
                        <a href='index.php?action=Pavillon_F' > <img  data-toggle='popover' data-placement='top' data-content='Pavillon F ' src='img/pav.jpg'></a>
                         
                     </div>";

                echo "     <div class='col-lg-2 col-lg-offset-1'>
                        <a href='index.php?action=Pavillon_B' ><img data-toggle='popover' data-placement='top' data-content='Pavillon B ' src='img/pav.jpg'></a>
                         

                     </div>          


              </div> ";

            ?>
  </div>
    


  </body>

</html>