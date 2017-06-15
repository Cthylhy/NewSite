<?php
session_start();
echo "Привет: ", $_SESSION['username'];
require_once '../dbconnect.php';
$stmt = $conn->prepare("INSERT INTO comments (text, postid, username ) VALUES (:text, :postid, :username) ");
$stmt->bindvalue(':text', $_POST[postbody]);
$stmt->bindvalue(':postid', $_GET[post_id]);
$stmt->bindvalue(':username', $_SESSION['username']);
$stmt->execute();
?>
<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<a href="../fullpost.php?post_id=<?php echo $_GET[post_id] ?>">Вернуться к посту</a>
