<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$username = 'john';
$password = 'ediwow123';
$db = 'CRUD';

$conn = new mysqli($host, $username, $password, $db);

if ($conn->connect_error) {
	die('connection failed: ' . $conn->connect_error);
}
