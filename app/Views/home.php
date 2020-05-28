<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico"/>
	<!-- HEADER: MENU + HEROE SECTION -->
	<link rel="stylesheet" type="text/css" href="../public/Assets/css/main.css">


</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>
	<br><br><br>
	<div class="heroe col-sm-12 text-center">
		<h1>Welcome to Wishes</h1>

		<h2>Share your wishes</h2>
	</div>

</header>

<!-- CONTENT -->

<section class="col-sm-12 text-center">
	<img src="../../public/assets/img/logo.png" alt="logo" width="50%" height="50%">
</section>

<div class="further">
	<section class="col-sm-12 text-center">
		<p>The objective of this application is to allow you to generate lists of products that you would like to have called wishes</p>
	</section>
</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	<div class="environment col-sm-12 text-center">
		<a>With support of:</a>
		<a href="http://www.institutpedralbes.cat/">Institute Pedralbes</a>
	</div>

	<div class="copyrights col-sm-12 text-center">

		<p>&copy; <?= date('Y') ?> Wishes by Adrian Postigo</p>

	</div>

</footer>

<!-- SCRIPTS -->

<script>
	function toggleMenu() {
		var menuItems = document.getElementsByClassName('menu-item');
		for (var i = 0; i < menuItems.length; i++) {
			var menuItem = menuItems[i];
			menuItem.classList.toggle("hidden");
		}
	}
</script>

<!-- -->

</body>
</html>
