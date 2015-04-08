<?php

	// require_once("connect.php");

	require_once("functions.php");

	$db_name="Staff";

	if(createDatabase($db_name))
	{
		echo "Database created successfully";
	}
	else
	{
		echo "Unable to create the database";
	}

?>