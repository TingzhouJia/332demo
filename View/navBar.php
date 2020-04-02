<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" href="../css/nav.css">
	<?php include "../Config/otherConfig.php" ?>
</head>

<body>
	<div class="header" style="position: sticky !important;top:0;z-index:1;opacity:0.95">
		<nav class="navbar navbar-expand-lg navbar-light ">
			<div class="mob_nav">
				<a class="navbar-brand" href="home.php">ONTARIO SPCA </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse mynav" id="navbarNavDropdown">
				<ul class="navbar-nav ">
					<li class="nav-item">
						<a class="nav-link" href="#">WHO WE ARE <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">WHAT WE DO</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">HOW CAN YOU HELP</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">BLOG</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">CONTECT US</a>
					</li>

				</ul>
				<form class="form-inline my-2 my-lg-0 " action="#">
					<input class="form-control mr-sm-2 " type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
			<div class="my_Donate"><a href="Donate.php">DONATE</a></div>
		</nav>
	</div>
</body>

</html>