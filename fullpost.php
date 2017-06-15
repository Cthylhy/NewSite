<?php
require_once 'dbconnect.php';
session_start();
echo var_dump($_SESSION['username']);
?>
<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css">
<title>Глагне</title>
<header>
	<div class="head">
		<h1>Бложик Ктулхи</h1>
		<p><a href="index.php">Глагне</a></p>
		<div>
		<?php if (!isset($_SESSION['username'])): ?>
			<a href="login.php">Вход</a>
			<a href="register.php">Регистрация</a>
		<?php else: ?>
		<p> <?php echo "Привет, ", $_SESSION['username']; ?><p>
		<?php endif ?>	
	</div>
	</div>
	</header>
<body>
	
	 <div >
	 <?php 
		$stmt = $conn->prepare('SELECT * FROM posts WHERE :postid = postid');
		$stmt->bindvalue(':postid', $_GET[post_id]);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	 ?>
		<div class="post">
		 <p>Номер поста: <?php echo $result[postid] ?> <br></p>	 	
		 <p>Заголовок поста: <?php echo $result[title];  ?> <br></p>
		 <p>Текст: <br><?php echo $result[body] ?> <br></p>
		 <p>Создано: <?php echo $result[created] ?> <br></p>
		 <p>Пользователь: <?php echo $result[user] ?></p>		 
		</div>
		</div>
		<div>
			<?php
			 $stmt = $conn->prepare('SELECT * FROM comments WHERE :postid = postid');
			 $stmt->bindvalue(':postid', $_GET[post_id] );
			 $stmt->execute();
			 while ($result = $stmt->fetch(PDO::FETCH_ASSOC)):
			?>
		<p>Юзернейм: <?php echo $result[username] ?></p>
		<p> Коммент: <br> <?php echo $result[text] ?></p>
	<?php endwhile ?>
		</div>
		<?php if (isset($_SESSION['username'])): ?>
		<p >Запости коммент</p>
		<form method="post" action="Function/comment.php?post_id=<?php echo $_GET[post_id] ?>">
		<p><textarea name="postbody"></textarea></p>
		<p><input type="submit"></p>
		</form>
	<?php endif ?>
</body>
<footer>
	
</footer>