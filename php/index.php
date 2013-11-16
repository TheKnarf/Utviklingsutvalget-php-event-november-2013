<?php
	require "header.php";	
				
	$sql = $database->prepare("select * from post;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute();
	
	echo "<ul>";
	
	while($data = $sql->fetch())
	{
		echo "<li> <a href='post.php?id=" . $data->id;
		echo "'>" . $data->header . "</a></li>";
		
		/* dette er en kommentar */
		# dette er en kommentar
		//echo "<p>" . $data->content ."</p>";
	}
	
	echo "</ul>";

	require 'footer.php';