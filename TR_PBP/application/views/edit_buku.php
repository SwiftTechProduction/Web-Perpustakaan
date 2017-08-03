<?php if (ISSET($_SESSION['username'])){
include("header.php"); ?>
  <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
  <div class="panel panel-default">
  <div class="panel-heading"><b>Edit Buku</b></div>
  <div class="panel-body">
	<form action="<?php echo site_url('BukuController/UpdateBuku/'); ?>" method="post">
       <table class="table table-striped">
		<input type="hidden" name="kode_buku" class="form-control" value="<?php echo $data_edit->kode_buku; ?>">
		<input type="hidden" name="kode_kategori" class="form-control" value="<?php echo $data_edit->kode_kategori; ?>">
		 <tr>
          <td>KODE BUKU</td>
          <td>
            <div class="col-sm-6">
                <input type="text" name="kode_buku" class="form-control" value="<?php echo $data_edit->kode_buku; ?>">
            </div>
            </td>
         </tr>
         
         <tr>
          <td>JUDUL BUKU</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="judul_buku" class="form-control" value="<?php echo $data_edit->judul_buku; ?>">
          </div>
          </td>
         </tr>
		 
       <tr>
          <td>PENGARANG</td>
          <td>
           <div class="col-sm-6">
            <input type="text" name="pengarang" class="form-control" value="<?php echo $data_edit->pengarang; ?>">
            </div>
           </td>
         </tr>
		 
         <tr>
          <td>PENERBIT</td>
          <td>
           <div class="col-sm-6">
            <input type="text" name="penerbit" class="form-control" value="<?php echo $data_edit->penerbit; ?>">
            </div>
           </td>
         </tr>
		 
		 <tr>
          <td>STOK BUKU</td>
          <td>
          <div class="col-sm-6">
            <input type="text" name="stok_buku" class="form-control" value="<?php echo $data_edit->stok_buku; ?>">
          </div>
          </td>
         </tr>
		 
		  <tr>
		  <td>KODE KATEGORI</td>
		  <td>
          <div class="col-sm-6">
           <input type="text" name="kode_kategori" class="form-control" value="<?php echo $data_edit->kode_kategori; ?>">
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
	
<?php include("footer.php");
}
			else{
				$this->load->view('login');
			}
 ?>