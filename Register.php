<?php
session_start();
include('db.php');

$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'login' => $login,
]);

$result = $stmt->fetchAll();

foreach ($result as $user) {
	if (password_verify($password, $user['password'])) {
		echo json_encode([
			'status' => 409,
			'message' => 'User exists'
		]);
		exit();
	}
}


if (empty($result)) {
	$sql = "INSERT INTO users (login, password, email) VALUES (:login, :password, :email)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute([
		'login' => $login,
		'password' => password_hash($password, PASSWORD_DEFAULT),
		'email' => $email
	]);
	$_SESSION['login'] = $login;
	echo json_encode([
		'status' => 200,
		'message' => 'Registration success'
	]);
} else {
	echo json_encode([
		'status' => 409,
		'message' => 'User exists'
	]);
}
