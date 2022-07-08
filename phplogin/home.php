<?php
require_once('/var/www/news/config_inc.php');
include('main.php');
check_loggedin($conn);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Pirongia Heritage User Registration System</h1>
				<a href="../index.php"><i class="fas fa-home"></i>Newsletters</a>
				<a href="home.php"><i class="fas fa-home"></i>Home</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<?php if ($_SESSION['role'] == 'Admin'): ?>
				<a href="admin/index.php" target="_blank"><i class="fas fa-user-cog"></i>Admin</a>
				<?php endif; ?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">

			<h2>User Registration Home Page</h2>

			<p class="block">Welcome back, <?=$_SESSION['name']?>!</p>
			<p>You can add two types of user using this system, members and admins.  Members have no
				special privileges but they can see who are admins</p>
			<p>Admins can add, edit and delete users from the system and can add details to
				the Newsletter database</p>
			</p>

		</div>
	</body>
</html>