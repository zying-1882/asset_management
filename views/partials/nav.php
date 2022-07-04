<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a href="/" class="navbar-brand">Asset Managment System</a>
	<button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarMenu">
		<div class="navbar-nav">
			<a href="/" class="nav-link">Home</a>

			<?php if(!isset($_SESSION['user_details'])): ?>
			<a href="/views/forms/login.php" class="nav-link">Login</a>
			<a href="/views/forms/register.php" class="nav-link">Register</a>
			<?php endif; ?>

			<?php if(isset($_SESSION['user_details']) && $_SESSION['user_details']->isAdmin): ?>
			<a href="/views/manage_requests.php" class="nav-link">Manage Requests</a>
			<a href="/views/forms/register.php" class="nav-link">Register</a>
			<a href="/views/view_user.php" class="nav-link">View User</a>
			<?php endif; ?>

			<?php if(isset($_SESSION['user_details'])): ?>
			<a href="/views/request_cart.php" class="nav-link">My requests</a>
			<a href="/views/profile_user.php?id=<?php echo $_SESSION['user_details']->username ?>" class="nav-link">Profile</a>
			<?php endif; ?>

			<?php if(isset($_SESSION['user_details'])): ?>
			<a href="/controllers/process_logout.php" class="nav-link">Logout</a>
			<?php endif; ?>
		</div>
	</div>
</nav>