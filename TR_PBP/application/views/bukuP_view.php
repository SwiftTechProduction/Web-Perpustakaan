<?php if (ISSET($_SESSION['usernamepegawai'])){
include("headerpegawai.php"); ?>

<!--HEADER-->
 

		
		 <div id="page-inner"> 
				 <div class="panel panel-default">
                  
                        <div class="panel-body">
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                              New Data
                            </button>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Buku</h4>
                                        </div>
                                        <div class="modal-body">
								 <form action="<?php echo site_url('BukuPController/InsertBuku/'); ?>" method="post">
                                <table class="table table-striped">
                    
                                    <tr>
                                        <td>Judul Buku</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Judul Buku" required  name="judul_buku" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Pengarang</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Pengarang" required name="pengarang" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Penerbit</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Penerbit" required name="penerbit" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
									<tr>
                                        <td>Tahun</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Tahun" required pattern="[0-9]*" name="tahun" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok Buku</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Stok Buku" required pattern="[0-9]*" name="stok_buku" class="form-control" required="">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode Kategori</td>
                                        <td>
										<div class="col-sm-6">
                                            <select name="kategori" class="form-control">
												<?php foreach($dataKategori as $row){ ?>
												<option value="<?php echo $row->kode_kategori;?>"><?php echo $row->kategori_buku;?></option>
											<?php }?>
											</select>
										</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" class="btn btn-success" value="Insert">
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
				
            	
				
				<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
									     <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
						<th>Tahun Terbit</th>
                        <th>Stok</th>
						<th>Option</th>
                    </tr>
                </thead>
									 
									 <tbody>
                    <?php if (empty($dataBuku)) { ?>
                        <tr>
                            <td colspan="6">Data tidak ditemukan</td>
                        </tr>

                        <?php
                    } else {
                        $no = 0;
                        foreach ($dataBuku as $row) {
                            $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row->judul_buku; ?></td>
                                <td><?php echo $row->pengarang; ?></td>
                                <td><?php echo $row->penerbit; ?></td>
								<td><?php echo $row->tahun; ?></td>
                                <td><?php echo $row->stok_buku; ?></td>

                                <td>
                                    <a href="<?php echo site_url('BukuPController/EditBuku/') . '/' . $row->kode_buku; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>                                    

                                </td>
                            </tr>
                        <?php
                        }
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