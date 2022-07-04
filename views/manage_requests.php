<?php
	session_start();
	if(!$_SESSION['user_details']){
		header('Location: /views/forms/login.php');
	}else if(!$_SESSION['user_details']->isAdmin){
		header('Location: /');
	}
​
	require_once '../controllers/helpers.php';
	$title = "Cart";
	function get_content(){
	$returns = get_returns();
	$requests= get_requests();
?>
​
<div class="container">
	<div class="row">
		<h2 class="text-center">Requests</h2>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Image</th>
		      <th scope="col">Username</th>
		      <th scope="col">Name</th>
		      <th scope="col">Date</th>
		      <th scope="col">Status</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php foreach ($requests as $i => $request): ?>
		    <tr>
		      <td>
		      	<img src="<?php echo $request->image ?>" class="img-thumbnail img-fluid">
		      </td>
		      <td><?php echo $request->username ?></td>
		      <td><?php echo $request->name ?></td>
		      <td><?php echo $request->date_created ?></td>
		      <td><?php echo $request->isPending ?></td>
		      <td>
		      	<form method="POST" action="../controllers/accept_decline_request.php?id=<?php echo $i ?>">
		      		<input type="submit" name="accept" value="Accept" class="btn btn-success">
		      		<input type="submit" name="decline" value="Decline" class="btn btn-danger">
		      	</form>
		      </td>
		    </tr>
		   	<?php endforeach ?>
		  </tbody>
		</table>
​
		<h2 class="text-center">Returns</h2>
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Image</th>
		      <th scope="col">Username</th>
		      <th scope="col">Name</th>
		      <th scope="col">Date</th>
		      <th scope="col">Status</th>
		      <th scope="col">Action</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php foreach ($returns as $i => $return): ?>
		    <tr>
		      <td>
		      	<img src="<?php echo $return->image ?>" class="img-thumbnail img-fluid">
		      </td>
		      <td><?php echo $return->username ?></td>
		      <td><?php echo $return->name ?></td>
		      <td><?php echo $return->date_created ?></td>
		      <td><?php echo $return->isPending ?></td>
		      <td>
		      	<form method="POST" action="../controllers/accept_decline_return.php?id=<?php echo $i ?>">
		      		<input type="submit" name="accept" value="Accept" class="btn btn-success">
		      		<input type="submit" name="decline" value="Decline" class="btn btn-danger">
		      	</form>
		      </td>
		    </tr>
		   	<?php endforeach ?>
		  </tbody>
		</table>
	</div>
</div>
​
<?php
	}
	require_once 'partials/layout.php';
?>
