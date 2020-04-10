<?php
session_start();
include('db.php');

$article_id = json_decode(file_get_contents('php://input'));



$query = $pdo->query("SELECT date_up FROM article WHERE id_article = '$article_id'");
$date_up = $query->fetchColumn();
$date1 = str_replace('-', '/', $date_up);
$tomorrow = date('m-d-Y',strtotime($date1 . "+1 days"));

if ($tomorrow < date('m-d-Y')) {
	$sql = "UPDATE article SET position = '1' WHERE id_article = '$article_id'";
	$pdo->exec($sql);
}
