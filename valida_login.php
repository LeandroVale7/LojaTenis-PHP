<!--PAULO HAITTY S.S.S 3°D-->
<?php
	if ( isset($_SESSION["login"]) ) {//mudei aqui pq nome pode repetir
		
		$nome = $_SESSION["nome"];

		echo "OLÁ $nome <div class=divisoria></div>";
		
	}
	else {
		echo "<script>
						alert ('!! Você não está logado !!')
						alert ('!! Voltando... !!')
		      </script>";
		echo "<script>
						location.href = ('index.php')
		      </script>";
	}
?>