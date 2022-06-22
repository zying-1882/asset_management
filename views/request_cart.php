<?php
	session_start();
	if(!$_SESSION['user_details']){
		header('Location: /views/forms/login.php');
	}
	require_once '../controllers/helpers.php';
	$title = "Cart";
	function get_content(){
	$assets = get_assets('../data/assets.json');
	$requests= get_requests();
?>
<div class="container">
	<?php if(isset($_SESSION['cart'])): ?>
		<h2 class="py-4">My Cart</h2>
		<table class="table table-responsive">
			<thead class="thead-dark">
				<tr>
			  <th scope="col">Image</th>
		      <th scope="col">Name</th>
		      <th scope="col">Date</th>
		      <th scope="col">Status</th>
		      <th scope="col">Quantity</th>
		      <th scope="col">Request</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$total = 0;
					foreach ($assets as $i => $asset) :
						if(isset($_SESSION['cart'][$i])):
							$subtotal = $asset->quantity * $_SESSION['cart'][$i];
				?>
					<tr class="text-center">
						<td colspan="2">
					    	<img src="<?php echo $asset->image ?>" class="img-thumbnail img-fluid">
					    </td>
						<td colspan="2"><?php echo $asset->name ?></td>
						<td colspan="2"><?php //echo $requests[$i]->date ?></td>
						<td colspan="2"><?php //echo $requests[$i]->status ?></td>
						<td colspan="2">
							<form method="POST" action="/controllers/update_cart.php">
								<input type="hidden" name="id" value="<?php echo $i ?>">
								<h5 min="1"><?php echo $_SESSION['cart'][$i]?></h5>
							</form>
						</td>
						<td colspan="2">
							<button class="btn btn-warning" data-toggle="modal" data-target="#returnModal-<?php echo $i ?>">Return</button>
					<div class="modal fade" id="returnModal-<?php echo $i ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<?php echo $asset->name ?>
									</h5>
								</div>
								<div class="modal-body">
									<form method="POST" action="/controllers/return_asset.php">
									<input type="hidden" name="id" value="<?php echo $i ?>">	
									<p>How much do you want to return?</p>
									<input type="number" name="quantity" class="form-control">
									<p>How much are spoiled?</p>
									<input type="number" name="quantity_damage" class="form-control">
									<button class="btn btn-success">Confirm</button>
									</form>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
		      	
		      	
		
		      		<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-<?php echo $i ?>">Cancel</button>
					<div class="modal fade" id="deleteModal-<?php echo $i ?>">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">
										<?php echo $requests[$i]->name ?>
									</h5>
								</div>
								<div class="modal-body">
									<p>Are you sure you want to cancel the request?</p>
								</div>
								<div class="modal-footer">
									<button class="btn btn-secondary" data-dismiss="modal">Close</button>
									<a href="../controllers/cancel_request.php?id=<?php echo $i ?>" class="btn btn-success">Confirm</a>
								</div>
							</div>
						</div>
					</div>
						</td>
					</tr>
				<?php
						endif;
					endforeach;
				?>
			</tbody>
		</table>
	<?php else: ?>
		<h2 class="py-4">Your request is empty</h2>
		<a href="/">Go back to home page</a>
			
	<?php endif; ?>
</div>
<?php
	}
	require_once 'partials/layout.php';
?>
<script type="text/javascript">
	let quantityInputs = document.querySelectorAll('.input-quantity');
	quantityInputs.forEach(quantityInput => {
		quantityInput.onchange = (e) => {
			e.preventDefault();
			quantityInput.parentElement.submit();
		}
	})
</script>
