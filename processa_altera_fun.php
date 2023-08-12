<!--PAULO HAITTY S.S.S 3°D-->
<?php
	session_start ();
	
	$conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");
	
	$codigo = $_POST["codigo"];
	$funcao = $_POST["funcao"];
	
	if ($funcao == "Administrador") {	
		$senha = $_POST ["senha"];
		
		$sql_altera = "UPDATE funcionario
						SET
								senha = '$senha'
						WHERE
								matr = '$codigo'";
		
		$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
		
		if ($sql_resultado_alteracao == true) {
			
			echo "<script>
			alert ('Senha do Administrador alterada com sucesso')
			alert ('Voltando...')
			</script>";
			echo "<script>
			location.href = ('funcionarios.php')
			</script>";
			exit();
		}
		else
		{
			echo "<script>
			alert ('Ocorreu um erro no servidor,a senha do Administrador não foi alterada.volte e tente de novo!')	
			alert ('Voltando...')
			</script>";
			echo "<script>
			location.href ('altera_fun.php?codigo=<?php echo $codigo;')
			</script>";
			exit();

		}
	}

	else
	{
		$nome = $_POST["nome"];
		$sobrenome = $_POST["sobrenome"];
		$login = $_POST["login"];
		$senha = $_POST["senha"];
		$telefone = $_POST["telefone"];
		$cep = $_POST["cep"];
		$bairro = $_POST["bairro"];
		$uf = $_POST["uf"];
		$cidade = $_POST["cidade"];
		$num_casa = $_POST["num_casa"];
		$status = $_POST["status"];
		$funcao = $_POST["funcao"];
		
		$sql_pesquisa = "SELECT login FROM funcionario
						 WHERE login = '$login'
		   				 AND matr <> '$codigo'";
		
		$sql_resultado = mysqli_query ($conectar, $sql_pesquisa);
		
		$linhas = mysqli_num_rows ($sql_resultado);
		
		if ($linhas == 1)

		{
			echo "<script> alert ('login do Funcionário já existente, Tente de novo!')
			alert ('Voltando...')</script>";
			echo "<script>
			location.href = ('altera_fun.php?codigo=$codigo')
			</script>";
			exit();
		}
		else
		{
			$sql_altera = "UPDATE funcionario 
						   SET
						   nome = '$nome',
		                   sobrenome = '$sobrenome',
		                   login = '$login',
						   senha = '$senha',
						   telefone = '$telefone',
						   cep = '$cep',
						   bairro = '$bairro',
						   uf = '$uf',
						   cidade = '$cidade',
						   num_casa = '$num_casa',
						   status = '$status',
						   funcao = '$funcao'
			               WHERE
				           matr = '$codigo'";
			
			$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);
			
			if ($sql_resultado_alteracao == true)
			{
				echo "<script>
				alert ('$nome alterado com sucesso')
				alert ('Voltando...')
				</script>";
				echo "<script>
				location.href = ('funcionarios.php')
				</script>";
				exit();

			}
			else
			{
				echo "<script>
				alert ('Ocorreu um erro no servidor,dados do funcionario não foram alterados, tente de novo!')
				alert ('Voltando...')
				</script>";
				echo "<script>
				location.href ('altera_fun.php?codigo=<?php echo echo $codigo;')
				</script>";
				exit();
				
			}
		}
	}
	
?>