<?php if (ISSET($_SESSION['usernameadmin'])){
 include("headeradmin.php"); ?>
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="panel panel-default">
        <div class="panel-heading"><b>Edit User</b></div>
        <div class="panel-body">
            <form action="<?php echo site_url('UserController/UpdateUser/'); ?>" method="post">
                <table class="table table-striped">
                    <input type="hidden" name="username" class="form-control" value="<?php echo $data_edit->username; ?>">
                    <tr>
                        <td>Username</td>
                        <td>
						 <div class="col-sm-3">
                            <?php echo $data_edit->username;?>
						 </div>
                        </td>
                    </tr>

                    <tr>
                        <td>Password</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="password" name="password" required class="form-control" value="<?php echo $data_edit->password; ?>">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            <div class="col-sm-6">
                                <input type="text" name="status" required class="form-control" value="<?php echo $data_edit->status; ?>">
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