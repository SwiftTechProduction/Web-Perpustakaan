<?php if (ISSET($_SESSION['username'])){
 include("header.php"); ?>

<!--HEADER-->
 <?php
		  if (ISSET($_SESSION['username'])){
		  $username = $_SESSION['username'];}
	?>
		
		
            <div id="page-inner"> 
				 
				
				
				  <div class="row">
                    
                     <div class="col-md-12">
                       <div class="panel panel-default">
                        <div class="panel-heading">
                            Cek Kode Peminjaman
                        </div>
                        <div class="panel-body">
                        
								
			<center>
				<form method="POST" action="<?php echo site_url('TransaksiController/lihatTransaksi/')?>">
				  <div class="col-sm-3">
				Masukan Kode Transaksi :
				</div>
				  <div class="col-sm-2">
				<input type="text" name="id" pattern="[0-9]*" class="form-control" required>
				</div>
				  <div class="col-sm-2">
				  
				<input type="hidden" name="username" value="<?php echo $username; ?>">
				<input type="submit" value="CEK" button class="btn btn-primary" >
				<input type="reset" class="btn btn-default">
				</div>
				</form>

			</center>
	   
	   

						
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
				$this->load->view('login');
			}
 ?>
