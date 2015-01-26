 <header class="page-header">
         <div class="row">
                  <div class='col-xs-offset-3 col-xs-3'><img alt='logo' src="img/logo_coud.jpg"/></div>            
            </div>  
          <div class="row">                        
                 <div class=' col-xs-offset-9 col-xs-3'><?php echo $_SESSION['prenom']."  "."".$_SESSION['nom']?> </div>
          </div>
           <div class="row">
                 <div class='col-xs-offset-10'>

                     <a  class='btn btn-primary' href='index.php?action=logout' title="Se deconnecter"> 
                           <span class='glyphicon glyphicon-off'></span > 
                      </a>

                 </div>

                 
             </div>

</header>