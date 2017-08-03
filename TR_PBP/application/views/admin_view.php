<?php if (ISSET($_SESSION['usernameadmin'])){ 
include("headeradmin.php"); ?>

<!--HEADER-->

		
		
            <div id="page-inner"> 
				 
				

                
                <div class="row">
                    
                     <div class="col-md-12">
                       <div class="panel panel-default">
                        <div class="panel-heading">
                            Admin
                        </div>
                        <div class="panel-body">
                        <h1>Selamat Datang Admin</h1>
						<br />
						</div>
                       </div>
                     </div>
                </div>
                <!-- /. ROW  -->
				
				
				
				<footer><p> &copy; 2014 UKSW. All Right Reserved | Design by: Streetitem</a></p></footer>
			</div>
             <!-- /. PAGE INNER  -->
			 

<!-- FOOTER -->			 
<?php include("footeradmin.php");
}
			else{
				$this->load->view('loginadmin');
			}
 ?>