<?php
require_once "controllers/helpers.php";
session_start();
if(!$_SESSION['user_details']){
		header('Location: /views/forms/login.php');
}
function get_content(){
	$assets = get_assets("data/assets.json");
?>
<div class="container">
	<?php if(isset($_SESSION["message"])): ?>
	<div class="alert alert-<?php echo $_SESSION["class"] ?>">
		<?php echo $_SESSION["message"] ?>
	</div>
<?php endif; ?>
	<div class="row">
		<table class="table">
			<div class="d-flex justify-content-between">
				<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
				<a type="button" class="mt-2 mb-4 btn btn-primary" href="/views/forms/assets.php">
		  			Add
				</a>
			<?php endif; ?>
			</div>
		  <thead>
		    <tr>
		      <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Category</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Request</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach($assets as $i => $asset): ?>
		    <tr>
		      <td>
		      	<img src="<?php echo $asset->image ?>" class="img-thumbnail img-fluid">
		      </td>
		      <td><?php echo $asset->name ?></td>
		      <td><?php echo $asset->category ?></td>
		      <td><?php echo $asset->quantity ?></td>
		      <td>
		      	<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin == false): ?>
		      		<button class="btn btn-success" data-toggle="modal" data-target="#requestModal-<?php echo $i ?>">Request</button>
		      		<div class="modal fade" id="requestModal-<?php echo $i ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<?php echo $asset->name ?>
									</h5>
								</div>
								<div class="modal-body">
									<form method="POST" action="/controllers/request_asset.php" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $i?>">
										<div class="form-group">
											<img src="<?php echo $asset->image ?>" class="d-block img-fluid">
										</div>
										<div class="form-group">
											<label><?php echo $asset->name ?></label>
										</div>
										<div class="form-group">
											<label>Quantity</label>
											<input type="number" name="quantity" value="<?php echo $asset->quantity ?>" class="form-control">
										</div>
										<button class="btn btn-primary">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		      	<?php endif; ?>

		      		<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
				<a href="/controllers/activate_deactivate.php?id=<?php echo $i ?>" class="btn btn-<?php $asset->isActive ? print("secondary") : print("success")?>">
					<?php $asset->isActive ? print("Deactivate") : print("Activate")?>
				</a>
			<?php endif; ?>
					

		      	
		      	<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
		      		<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $i ?>">Delete</button>
					<div class="modal fade" id="deleteModal-<?php echo $i ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<?php echo $asset->name ?>
									</h5>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to delete this asset?</p>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-dismiss="modal">Close</button>
									<a href="controllers/delete_asset.php?id=<?php echo $i ?>" class="btn btn-success">Confirm</a>
								</div>
							</div>
						</div>
					</div>
		      		<button class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?php echo $i ?>">Edit</button>
					<div class="modal fade" id="editModal-<?php echo $i ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<?php echo $asset->name ?>
									</h5>
								</div>
								<div class="modal-body">
									<form method="POST" action="/controllers/update_assets.php" enctype="multipart/form-data">
										<input type="hidden" name="id" value="<?php echo $i?>">
										<div class="form-group">
											<label>Image</label>
											<img src="<?php echo $asset->image ?>" class="d-block img-fluid">
											<input type="file" name="image" class="form-control">
											<input type="hidden" name="current_image" value="<?php echo $asset->image ?>">
										</div>
										<div class="form-group">
											<label>Name</label>
											<input type="text" name="asset_name" value="<?php echo $asset->name?>" class="form-control">
										</div>
										<div class="form-group">
											<label>Quantity</label>
											<input type="number" name="quantity" value="<?php echo $asset->quantity ?>" class="form-control">
										</div>
										<div class="form-group">
											<div class="form-group">
											<label>Category</label>
											<select name="category" class="form-control">
												<option value=""><?php echo $asset->category ?></option>
												<option value="hardware">Hardware</option>
												<option value="furniture">Furniture</option>
												<option value="miscellaneous">Miscellaneous</option>
											</select>
										</div>
										<button class="btn btn-primary">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		      	<?php endif; ?>
		      </td>
		    </tr>
		<?php endforeach; ?>
	 </tbody>
		</table>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item">
		      <a class="page-link" href="#demo" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		        <span class="sr-only">Previous</span>
		      </a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		        <span class="sr-only">Next</span>
		      </a>
		    </li>
		  </ul>
		</nav>
	</div>
</div>
<?php
}
require_once 'views/partials/layout.php';
?>

<script type="text/javascript">
 	document.addEventListener("DOMContentLoaded", ()=>{
 	let alert= document.querySelector(".alert");
 	setTimeout(()=> {
 		<?php unset($_SESSION["message"]) ?>
 		<?php unset($_SESSION["class"]) ?>
 		alert.classList.toggle("d-none")
 	},3000)

 	})


 </script>
