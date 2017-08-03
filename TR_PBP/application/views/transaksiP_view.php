<?php if (ISSET($_SESSION['usernamepegawai'])){
include("headerpegawai.php"); ?>

<!--HEADER-->
 

            	
				
				<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Transaksi
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                      <thead>
                    <tr>
                        <th>KODE TRANSAKSI</th>
                        <th>TANGGAL PINJAM</th>
                        <th>JATUH TEMPO</th>
                        <th>JUMLAH BUKU</th>
                        <th>DENDA</th>
                        <th>USERNAME</th>
                        <th>Status</th>
						<th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dataTransaksi)) { ?>
                        <tr>
                            <td colspan="12">Data tidak ditemukan</td>
                        </tr>
                        <?php
                    } else {
                        foreach ($dataTransaksi as $row) {
                            ?>
                            <tr>
                                <td><?php echo $row->kode_transaksi; ?></td>
                                <td><?php echo $row->tanggal_pinjam; ?></td>
                                <td><?php echo $row->tanggal_kembali; ?></td>
                                <td><?php echo $row->jumlah_buku; ?></td>
                                <td><?php echo $row->denda; ?></td>
                                <td><?php echo $row->username; ?></td>
								<td><?php echo $row->status; ?></td>
                                <td>
                                    <a href="<?php echo site_url('TransaksiPController/EditTransaksi/') . '/' . $row->kode_transaksi; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>                                    
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
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
				$this->load->view('loginpegawai');
			}

 ?>