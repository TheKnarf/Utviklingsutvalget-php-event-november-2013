<?php
	// Require the header
	require "header.php";	
				
	// Run some sql against the database
	$sql = $database->prepare("select * from post;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute();
	
	// Go through all the data and fetch one row at a time from the database
	echo "<ul>";
	
	while($data = $sql->fetch())
	{
		echo "<li> <a href='post.php?id=" . $data->id;
		echo "'>" . $data->header . "</a></li>";
		
		/*
		 *		There are several types of comments.
		 *		Some like this one goes over several lines
		 */

		# Some just goes over one line
		// This to goes just over one line
	}
	
	echo "</ul>";

	// Show the footer
	require 'footer.php';