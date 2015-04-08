<?php

	session_start();

	session_destroy();

	unset($_SESSION['oi']);

	echo '<script>window.location.href="index.php";</script>';

?>