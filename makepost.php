<?php
session_start();
echo var_dump($_SESSION['username']);
?>
<!DOCTYPE html>
<meta charset="utf-8">
<title>Пили пост</title>
<header>
	<div>
		<h1>Пили пост</h1>
		<a href="index.php">Глагне</a>
	</div>
</header>
<body>
	<form method="post" action="Function/makepost.php">
	<p><input type="text" name="title"></p>
	<p><textarea name="postbody"></textarea></p>
	<p><input type="submit"></p>
</form>	
</body>
<footer>
	
</footer>
