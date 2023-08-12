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
        <h1> Calçados Show </h1>

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

				$data = date ('d/m/Y');
				$matr = $_SESSION['matr'];
				
				$sql_registro_venda = "INSERT INTO nf 
										   (dataVenda, Funcionario_matr) 
									   VALUES ('$data', '$matr')";
										   
				$resultado_registro_venda = mysqli_query($conectar, $sql_registro_venda);

				$sql_consulta_ultima_venda = "SELECT cod_nf FROM nf
											  ORDER BY cod_nf DESC LIMIT 1";

				$resultado_consulta = mysqli_query($conectar, $sql_consulta_ultima_venda);
												  

				$registro_cod_ven = mysqli_fetch_row($resultado_consulta);
			
				$sql_cod_nf_em_tenis = "UPDATE tenis 
										SET nf_cod_nf = '$registro_cod_ven[0]',
												carrinho = 'V'
										WHERE carrinho = 'S'";

				$resultado_alteracao_tenis = mysqli_query($conectar, $sql_cod_nf_em_tenis);

					
				$sql_consulta_recibo = "SELECT modelo, marca, genero, tamanho, preco, cor, tipo, altura_cano
											FROM tenis
											WHERE nf_cod_nf = '$registro_cod_ven[0]' ";

				$resultado_consulta = mysqli_query($conectar, $sql_consulta_recibo);
					echo "<p> Venda nº: $registro_cod_ven[0]</p>";
					echo "<p> Data: $data </p>";
			?>
			
		<table class="vendas">
			<tr>

			<td class="borda">
			<p> Modelo</p>
			</td>
			<td class="borda">
			<p> Marca </p>
			</td>
			<td class="borda">
			<p> Gênero </p>
			</td>
			<td class="borda">
			<p> Tamanho </p>
			</td>
			<td class="borda">
			<p> Preço </p>

			</td>
			<td class="borda">
			<p> Cor </p>

			</td>
			<td class="borda">
			<p> Tipo </p>

			</td>
			<td class="borda">
			<p> Altura do cano </p>
			</td>

			</tr>
			<?php
						$valor_total = 0;
						while ($registro = mysqli_fetch_row($resultado_consulta)) {
					?>
					<tr>
						<td> <?php echo "$registro[0]";?> </td> 
						<td> <?php echo "$registro[1]";?> </td>
						<td> <?php echo "$registro[2]";?> </td>
						<td> <?php echo "$registro[3]";?> </td>
						<td>
							<?php 
								echo "$registro[4]";
								$valor_total = $valor_total + $registro[4];
							?>
					 	</td>
						 <td> <?php echo "$registro[5]";?> </td>
						 <td> <?php echo "$registro[6]";?> </td>
						 <td> <?php echo "$registro[7]";?> </td>
					</tr>	
					<?php
						}
					?>	
			</table>
					<p class="totalvendas"> Total: <?php echo $valor_total; ?></p>
					
       <div class="fechapedido link">
              <p> <a href="vendas.php"> Fechar Pedido </a> </p>
              
      </div>
         
			
	  </div>

    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>

</html>