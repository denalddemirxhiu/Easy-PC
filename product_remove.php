<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/removeItems.css">
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,600,900" rel="stylesheet">
	<link rel="icon" href="images/icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="scripts/deleteProd.js"></script>
</head>

<body background="images/surface-studio.jpg">
<?php include "includes/navbar.php"?>
<?php include "includes/not_loggedin_admin_redirect.php"?>

<div class="products-box">
	<span class="products-header"> Product Removal Page </span>
		<div class="items">
			<form>

				<div class="searchbar">
					<form method="GET">
						<input id="search-box" type="text" name="searchbox" placeholder="Search">
						<button class="searchButton" onclick="getItems()"> Search </button>
					</form>
				</div>

				<div class="printedItems">

				</div>

			</form>
		</div>
	</div>
</div>

<?php include "includes/footer.php"?>
</body>
</html>
