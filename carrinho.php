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
					$conectar = mysqli_connect("localhost", "root", "", "loja_tenis");

					$sql_consulta = "SELECT cod_tenis, modelo, marca, genero, tamanho, preco, cor, tipo, altura_cano
									 FROM tenis
									 WHERE nf_cod_nf IS null
									 AND carrinho = 'S'";
					
					$resultado_consulta = mysqli_query($conectar, $sql_consulta);
		?>

		<table class="carrinho">

				<tr>
					<td class="borda"> Modelo </td>
					<td class="borda"> Marca </td>
					<td class="borda"> Gênero </td>
					<td class="borda"> Tamanho </td>
					<td class="borda"> Preco </td>
					<td class="borda"> Cor </td>
					<td class="borda"> Tipo </td>
					<td class="borda"> Altura do cano </td>
					<td class="borda"> Ação </td>
				</tr>

				<?php
					$valor_total = 0;
					while ($registro = mysqli_fetch_row ($resultado_consulta)) {
				?>

				<tr>

					<td class="link">
						<p>
						<a href="exibe_tenis.php?codigo=<?php echo $registro[0]; ?>">
							<?php echo $registro[1]; ?>
						</a>
					</p>
					</td>

					<td><?php echo $registro[2]; ?></td>

					<td> <?php echo $registro[3]; ?> </td>

					<td> <?php echo $registro[4]; ?> </td>

					<td> <?php 
							echo $registro[5]; 
							$valor_total = $valor_total + $registro[5];
						  ?>
					 </td>

					 <td> <?php echo $registro[6]; ?> </td>

					 <td> <?php echo $registro[7]; ?> </td>

					 <td> <?php echo $registro[8]; ?> </td>

					 <td class="link">
					 	<p>
					 	<a href="retira_carrinho.php?codigo_amp=<?php echo $registro[0]; ?>"> 
					 		Retirar da fila
					 	</a>	
					 </p>
					 </td>

				</tr>	

				<?php
					}

				?>
			</table>
				<p class="totalcarrinho"> Total: <?php echo $valor_total; ?> </p>
				<p class="back"> <a href="vendas.php"> Voltar à seleção </a></p>
				<p class="finalizar"> <a href="recibo_compra.php"> Finalizar venda </p>
			

      </div>

    </div>

    <div class="rodapeinicial">

    </div>

  </div>
  </div>
</body>
</html>