<?php
require_once 'dbconnect.php';
session_start();
//unset($_SESSION['username']);
?>
<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<title>Глагне</title>
	<div class="head">
		<div id ="title">Бложик Ктулхи</div>
		<div id ="logindiv">
		<?php if (!isset($_SESSION['username'])): ?>
			<a href="login.php">Вход</a>
			<a href="register.php">Регистрация</a>
		<?php else: ?>
		<ul id = "controls">	
		<li><?php echo "Привет, ", $_SESSION['username']; ?></li>
		<li><a href="makepost.php">Запилить пост</a></li>
		<li>Выход</li>			
		</ul>
		<?php endif ?>	
	</div>
	</div>
<body id="index">
	
	 <div class="bodydiv">
	 <?php 
		$stmt = $conn->query('SELECT * FROM posts');
		while ($result = $stmt->fetch(PDO::FETCH_ASSOC)): ?> 
	 	<div class="post">
		 <p>Номер поста: <?php echo $result[postid] ?> <br></p>	 	
		 <p>Заголовок поста: <?php echo $result[title];  ?> <br></p>
		 <p>Текст: <br><?php echo $result[body] ?> <br></p>
		 <p>Создано: <?php echo $result[created] ?> <br></p>
		 <p>Пользователь: <?php echo $result[user] ?></p>
		 <?php if (isset($_SESSION['username'])): ?>
		 <p><a href="editpost.php?post_id=<?php echo $result[postid]?>">Править пост</a></p>
		<?php endif ?>
		 <p><a href="fullpost.php?post_id=<?php echo $result[postid]?>">Читать полностью</a></p>
		</div>
		 <?php endwhile ?>
	 </div>
</body>
<footer>
	
</footer>
