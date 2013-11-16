<?php

	require 'header1.php';
	
	// Legge til en ny kommentar i databasen
	$sql = $database->prepare("insert into comments (post_id, content) VALUES (:post_id, :content);");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute(array(
		'post_id' => $_GET['id'],
		'content' => $_POST['content']
	));
	
	// Kjøre koden i post slik at vi viser alle kommentarene
	require 'post.php';
	
	require_once 'footer.php';