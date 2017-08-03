<?php if (ISSET($_SESSION['usernameadmin'])){
 include("headeradmin.php"); ?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Edit Kategori</b></div>
        <div class="panel-body">
            <form action="<?php echo site_url('KategoriController/UpdateKategori/'); ?>" method="post">
                <table class="table table-striped">
                    <input type="hidden" name="kode_kategori" class="form-control" value="<?php echo $data_edit->kode_kategori; ?>">
                    <tr>
                        <td>Kode Kategori</td>
                        <td>
                            <div class="col-sm-6">
                                <?php echo $data_edit->kode_kategori; ;?>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Kategori Buku</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="kategori_buku" class="form-control" required value="<?php echo $data_edit->kategori_buku; ?>">
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