<?php
session_start();
include('db.php');

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE login = :login";
$stmt = $pdo->prepare($sql);
$stmt->execute([
	'login' => $login,
]);

$result = $stmt->fetchAll();

foreach ($result as $user) {
	if (password_verify($password, $user['password'])) {
		echo json_encode([
			'status' => 200,
			'message' => 'Authorization success'
		]);
		$_SESSION['login'] = $login;
	} else {
		echo json_encode([
			'status' => 404,
			'message' => 'User not found'
		]);
	}
}
