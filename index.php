<?php
require_once 'dbconnect.php';
session_start();
?>
<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<title>Глагне</title>
<header>
	<div class="head">
		<p id ="title">Бложик Ктулхи</p>
		<div>
		<?php if (!isset($_SESSION['username'])): ?>
			<a href="login.php">Вход</a>
			<a href="register.php">Регистрация</a>
		<?php else: ?>
		<p> <?php echo "Привет, ", $_SESSION['username']; ?><p>
		<a href="makepost.php">Запилить пост</a>
		<?php endif ?>	
	</div>
	</div>
</header>
<body>
	
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
		 <p><a href="editpost.php?post_id=<?php echo $result[postid]?>">Править пост</a></p>
		 <p><a href="fullpost.php?post_id=<?php echo $result[postid]?>">Читать полностью</a></p>
		</div>
		 <?php endwhile ?>
	 </div>
</body>
<footer>
	
</footer>
