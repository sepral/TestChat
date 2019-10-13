<?php
require_once "connect.php";
$textMessage = $_POST['textMessage'];
$idDialogURL = $_SERVER['HTTP_REFERER'];
$idDialogSeparate = strpos($idDialogURL, '=');
$idDialogResult = substr($idDialogURL, -1, $idDialogSeparate);
$querySendMessage = $connect->query("INSERT INTO messages (text) VALUES ('$textMessage')");
$query = $connect->query("SELECT DISTINCT id FROM messages ORDER BY id DESC LIMIT 1");
$queryMessage = $query->fetch_assoc()['id'];
$query = $connect->query("INSERT INTO user_dialog (id_user, id_dialog, id_message) VALUES (1, $idDialogResult, $queryMessage)");
header("Location: " . $_SERVER['HTTP_REFERER']);