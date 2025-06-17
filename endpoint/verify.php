<?php
include 'conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
	echo json_encode(['error' => 'invalid method']);
	exit();
}

$raw_data = file_get_contents("php://input");
$data = json_decode($raw_data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
	echo json_encode(['error' => 'JSON error: ' . json_last_error_msg()]);
	exit();
}

foreach ($data as $key => $value) {
	if ($value === "") {
		echo json_encode(['error' => 'empty input']);
		exit();
	}
}


$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM student_info WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);

if ($stmt->execute()) {
	$result = $stmt->get_result();
	if (!$result->num_rows > 0) {
		echo json_encode(['error' => 'Wrong email/password']);
		exit();
	}

	$user = $result->fetch_assoc();
	if (password_verify($password, $user['password'])) {
		$_SESSION['role'] = $user['role'];
		$redirect_page = ($user['role'] === "admin") ? "admin.php" : "home.php";
		echo json_encode(['success' => true, 'redirect' => $redirect_page]);
		exit();
	}
}
