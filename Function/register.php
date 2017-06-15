<?php
require_once '../dbconnect.php';
$stmt = $conn->prepare("INSERT INTO users (name, password, isadmin) VALUES (:name, :password, :isadmin)");
$username = $_POST['username'];
$password = $_POST['password'];
$stmt->bindvalue(':name', $username);
$stmt->bindvalue(':password', $password);
$stmt->bindvalue(':isadmin', 1);
$stmt->execute();
$stmt = $conn->query('SELECT name FROM users ORDER BY userid DESC LIMIT 1');
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Имя пользователя: ", $result[name], " ";
$stmt = $conn->query('SELECT password FROM users ORDER BY userid DESC LIMIT 1');
$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Пароль: ", $result[password];
?>

