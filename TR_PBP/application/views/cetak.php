<?php
if (ISSET($_SESSION['username'])){

 header("Content-Type: application/vnd.ms-word");
        header("Expires: 0");
        header("Cache-Control:  must-revalidate, post-check=0, pre-check=0");
        header("Content-disposition: attachment; filename=transaksi.doc");
?>

	
 <h1>Berikut Transaksi Peminjaman Anda :</h1>
 
 
  <table border="1">
      
		<tbody>
		<?php if(empty($dataPeminjaman)){ ?>
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

<table border="1">
      
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
		
		<?php if(empty($dataPeminjaman)){ ?>
         <tr>
          <td colspan="6"><strong><font color="red">Data tidak ditemukan</font></strong></td>
         </tr>
        
		<?php }else{
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
		}?>
        </tbody>
</table>
	<?php   
}
			else{
				$this->load->view('login');
			}
			?>
