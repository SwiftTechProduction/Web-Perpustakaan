<?php 
if (ISSET($_SESSION['usernameadmin'])){
include("headeradmin.php"); ?>

<!--HEADER-->
 
		
				
				<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Peminjaman
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                       <thead>
                    <tr>  
                        <th>KODE PEMINJAMAN</th>
                        <th>KODE BUKU</th>
                        <th>QUANTITY</th>
                        <th>KODE TRANSAKSI</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dataPeminjaman)) { ?>
                        <tr>
                            <td colspan="6">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    }else { 
					foreach($dataPeminjaman as $row) {?>
					<tr>                        
                        <td><?php echo $row->kode_peminjaman; ?></td>
						<td><?php echo $row->kode_buku; ?></td>
						<td><?php echo $row->qty; ?></td>
                        <td><?php echo $row->kode_transaksi; ?></td>
                       
                    </tr>
					<?php }}?>
                </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
				
				
                
            </div>

				
				
				
				
				
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