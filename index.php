<?php
include 'conn.php';
session_start();
if (isset($_SESSION['role'])) {
	if ($_SESSION['role'] === "admin") {
		header("Location: admin.php");
	} else {
		header("Location: home.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
		integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js"
		integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D"
		crossorigin="anonymous"></script>
</head>

<body>
	<?php include './endpoint/header.php' ?>
	<div class="container ">
		<div class="row">
			<div class="col">
				<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="cardtitle">This is a Card</h5>
						<p class="card-text">card content</p>
						<button class="btn btn-primary">To somewhere</button>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="card">
					<div class="card-body">
						<h5 class="cardtitle">This is a Card Too</h5>
						<p class="card-text">card content</p>
						<button class="btn btn-primary">To somewhere</button>
					</div>
				</div>

			</div>
		</div>
	</div>
	<div class=""></div>
</body>

</html>
