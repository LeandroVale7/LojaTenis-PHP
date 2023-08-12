<!--PAULO HAITTY S.S.S 3°D-->
<?php

	$conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");

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

	$sql_consulta = "SELECT login FROM funcionario WHERE login = '$login'";

	$resultado_consulta = mysqli_query ($conectar,$sql_consulta);

	$linhas = mysqli_num_rows ($resultado_consulta);

		if ($linhas == 1){

			echo "<script>
					alert('Login já cadastrado. Tente outro!')
					alert('Voltando...')
				  </script>";
			echo "<script>
					location.href = ('cadastrofun.php')
			      </script>";

		}else{

			$sql_cadastrar = "INSERT INTO funcionario (nome, sobrenome, login, senha, telefone, cep, bairro, uf, cidade, num_casa, status, funcao)
							  VALUES ('$nome', '$sobrenome', '$login', '$senha', '$telefone', '$cep', '$bairro', '$uf', '$cidade', '$num_casa', '$status', '$funcao')";

		$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);

			if($resultado_cadastrar == true){
				echo "<script>
						alert('$nome cadastrado com sucesso!')
						alert('Voltando...')
				      </script>";
				echo "<script>
					location.href = ('pagina_inicial.php')
				      </script>";
			}
			else{
				echo "<script>
						alert('Ocorreu um erro no servidor. Tente de novo!')
						alert('Voltando...')
				      </script>";
				echo "<script>
						location.href = ('cadastrofun.php')
				      </script>";
			}

		}
?>