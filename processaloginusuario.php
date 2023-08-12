<!--PAULO HAITTY S.S.S 3°D-->
<?php
	session_start();
	
	$conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");

	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$sql_consulta = "SELECT
							cpf, nome, login, senha
					 FROM
					 		cliente
					 WHERE 
							login = '$login'
					 AND
							senha = '$senha'";
    
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	if ($linhas == 1) {
		
		$registro = mysqli_fetch_row ($resultado_consulta);
		$_SESSION["cpf"] = $registro[0];
		$_SESSION["nome"] = $registro[1];
		$_SESSION["senha"] = $registro[3];
		
		echo "<script>
						location.href = ('pagina_inicial.php')
			  </script>";
	}
	
	else {
		echo "<script>
						alert ('!! Login ou senha incorreta !! Digite Novamente !!')
						alert ('!! Voltando... !!')
		      </script>";
		echo "<script>
						location.href = ('home.php')
		      </script>";
	}
	
?>