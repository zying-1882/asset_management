<?php 
$title="Login";
function get_content(){
?>


	<div class="container bg-christmas">
		<h2 class="text-center mt-3">Login</h2>
		<div class="row">
			<div class="col-md-6 mx-auto py-5">
				<form method="POST" action="/controllers/process_login.php">
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control">
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
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<button class="btn btn-success">Login</button>
				</form>
			</div>
		</div>
	</div>
<?php
}
	require_once "../partials/layout.php";

 ?>