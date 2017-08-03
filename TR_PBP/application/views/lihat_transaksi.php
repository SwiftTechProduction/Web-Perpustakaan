<?php
if (ISSET($_SESSION['username'])){
 include("header.php"); ?>

<!--HEADER-->
<?php
		   $username = $_SESSION['username'];
		 
	?>
		
		
            <div id="page-inner"> 
				 
				
				
				  <div class="row">
                    
                     <div class="col-md-12">
                       <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
				

<?php if(empty($dataTransaksi)){ ?>
        <h1><strong><font color="red">Data tidak ditemukan</font></strong></h1>
         
        
		<?php }else{ ?>				
						
						
                        
            <h4>Berikut Transaksi Peminjaman Anda :</h4>
 <br/>
 
  <table class="table table-striped">
      
		<tbody>
		<?php if(empty($dataTransaksi)){ ?>
		<tr>
		<td><strong><font color="red">Transaksi sudah expired</font></strong></td>
		</tr>
		<?php }else{ ?>
		
         <tr>
          <td><strong>Kode Transaksi</strong></td>
          <td><?php echo $dataTransaksi->kode_transaksi;  ?></td>
         </tr>
		 
		 <tr>
          <td><strong>Tanggal Peminjaman</strong></td>
          <td><?php echo $dataTransaksi->tanggal_pinjam; ?></td>
         </tr>
		 
		 <tr>
          <td><strong>Tanggal Kembali</strong></td>
          <td><?php echo $dataTransaksi->tanggal_kembali; ?></td>
         </tr>
		 
		 <tr>
          <td><strong>Durasi Peminjaman</strong></td>
          <td>10 Hari</td>
         </tr>
		 
		 <tr>
          <td><strong>Jumlah Buku</strong></td>
          <td><?php echo $dataTransaksi->jumlah_buku; ?></td>
         </tr>
		 
		 <?php } ?>
        </tbody>
</table>

<br/>List Buku 

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
		
		
		<?php
          $no=0;
          foreach($dataPeminjaman as $row){ $no++;?>
		  
		  <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row->judul_buku; ?></td>
          <td><?php echo $row->pengarang; ?></td>
          <td><?php echo $row->penerbit; ?></td>
          <td><?php echo $row->tahun; ?></td>
		  <td><?php echo $row->qty; ?></td>
          
		  
         </tr>
		 
		
        <?php }
		?>
         </tbody>
</table>
<a href="<?php echo site_url('CetakController/cetak/').'/'.$dataTransaksi->kode_transaksi; ?>" class="btn btn-primary">Cetak</a>
     	   
 
	   
		<?php }?>
						
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
