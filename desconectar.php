<!--PAULO HAITTY S.S.S 3°D-->
<?php
	session_start();
	
	$_SESSION = array();

	session_unset();

	session_destroy();

	echo "<script>
					location.href = ('index.php')
		  </script>";
?>