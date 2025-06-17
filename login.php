<?php
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
		integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
		crossorigin="anonymous">
	<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
	<div class="container col-4 position-absolute top-50 start-50 translate-middle">
		<div id="liveAlertPlaceholder"></div>
		<form action="" method="" class="needs-validation" novalidate>
			<label for="" class="form-label fs-5 fw-bold">Log In</label>
			<div class="form-floating mb-3">
				<input type="email" name="email" class="form-control" id="floatingInput"
					placeholder="name@example.com" required="">
				<label for="floatingInput">Email address</label>

			</div>
			<div class="form-floating">
				<input name="password" type="password" class="form-control" id="floatingPassword"
					placeholder="Password">
				<label for="floatingPassword">Password</label>
			</div>
			<button type="submit" class="btn btn-primary mt-3">Log in</button>
			<a href="../register.php" class="btn btn-secondary mt-3">Register</a>
		</form>

	</div>
	<script src="js/alert.js"></script>
</body>

</html>
