<!--PAULO HAITTY S.S.S 3°D-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="CSS/Layout.css">
  <link rel="stylesheet" type="text/css" href="CSS/Menu.css">
  <link rel="stylesheet" type="text/css" href="CSS/brilho.css">
  <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
  <div class="center">
    <div class="centralizar">

      <div class="topo">
        <h1> Tênis </h1>

        <div class="topo_menu">
          <ul>
            <li> <?php include "valida_login.php"; ?> </li>
            <li><a href="desconectar.php"> Sair </a></li>
          </ul>
        </div>

      </div>

      <div class="conteudo">

          <?php	

            $conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");
																
						$sql_pesquisa = "SELECT matr, nome, sobrenome, login, senha, telefone, funcao
										 FROM funcionario
										 WHERE  matr = '$matr'";

						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
                        $linhas = mysqli_num_rows ($resultado_pesquisa);

                        if($linhas == 1){
						
						$registro = mysqli_fetch_row ($resultado_pesquisa);
                         $_SESSION["matr"] = $registro[0];
                         $_SESSION["nome"] = $registro[1];
                        }
                    ?>
                    
                        <a href="processa_cadastra_fun.php?matr=<?php $registro[0];?>">
                        </a>
                        <?php
					
						echo "<p> Nome: $registro[1] </p>";

						echo "<p> Login: $registro[2]</p>";	
                        
                        echo "<p> Telefone: $registro[3] </p>";

                        echo "<p> Função: $registro[6] </p>";
								
					?>
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>

</html>
