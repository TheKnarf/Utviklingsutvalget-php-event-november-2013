<?php
	
	// Lets open up a connection to an database.
	// The first parameter is a connection string saying that it is an mysql database,
	// the host is localhost and the name of the database is blog.
	// The second parameter is the database user (root is the standard one),
	// and the third is the passord (on Wampserver and XAMPP a blank password is standard)
	$database = new PDO("mysql:host=localhost;dbname=blog", "root", "");
