<!--PAULO HAITTY S.S.S 3°D-->
<?php 
    session_start ();
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
        <h1> RELATÓRIO DE FUNCIONÁRIOS </h1>
        <div class="topo_menu">
          <ul>
            <li> <?php include "valida_login.php"; ?> </li>
            <li><a href="desconectar.php"> Sair </a></li>
          </ul>
        </div>
      </div>
      <div class="conteudo">
      
			   <?php
				$conectar = mysqli_connect("localhost", "root", "", "loja_tenis");
				
				$sql_consulta = "SELECT matr, nome, funcao,status,telefone,cep, bairro, UF, cidade,num_casa
				FROM funcionario WHERE status = 'A'";
				
				$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
				?>		
				
				<table class="rel_fun">
                        <tr>
                            <td class="borda">
                                <p> Nome </p>
                            </td>
                            <td class="borda">
                                <p> Função</p>
                            </td>
							<td class="borda">
                                <p> Status</p>
                            </td>
                            <td class="borda">
                                <p> Telefone </p>
                            </td>
                            <td class="borda">
                                <p> CEP </p>
                            </td>
                            <td class="borda">
                                <p>Bairro</p>

                            </td>
                            <td class="borda">
                                <p> UF </p>

                            </td>
                            <td class="borda">
                                <p> Cidade </p>

                            </td>
							<td class="borda">
                                <p>Num. Casa</p>
                            </td>
                        </tr>
			
					<?php
                 		
							while ($registro = mysqli_fetch_row($resultado_consulta)) 
							{											
						?>		
                   
                        <td>
                            <p>
                                <?php echo $registro[1]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[2]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[3]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[4]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[5]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[6]; ?>
                            </p>
                        </td>
                        <td>
                            <p>
                                <?php echo $registro[7]; ?>
                            </p>
							<td>
                            <p>
                                <?php echo $registro[8]; ?>
                            </p>
                        </td>
						<td>
                            <p>
                                <?php echo $registro[9]; ?>
                            </p>
                        </td>
                        </tr>
                    <?php
                    }
                    ?>
				</table>
				
				<p class="back"> <a href="relatorios.php"> Voltar </a> </p>
    
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>
</html>