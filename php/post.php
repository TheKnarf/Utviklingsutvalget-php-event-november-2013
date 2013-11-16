<?php

	require "header.php";
	
	$sql = $database->prepare("select * from post where id=:id;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute(array(
		'id' => $_GET['id']
	));
	
	$data = $sql->fetch();
	
	echo "<h1>" . $data->header . "</h1>";
	echo "<p>" . $data->content . "</p>";
	
	
	// Nå printer vi ut kommentarer
	
	echo "<h1> Dette er et kommentarfelt </h1>";
	
	$sql = $database->prepare("select * from comments where post_id=:post_id;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute(array(
		'post_id' => $_GET['id']
	));
	
	echo "<ul>";
	
	while($data = $sql->fetch())
	{
		echo "<li>" . htmlspecialchars($data->content) . "</li>";
	}
	
	echo "</ul>";
?>

<form method="post" action="comment.php?id=<?php echo $_GET['id']; ?>">
	<textarea name="content"></textarea>
	<input type="submit" />
</form>
	
<?php
	require 'footer.php';