<?php
session_start();
if (!isset($_SESSION['role'])) {
	header("Location: index.php");
} else if ($_SESSION['role'] !== "admin") {
	header("Location: home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<h1>admin panel</h1>
</body>

</html>
