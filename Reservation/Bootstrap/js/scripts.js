$(document).ready(function () 
{
    $('#infos').modal('show');
   
    $('button#popover').click(function ()
     {
          $('button').popover({placement:'bottom'});
     });

    $('button#close_modal').click(function ()
     {
          $('#infos').modal('hide');
     });

    

	   var table = $('#tableau').DataTable({"ordering": false});
 
       
         $('#tableau tbody').on( 'click', 'span.icon-delete', function () 
        {
            if (confirm('Voulez vous vraiment supprimer cette chambre ?')) 
              {

             
                    var param1 = encodeURIComponent( $(this).parents('tr').attr('id') );
                  

                     $.ajax({
                              url : "index.php?action=del_chambre", // on donne l'URL du fichier de traitement
                              type : "POST", // la requête est de type POST
                              data : "param1="+ param1  //  on envoie nos données
                           });

                     table.row($(this).parents('tr')).remove().draw();
             }
        } );


       $('#tableau tbody').on( 'click', 'span.icon-update', function () 
           {
              if (confirm('Voulez vous vraiment modifier cette chambre ?')) 
              {
                  var id = encodeURIComponent( $(this).parents('tr').attr('id') );
                  param1=$('#'+id+' td input:eq(0)').val();
                  param2=$('#'+id+' td input:eq(1)').val();
                  
                 $.ajax({
                          url : "index.php?action=set_chambre", // on donne l'URL du fichier de traitement
                          type : "POST", // la requête est de type POST
                          data : "param0="+id+"&param1="+param1+"&param2="+param2  //  on envoie nos données                

                       });
              }
             

           });
 
      
 

      

    
});