<?php
session_start();
include('db.php');


$photo = $_FILES['photo'];

$allowed_extensions = ['png', 'jpg', 'jpeg'];
$get_extension = explode('.', $photo['name']);
$normalize_extension = strtolower(end($get_extension));

if (in_array($normalize_extension, $allowed_extensions)) {
	$generate_uniq_name = uniqid('article_photo_', true) . '.' . $normalize_extension;
	$path_to_files = 'photos/' . $generate_uniq_name;
	move_uploaded_file($photo['tmp_name'], $path_to_files);
}

$author = $_SESSION['login'];
$sql = "SELECT id FROM users WHERE login = :login LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute(['login' => $author]);
$author_id = $stmt->fetchColumn();

$sql = "INSERT INTO article (author, title, description, category, photo, date) VALUES (:author_id, :title, :description, :category, :photo, :date)";
$stmt = $pdo->prepare($sql);
$params = [
	'author_id' => $author_id,
	'title' => $_POST['title'],
	'description' => $_POST['description'],
	'category' => $_POST['category'],
	'photo' => $path_to_files,
	'date' => date('Y-m-d H:i:s'),
];
$stmt->execute($params);
