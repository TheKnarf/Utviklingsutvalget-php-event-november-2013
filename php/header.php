<?php require "database.php"; // here we get inn the database ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title> Vår første side </title>
		<style>
			body {
				<?php
					// Lets parse the database for some css properties and echo them out
					$sql = $database->prepare("select * from settings;");
					$sql->setFetchMode(PDO::FETCH_OBJ);
					$sql->execute();
					
					while($data = $sql->fetch())
					{
						echo $data->property . ":" . $data->content . ";\n";
					}
				?>
			}
		</style>
	</head>
	<body>
		<a href="http://localhost/"> Min fantastiske nettside </a>