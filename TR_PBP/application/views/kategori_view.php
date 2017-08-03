<?php
if (ISSET($_SESSION['usernameadmin'])){
 include("headeradmin.php"); ?>

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
                                            <h4 class="modal-title" id="myModalLabel">Add Kategori</h4>
                                        </div>
                                        <div class="modal-body">
										 	 <form action="<?php echo site_url('KategoriController/InsertKategori/'); ?>" method="post">
                                <table class="table table-striped">
                           
                                    <tr>
                                        <td>Kategori Buku</td>
                                        <td>
                                            <div class="col-sm-6">
                                                <input type="text" required placeholder="Kategori Buku"  name="kategori_buku" class="form-control" required="">
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
                             Kategori
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                    <tr>
                        <th>Kode Kategori</th>
                        <th>Kategori Buku</th>
						<th>Option</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (empty($dataKategori)) { ?>
                        <tr>
                            <td colspan="6">Data tidak ditemukan</td>
                        </tr>

                        <?php
                    } else {
                        $no = 0;
                        foreach ($dataKategori as $row) {
                            $no++;
                            ?>
                            <tr>
                                <td><?php echo $row->kode_kategori; ?></td>
                                <td><?php echo $row->kategori_buku; ?></td>                               
                                <td>
                                    <a href="<?php echo site_url('KategoriController/EditKategori/').'/'.$row->kode_kategori; ?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a href="<?php echo site_url('KategoriController/HapusKategori/') . '/' . $row->kode_kategori; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')">Delete</a>
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
				$this->load->view('loginadmin');
			}
?>