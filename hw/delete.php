<?php

	include_once('functions.php');		
	if ($_GET) {
	    $delete = removeArticle($_GET['id']);
    }

?>
Message about result
<hr>
<a href="index.php">Move to main page</a>