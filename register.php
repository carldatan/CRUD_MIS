<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
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
	<div class="container col-lg-4 mt-5 mx-auto text-center">
		<div id="liveAlertPlaceholder"></div>
		<form action="" method="post" class="needs-validation">
			<label for="email" class="form-label fs-5 fw-bold">Register</label>
			<div class="form-floating mb-3">
				<input name="name" type="text" class="form-control" id="name" placeholder="john" required>
				<label for="floatingInput">Name</label>
			</div>
			<div class="form-floating mb-3">
				<input name="email" type="email" class="form-control" id="email" placeholder="name@example.com"
					required>
				<label for="floatingInput">Email address</label>
				<div class="invalid-feedback">Email Already Registered</div>
			</div>
			<div class="form-floating mb-3">
				<input name="password" type="password" class="form-control" id="password" placeholder="Password"
					required>
				<label for="floatingPassword">Password</label>
				<div class="invalid-feedback password-feedback"></div>
			</div>
			<div class="form-floating mb-3">
				<input name="confirmPassword" type="password" class="form-control" id="confirmPassword"
					placeholder="Password" required>
				<label for="floatingPassword">Confirm Password</label>
			</div>
			<button id="submit-btn" type="submit" class="btn btn-primary">Register</button>
		</form>
	</div>
</body>

<script src="js/register.js">
	window.addEventListener('load', () => {
		const form = document.querySelectorAll('.needs-validation');
		forms.forEach(form => form.reset());
	});
</script>

</html>
