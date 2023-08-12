<!--PAULO HAITTY S.S.S 3°D-->
<?php
	session_start();
	
	$conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");
	
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	
	$sql_consulta = "SELECT
							matr, nome, login, senha,
							funcao
					 FROM
					 		funcionario
					 WHERE 
							login = '$login'
					 AND
							senha = '$senha'";
    
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
	
	$linhas = mysqli_num_rows ($resultado_consulta);
	
	if ($linhas == 1) {
		
		$registro = mysqli_fetch_row ($resultado_consulta);
		$_SESSION["matr"] = $registro[0];
		$_SESSION["nome"] = $registro[1];
		$_SESSION["login"] = $registro[2];
		$_SESSION["funcao"] = $registro[4];
		
		echo "<script>
						location.href = ('administracao.php')
			  </script>";
	}
	
	else {
		echo "<script>
						alert ('!! Login ou senha incorreta !! Digite Novamente !!')
						alert ('!! Voltando... !!')
		      </script>";
		echo "<script>
						location.href = ('index.php')
		      </script>";
	}
	
?>