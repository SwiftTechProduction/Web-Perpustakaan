<?php if (ISSET($_SESSION['usernameadmin'])){
 include("headeradmin.php"); ?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Edit Transaksi</b></div>
        <div class="panel-body">
            <form action="<?php echo site_url('TransaksiAController/UpdateTranskai/'); ?>" method="post">
                <table class="table table-striped">
                    <input type="hidden" name="kode_transaksi" class="form-control" value="<?php echo $data_edit->kode_transaksi; ?>">
					<input type="hidden" name="tanggal_pinjam" class="form-control" value="<?php echo $data_edit->tanggal_pinjam; ?>">
					<input type="hidden" name="jumlah_awal" class="form-control" value="<?php echo $data_edit->jumlah_buku; ?>">
					<input type="hidden" name="denda" class="form-control" value="<?php echo $data_edit->denda; ?>">
					<input type="hidden" name="username" class="form-control" value="<?php echo $data_edit->username; ?>">
		
					<tr>
                        <td>KODE TRANSAKSI</td>
                        <td>
						 <div class="col-sm-3">
						<?php echo $data_edit->kode_transaksi; ?>
						</div>
                        </td>
                    </tr>

                    <tr>
                        <td>TANGGAL PINJAM</td>
                        <td>
						 <div class="col-sm-3">
                            <?php echo $data_edit->tanggal_pinjam; ?>
						</div>
						</td>
						
                    </tr>

                    <tr>
                        <td>TANGGAL KEMBALI</td>
                        <td>
							<div class="col-sm-6">
                            <input type="date" name="tanggal_kembali" class="form-control" required value="<?php echo $data_edit->tanggal_kembali; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Jumlah Buku</td>
                        <td>
							<div class="col-sm-6">
                            <input type="text" name="jumlah_buku" class="form-control" pattern="[0-9]*" required value="<?php echo $data_edit->jumlah_buku; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>DENDA</td>
                        <td>
                        <div class="col-sm-3">
                            <?php echo $data_edit->denda;?>
							</div>
                        </td>
                    </tr>

                    <tr>
                        <td>USERNAME</td>
                        <td>
						 <div class="col-sm-3">
                            <?php echo $data_edit->username;?>
							 </div
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" class="btn btn-success" value="Update">
                            <button type="reset" class="btn btn-default">Batal</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>    <!-- /panel -->

</div> <!-- /container -->

<?php include("footeradmin.php");
}
			else{
				$this->load->view('loginadmin');
			}
 ?>