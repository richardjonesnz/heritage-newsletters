<?php
include 'main.php';
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
				<h1>Pirongia Heritage Newsletters</h1>
				<a href="../index.php"><i class="fas fa-home"></i>Newsletters home</a>
				<?php if ($_SESSION['role'] == 'Admin'): ?>
				<a href="admin/index.php" target="_blank"><i class="fas fa-user-cog"></i>Administer users</a>
				<?php endif; ?>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">

			<h2>User Management</h2>

			<p class="block">Welcome back, <?=$_SESSION['name']?>!</p>
			<p>
				Click the admin link to add, edit and remove admin users from the system.  When logged in
				admin users may upload PDF newsletters and edit the article descriptions.</p>
			</p>

		</div>
	</body>
</html>