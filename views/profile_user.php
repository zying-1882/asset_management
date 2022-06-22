<?php  
	session_start();
	require_once '../controllers/helpers.php';
	$title = "User";
	function get_content() {
    $id = $_GET['id'];
    $users = get_users();
    
	
?>

<div class="container">
	<div class="row">
		<?php if(isset($_SESSION['user_details'])): ?>
		<div class="col-md-4 mx-auto">
			<div class="card">
				<img src="<?php echo $_SESSION["user_details"]->image ?>" class="card-img-top img-fluid">
				<div class="card-body">
					<h5 class="card-title"><?php echo $_SESSION["user_details"]->username ?></h5>
					</a> 
					<small><?php echo $_SESSION["user_details"]->department ?></small>
				</div>


						<div>
						<button class="btn btn-warning" data-toggle="modal" data-target="#editModal">Change Password</button>
						</div>
						<div class="modal fade" id="editModal">
					   <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Reset Password</h5>
							</div>
							<div class="modal-body">
								<form method="POST" action='/controllers/new_password.php'>
									<input type="hidden" name="id" value="<?php echo $user->id?>">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" class="form-control" value="<?php echo $_SESSION["user_details"]->username ?>">
									</div>
									<div class="form-group">
										<label>New Password</label>
										<input type="password" name="new_password" class="form-control">
									</div>
									<div class="form-group">
										<label>Comfirm Password</label>
										<input type="password" name="password_comfirm" class="form-control">
									</div>
									
									<button class="btn btn-primary">Submit</button>
								</form>
							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>


<?php  
	}
	require_once  'partials/layout.php';
?>