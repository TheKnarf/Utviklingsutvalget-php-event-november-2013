<?php
	
	require 'header.php';
	
	// Add a new comment to the database
	$sql = $database->prepare("insert into comments (post_id, content) VALUES (:post_id, :content);");
	$sql->setFetchMode(PDO::FETCH_OBJ);

	// Here we get the id from the GET variable, which essensialy is what comes at the end of the url after the questionmark ?id=2
	// The POST variable is what we get from the html form element
	$sql->execute(array(
		'post_id' => $_GET['id'],
		'content' => $_POST['content']
	));
	
	// Run the code in post to show the post and all the comments
	require 'post.php';
	
	// We use require once so that the footer doesn't come up twice
	require_once 'footer.php';