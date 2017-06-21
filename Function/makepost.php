<?php
require_once '../dbconnect.php';
session_start();
echo var_dump($_SESSION['username']);
/*$conn->exec("DROP TABLE posts");
$conn->exec("CREATE TABLE posts(
	postid INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	title VARCHAR(50),
	body TEXT,
	created VARCHAR(50),
	user VARCHAR(50)
	)");*/
	
$stmt = $conn->prepare("INSERT INTO posts (title, body, created, user) VALUES (:title, :body, :created, :user)");
$title = $_POST['title'];
$body = $_POST['postbody'];
$time = date(r);
$stmt->bindvalue(':title', $title);
$stmt->bindvalue(':body', $body);
$stmt->bindvalue(':created', $time);
$stmt->bindvalue(':user', $_SESSION['username']);
$stmt->execute();
?>
<h1><a href="../makepost.php">Написать пост</a></h1>