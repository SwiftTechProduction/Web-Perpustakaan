<?php if (ISSET($_SESSION['usernameadmin'])){
 include("headeradmin.php"); ?>
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
  <div class="panel-heading"><b>Edit Buku</b></div>
  <div class="panel-body">
	<form action="<?php echo site_url('PeminjamanController/UpdatePeminjaman/'); ?>" method="post">
       <table class="table table-striped">
		<input type="hidden" name="kode_peminjaman" class="form-control" value="<?php echo $data_edit->kode_peminjaman; ?>">
		 <tr>
          <td>KODE PEMINJAMAN</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="kode_peminjaman" class="form-control" value="<?php echo $data_edit->kode_peminjaman; ?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>KODE BUKU</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="kode_buku" class="form-control" value="<?php echo $data_edit->kode_buku; ?>">
          </div>
          </td>
         </tr>
		 
       <tr>
          <td>QUANTITY</td>
          <td>
           <div class="col-sm-6">
            <input type="text" name="qty" class="form-control" value="<?php echo $data_edit->qty; ?>">
            </div>
           </td>
         </tr>
		 
         <tr>
          <td>KODE TRANSAKSI</td>
          <td>
           <div class="col-sm-6">
            <input type="text" name="kode_transaksi" class="form-control" value="<?php echo $data_edit->kode_transaksi; ?>">
            </div>
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