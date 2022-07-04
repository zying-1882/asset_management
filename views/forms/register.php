<?php 
session_start();
 // require_once "../../controllers/helpers.php";
 // $users = get_users();
$title="Register";
function get_content(){
?>

	<div class="container">
		<div class="row">
			<h2 class="text-center">Register User</h2>
			<div class="col-md-6 mx-auto py-5">
				<form method="POST" action="/controllers/process_register.php" enctype="multipart/form-data">
					<div class="form-group">
					    <label>Image</label>
					    <input type="file" name="image" class="form-control">
				    </div>
					<div class="form-group">
						<label>Fullname</label>
						<input type="text" name="fullname" class="form-control">
					</div>
					<div class="form-group">
						<label>Department</label>
						<select name="department" class="form-control">
							<option value="select">Please select a department</option>
							<option value="admin">Admin</option>
							<option value="accounting">Accounting</option>
							<option value="finance">Finance</option>
							<option value="marketing">Marketing</option>
							<option value="research">Research & Development</option>
						</select>
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="password2" class="form-control">
					</div>
					<button class="btn btn-success">Register</button>
				</form>
			</div>
		</div>
	</div>
<?php
}
require_once "../partials/layout.php";

 ?>

 <div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						<option value="hardware">Hardware</option>
						<option value="furniture">Furniture</option>
						<option value="miscellaneous">Miscellaneous</option>
					</select>
				</div>