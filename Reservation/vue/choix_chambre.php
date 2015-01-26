<!doctype html>


     <head>
             <meta name="viewport" content="width=device-width"  charset='utf-8'/>
     	       <link href="Bootstrap/css/bootstrap.min.css" rel="stylesheet">
             <script src="js/jquery.js"></script>
             <script src="Bootstrap/js/bootstrap.min.js"></script>
             
              <script type="text/javascript">
                $(document).ready(function()        

                  { 

                       $('.etages').hide();

                        $('button.libele').mouseenter(function () 

                           {
                              if ($(this).children('span:eq(0)').attr('class')=='glyphicon glyphicon-plus')
                                   $(this).attr('data-content','afficher cet etage') ;
                                  else
                                     $(this).attr('data-content','masquer cet etage') ;

                              $(this).popover("show");
                           });

                         $('.btn').mouseleave(function () 

                           {
                              
                              $(this).popover("hide");
                           });

                       $(' tr.etages td a').css('display','none');


                       $('.btn').click(function ()
                             {
                                  id=$(this).parents('tr').attr('id'); 
                                
                                if ($(this).children('span:eq(0)').attr('class')=='glyphicon glyphicon-plus') 
                                  {
                                   

                                    $('#'+id+' +tr.etages').show(1000);

                                    

                                    function afficherItem () 
                                        {
                                           item=$('#'+id+' +tr.etages td a:hidden:first');
                                           item.show(350);
                                           window.setTimeout(afficherItem,500);

                                       }

                                       afficherItem();

                                    $(this).children('span:eq(0)').attr('class','glyphicon glyphicon-minus');
                                  }

                                else
                                   if ($(this).children('span:eq(0)').attr('class')=='glyphicon glyphicon-minus') 
                                  {
                                      $('#'+id+' +tr.etages').hide(1000);
                                     
                                    $('#'+id+' span').attr('class','glyphicon glyphicon-plus');
                                  }
                    


                                //var item = $('td:hidden:first');                      
                                //$(item).show('slow');
                               // window.setTimeout(afficherItem,100);
                          });


                         
                          $('tr.etages td a ').mouseleave(function  () 

                           {
                                                                                                                 
                                   $(this).popover('hide');
                            });
                        
                         $('tr.etages td a ').mouseenter(function  () 

                           {
                                 button=$(this);
                                
                                 $.ajax({
                                            url : "index.php?action=get_occupant", // on donne l'URL du fichier de traitement
                                            dataType: "text",
                                            type : "POST", // la requête est de type POST
                                            data : "no_chamb="+ button.text(), //  on envoie nos données
                                            success: function (data) 
                                                {
                                               
                                                   button.attr('data-content',data);
                                                   //console.log($(this));
                                                  button.popover('show',2000);
                                               }
                                       });
                          });
                                                    
                    });

             </script>
     

              
     </head>
 

     
  <body >
  	<div class="container" style='white' >
  	
  		<?php   require_once 'header.php'; ?>

   
        <div class="row">


           <div class='col-lg-offset-3 col-lg-6'>
         
          


        
              <table class="table table-bordered table-striped ">
              
            <?php
        for ($i=0;$i<count($etage);$i++)
        {
           $etage_i=$etage[$i];
           if ($i==0) 
              $libelle="Rez de chaussee";
             else
                $libelle=$i."e Etage";  
           

                 echo'<tr id="ligne'.$i.'" class="title_level"><td  colspan="2"> 
                           <button  style="margin-right:10px" class="btn libele" data-toggle="popover" data-placement="top"  data-content="">
 
                               <span class="glyphicon glyphicon-plus"></span>
 
                           </button>'.$libelle.'   </td></tr>';
             

              echo '<tr class="etages">';

              $k=0;
                        foreach ($couloir[$i] as $couloir_i)
                        {
                          
                          
                          echo '<td>';
                                        
                                                foreach ($chambre[$i][$k] as $chambro) 
                                                { 
                                                  

                                                   echo '<a href="index.php?action=reserver&chambre='.$chambro['Code_Chambre'].'" name="chambre" value="'.$chambro['Code_Chambre'].'" class="btn btn-info" data-content="" title="Occupants de la chambre" data-toggle="popover" data-placement="top" style="margin-bottom:10px">'.$chambro['Code_Chambre'].'</a>'." ";
                                                }
                                                $k++;
                                        
                          echo '</td>';
                                        
                        }  
              echo '</tr>';

             
        }
       ?>
           
      
              </table>
       
         </div>

        

            
             

  </div>


        
           <div class="row">

               <div class="col-lg-offset-6"> <a href="index.php"> <span class="glyphicon glyphicon-arrow-left">  Retour </span> </a> </div>
              
           </div>  
</div>
    


  </body>

</html>