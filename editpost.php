<?php
require_once 'dbconnect.php';
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
	<?php
	$stmt = $conn->prepare('SELECT * FROM posts WHERE postid=:postid ');
	$stmt->bindparam(':postid', $_GET['post_id']);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	?>
	<form method="post" action="Function/editpost.php?post_id=<?php echo $_GET[post_id]?>">
	<p><input type="text" name="title" value="<?php echo $result[title] ?>"></p>
	<p><textarea name="postbody"><?php echo $result[body] ?></textarea></p>
	<p><input type="submit"></p>
</form>	
</body>
<footer>
	
</footer>
