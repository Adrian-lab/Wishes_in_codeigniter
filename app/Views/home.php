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
	<div class="heroe">

		<h1>Welcome to Wishes</h1>

		<h2>Share your wishes</h2>

	</div>

</header>

<!-- CONTENT -->

<section>

</section>

<div class="further">

	<section>

	</section>

</div>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
	<div class="environment">

		<p>Page rendered in {elapsed_time} seconds</p>

		<p>Environment: <?= ENVIRONMENT ?></p>

	</div>

	<div class="copyrights">

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
