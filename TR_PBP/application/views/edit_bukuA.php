<?php if (ISSET($_SESSION['usernameadmin'])){ 

include("headeradmin.php"); ?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Edit Buku</b></div>
        <div class="panel-body">
            <form action="<?php echo site_url('BukuAController/UpdateBuku/'); ?>" method="post">
                <table class="table table-striped">
                    <input type="hidden" name="kode_buku" class="form-control" value="<?php echo $data_edit->kode_buku; ?>">
                    <tr>
                        <td>KODE BUKU</td>
                        <td>
							 <div class="col-sm-3">
								<?php echo $data_edit->kode_buku;?>
							 </div>
                        </td>
                    </tr>

                    <tr>
                        <td>JUDUL BUKU</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="judul_buku" class="form-control" required value="<?php echo $data_edit->judul_buku; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>PENGARANG</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="pengarang" class="form-control" required value="<?php echo $data_edit->pengarang; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>PENERBIT</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="penerbit" class="form-control" required value="<?php echo $data_edit->penerbit; ?>">
                            </div>
                        </td>
                    </tr>
					
					<tr>
                        <td>TAHUN</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="tahun" class="form-control" pattern="[0-9]*" required value="<?php echo $data_edit->tahun; ?>">
                            </div>
                        </td>
                    </tr>


                    <tr>
                        <td>STOK BUKU</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="stok_buku" class="form-control" pattern="[0-9]*" required value="<?php echo $data_edit->stok_buku; ?>">
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>KODE KATEGORI</td>
                        <td>
						<div class="col-sm-6">
                            <select name="kategori" class="form-control">
							<?php foreach($dataKategori as $row){ 
									if($data_edit->kode_kategori==$row->kode_kategori){?>
									<option value="<?php echo $row->kode_kategori;?>" selected><?php echo $row->kategori_buku;?></option>
									<?php }else{?>
									<option value="<?php echo $row->kode_kategori;?>" ><?php echo $row->kategori_buku;?></option>
									<?php }
							}?>
							</select>
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