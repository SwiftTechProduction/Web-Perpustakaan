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
                        </div>
                        <div class="panel-body">
                        
<form method="POST" action="<?php echo site_url('BukuController/search/') ?>">
			  <div class="col-sm-3">
				<input type="text" value="" name="cari" class="form-control" required/>	
				</div>
			 <div class="col-sm-2">	
	<select name="kategori" class="form-control">
	<?php foreach($dataKategori as $row){ ?>
		  <option value="<?php echo $row->kode_kategori;?>"><?php echo $row->kategori_buku;?></option>
	<?php }?>
	</select>
		</div>
	<input type="submit" value="Search" class="btn btn-primary" />
	
	</form>
  
  <?php if(empty($dataSearch)){ ?>
        
  <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Judul Buku</th>
         <th>Pengarang</th>
         <th>Penerbit</th>
         <th>Tahun Terbit</th>
		 <th>Stok</th>
         
         </tr>
        </thead>
        
		<tbody>
         <tr>
          <td colspan="6">Data tidak ditemukan</td>
         </tr>
        
		<?php }else{?>
  
	<div class="row col-sm-7" align="right">	
	<a href="<?php echo site_url('KeranjangController/lihatKeranjang/').'/'.$username; ?>" class="btn btn-success btn-md" onclick="return confirm('Apakah anda sudah selesai meminjam buku?')">Lanjutkan</i></a>
	</div>  
	      
  <table class="table table-striped">
        <thead>
         <tr>
         <th>No</th>
         <th>Judul Buku</th>
         <th>Pengarang</th>
         <th>Penerbit</th>
		 <th>Tahun Terbit</th>
         <th>Stok</th>
         
         </tr>
        </thead>
        <?php
		  $no=0;
          foreach($dataSearch as $row){ $no++;?>
         <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row->judul_buku; ?></td>
          <td><?php echo $row->pengarang; ?></td>
          <td><?php echo $row->penerbit; ?></td>
		  <td><?php echo $row->tahun;?></td>
          <td><?php echo $row->stok_buku; ?></td>
          
		   <td>
			<?php if($row->stok_buku==0){ ?>
			<strong><font color="red">Stok Habis</font></strong>
			<?php }else{?>
		    <a href="<?php echo site_url('KeranjangController/insertKeranjang/').'/'.$row->kode_buku.'/'.$username; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Apakah anda ingin meminjam buku ini?')">Pinjam</i></a>
			<?php }?>
		  </td>
         </tr>
		 
		
        <?php }
		}?>
        </tbody>
		
       </table>
	   
	   

						
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
