<?php
	// Require gets the code from header into this file. If the file doesnt exists the application stops running
	require "header.php";
	
	// We prepare an sql statement to be executed in the database
	// Then we set the fetch mode, which means what it returns from the database
	// Then we excecute the sql with some data.
	// In this case we say that the :id part is to be replaced with the content of the $_GET['id'] variable
	$sql = $database->prepare("select * from post where id=:id;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute(array(
		'id' => $_GET['id']
	));
	
	// Then we wetch the first row from the database
	$data = $sql->fetch();
	
	// And print out the header and content bit fo that data
	echo "<h1>" . $data->header . "</h1>";
	echo "<p>" . $data->content . "</p>";
	
	
	// ---- Then we prints out the comments ----
	
	echo "<h1> Dette er et kommentarfelt </h1>";
	
	// Here we run a new sql
	$sql = $database->prepare("select * from comments where post_id=:post_id;");
	$sql->setFetchMode(PDO::FETCH_OBJ);
	$sql->execute(array(
		'post_id' => $_GET['id']
	));
	
	// And then we run a loop which fetches all the rows of that sql query, one at a time. 
	echo "<ul>";
	while($data = $sql->fetch())
	{
		echo "<li>" . htmlspecialchars($data->content) . "</li>";
	}
	echo "</ul>";

	// Here the php stops and what comes after here is pure html
?>

<form method="post" action="comment.php?id=<?php echo $_GET['id']; ?>">
	<textarea name="content"></textarea>
	<input type="submit" />
</form>
	
<?php
	// And we inclue the footer
	require 'footer.php';