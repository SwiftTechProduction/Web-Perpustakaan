<?php if (ISSET($_SESSION['username'])){
 include("header.php"); ?>

<!--HEADER-->
 
   <?php
		   $username = $_SESSION['username'];
		  $no=0;
		  $ulang=0;
	?>
		
		
            <div id="page-inner"> 
				 
				
				
				  <div class="row">
                    
                     <div class="col-md-12">
                       <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                        
            <h4><strong>Daftar Buku yang Anda Pinjam</strong></h4>
 <br />
 <br />
<form method="POST" action="<?php echo site_url('TransaksiController/insertTransaksi/'); ?>">
  <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Judul Buku</th>
         <th>Pengarang</th>
         <th>Penerbit</th>
		 <th>Tahun</th>
         <th>Quantity</th>
         
         </tr>
        </thead>
        
		<tbody>
        <?php if(empty($dataKeranjang)){ ?>
         <tr>
          <td colspan="6">Anda tidak meminjam apapun</td>
		  
		  
         </tr>
			<tr>
		   <td colspan="6">&copy; 2014 UKSW. All Right Reserved | Design by: Streetitem</td>
		</tr>	
		<?php }else{
          
		  
          foreach($dataKeranjang as $row){ 
		  $no++;
		  
		  ?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row->judul_buku; ?></td>
          <td><?php echo $row->pengarang; ?></td>
          <td><?php echo $row->penerbit; ?></td>
		  <td><?php echo $row->tahun; ?></td>
          <td><?php echo $row->qty; ?></td>
          
		 <input type="hidden" value="<?php echo $row->kode_buku;?>" name="kode<?php echo $no;?>"/>
		 <input type="hidden" value="<?php echo $row->qty;?>" name="qty<?php echo $no;?>"/>
		 
         </tr>
        <?php }?>
		
        </tbody>
		
       </table>
	   <input type="hidden" value="<?php echo $username;?>" name="username"/>
	   <input type="hidden" value="<?php echo $no;?>" name="perulangan"/>
	    <br/><br/><input type="submit" value="Lanjutkan" class="btn btn-primary">	  
</form>

<br/>
<form method="POST" action="<?php echo site_url('keranjangController/deleteKeranjang/'); ?>">
  
		<?php 
          
		  foreach($dataKeranjang as $srow){ 
		  $ulang++;
		  
		  ?>
         
		 <input type="hidden" value="<?php echo $srow->kode_buku;?>" name="kodeBuku<?php echo $ulang;?>"/>
		 <input type="hidden" value="<?php echo $srow->qty;?>" name="qtyz<?php echo $ulang;?>"/>
		 
        <?php } ?>

	   <input type="hidden" value="<?php echo $username;?>" name="user"/>
	   <input type="hidden" value="<?php echo $ulang;?>" name="ulang"/>	  
	  <input type="submit" value="Batalkan" class="btn btn-danger">
		<?php } ?>
      
</form>
	   

						
						</div>
                       </div>
					   
                     </div>
					 
                </div>
                <!-- /. ROW  -->
				
				
				
			</div>
             <!-- /. PAGE INNER  -->
<!-- FOOTER -->	
		 			 


<?php include("footeradmin.php");
}
			else{
				$this->load->view('login');
			}
 ?>
