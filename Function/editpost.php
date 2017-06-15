<?php
require_once '../dbconnect.php';
$stmt = $conn->prepare("UPDATE posts set title=:title, body=:body  WHERE postid=:postid");
$title = $_POST['title'];
$body = $_POST['postbody'];
$time = date(r);
echo $_GET[post_id];
$stmt->bindvalue(':postid', $_GET['post_id']);
$stmt->bindvalue(':title', $title);
$stmt->bindvalue(':body', $body);
//$stmt->bindvalue(':created', $time);
//$stmt->bindvalue(':user', 'Cthylhy');
$stmt->execute();

?>