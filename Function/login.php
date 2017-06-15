<?php
session_start();
require_once '../dbconnect.php';
$username = $_POST['username'];
$password = $_POST['password'];
$stmt = $conn->prepare('SELECT * FROM users WHERE name = :name');
$stmt->bindparam(':name', $username);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result[password] !== $password) 
{
	echo "Какая-то хуйня";
}
$_SESSION['username'] = $username ;
echo "Вошел, как: ", $result[name], " ";
/*$stmt = $conn->query('SELECT password FROM users ORDER BY userid DESC LIMIT 1');
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Пароль: ", $result[password];*/
?>
<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<a href="../index.php">Глагне</a>
