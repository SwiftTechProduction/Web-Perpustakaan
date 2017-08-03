<?php if (ISSET($_SESSION['usernamepegawai'])){ 
include("headerpegawai.php"); ?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Edit Transaksi</b></div>
        <div class="panel-body">
           
                <table class="table table-striped">
                    <input type="hidden" name="kode_transaksi" class="form-control" value="<?php echo $data_edit->kode_transaksi; ?>">
					<input type="hidden" name="tanggal_pinjam" class="form-control" value="<?php echo $data_edit->tanggal_pinjam; ?>">
					<input type="hidden" name="jumlah_awal" class="form-control" value="<?php echo $data_edit->jumlah_buku; ?>">
					<input type="hidden" name="denda" class="form-control" value="<?php echo $data_edit->denda; ?>">
					<input type="hidden" name="username" class="form-control" value="<?php echo $data_edit->username; ?>">
		
					<tr>
                        <td><strong>KODE TRANSAKSI</strong></td>
                        <td>
						 <div class="col-sm-3">
						<?php echo $data_edit->kode_transaksi; ?>
						</div>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>TANGGAL PINJAM</strong></td>
                        <td>
						 <div class="col-sm-3">
                            <?php echo $data_edit->tanggal_pinjam; ?>
							</div>
                        </td>
                    </tr>
					
					 <tr>
                        <td><strong>JATUH TEMPO</strong></td>
                        <td>
							<div class="col-sm-6">
                           <?php echo $data_edit->tanggal_kembali; ?>
						   <input type="hidden" name="tanggal_kembali" class="form-control" required value="<?php echo $data_edit->tanggal_kembali; ?>">
                            </div>
                        </td>
                    </tr>
					

                    <tr>
                        <td><strong>JUMLAH BUKU</strong></td>
                        <td>
							<div class="col-sm-6">
                            <?php echo $data_edit->jumlah_buku; ?>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>DENDA</strong></td>
                        <td>
							 <div class="col-sm-3">
                            <?php echo $data_edit->denda;?>
							</div>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>USERNAME</strong></td>
                        <td>
						 <div class="col-sm-3">
                            <?php echo $data_edit->username;?>
							 </div>
                        </td>
                    </tr>
                </table>
				
				
				<br/>List Buku 

				<table class="table table-striped">
				  
					<thead>
					 <tr>
					 <th>No</th>
					 <th>Judul Buku</th>
					 <th>Quantity</th>
					 <th>Tanggal Pengembalian</th>
					 <th><th>
					 </tr>
					</thead>
				  
					<tbody>
					
					
					<?php
					  $no=0;
					  foreach($dataPeminjaman as $row){ $no++;?>
					  
					  <tr>
					  <td><?php echo $no; ?></td>
					  <td><?php echo $row->judul_buku; ?></td>
					  <td><?php echo $row->qty; ?></td>
					  <td><?php echo $row->tgl_kembali; ?></td>
					  <td>
					  <?php if($row->qty==0){
						 echo "Sudah Kembali"; 
					  }else{?>
						<a href="<?php echo site_url('TransaksiPController/UpdateTransaksi/') . '/' . $row->kode_peminjaman . '/' . $data_edit->kode_transaksi.'/'.$data_edit->tanggal_pinjam.'/'.$row->kode_buku; ?>" 
						class="btn btn-info btn-sm">Kembalikan</a>                                    
					  <?php }?>
					  </td>
					 </tr>
					 
					
					<?php }
					?>
					 </tbody>
				</table>
							
		<br/>
		<br/>
		<a href="<?php echo site_url('TransaksiPController/UpdateStatusTransaksi/') . '/' . $data_edit->kode_transaksi . '/' . $data_edit->jumlah_buku ; ?>" class="btn btn-success btn-sm">Selesai</a>  
				
           
        </div>
    </div>    <!-- /panel -->

</div> <!-- /container -->

<?php include("footer.php");
}
			else{
				$this->load->view('loginpegawai');
			}
			
 ?>