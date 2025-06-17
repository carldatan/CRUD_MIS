<?php
include 'conn.php';
$raw_data = file_get_contents("php://input");
$data = json_decode($raw_data, true);

if (json_last_error() !== JSON_ERROR_NONE) {
	echo json_encode(['error' => 'JSON error: ' . json_last_error_msg()]);
	exit();
}

foreach ($data as $key => $value) {
	if ($value === "") {
		echo json_encode(['success' => false]);
		exit();
	}
}

$name = $data['name'];
$email = $data['email'];
$password = $data['password'];
$confirm_password = $data['confirmPassword'];

if ($password === $confirm_password) {
	$password = password_hash($password, PASSWORD_BCRYPT);
} else {
	echo json_encode(['success' => false]);
	exit();
}


$sql = "INSERT INTO student_info (name, email, password) VALUES(?,?,?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $password);

if ($stmt->execute()) {
	echo json_encode(['success' => true]);
	exit();
} else {
	echo json_encode(['success' => false]);
	exit();
}
