<?php
require_once "../../controllers/helpers.php";
function get_content(){
	$assets = get_assets("../../data/assets.json");
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto py-5">
			<form method="POST" action="../../controllers/add_assets.php" enctype="multipart/form-data">
				<div class="form-group">
					<label>Image</label>
					<input type="file" name="image" class="form-control">
				</div>
				<div class="form-group">
					<label>Assets name</label>
					<input type="text" name="asset_name" class="form-control">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						<option value="hardware">Hardware</option>
						<option value="furniture">Furniture</option>
						<option value="miscellaneous">Miscellaneous</option>
					</select>
				</div>
				<div class="form-group">
					<label>Quantity</label>
					<input type="number" name="quantity" class="form-control">
				</div>
				<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>

<?php
}
require_once '../partials/layout.php';
?>