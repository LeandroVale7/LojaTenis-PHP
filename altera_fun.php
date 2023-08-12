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
        <h1> Funcionários </h1>

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
						
						$codigo = $_GET["codigo"];
						
						$sql_pesquisa = "SELECT matr, nome, sobrenome, login, senha, telefone, cep, bairro, uf, cidade, funcao, num_casa, status
										 FROM
										       funcionario
										 WHERE
										       matr = '$codigo'";
						
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row ($resultado_pesquisa);
						
					  ?>

					  <form method="post" action="processa_altera_fun.php">
					
						<input type="hidden" name="codigo" value="<?php echo "$codigo"; ?>">

						<?php 
							if ($registro[10] == "Administrador") {	
						?>
							<div class="ADM">
							<input type="hidden" name="funcao" value="<?php echo $registro[10]; ?>">
							
							<p align="left"> Nome: <?php echo "<strong>$registro[1]</strong>";?> </p>

							<p align="left"> Sobrenome: <?php echo "<strong>$registro[2]</strong>";?> </p>

							<p align="left"> Login: <?php echo "<strong>$registro[3]</strong>";?> </p>

							<p align="left"> Senha: <input type="password" name="senha" value="<?php echo $registro[4];?>" required></p>
							
							<p align="left"> Status: <strong> Ativo </strong></p>
							</div>	
							
						<?php
							}else{
						?>

						<table class="altera_fun">

						  <tr>

							<td><div class="user-boxalterafun"><input type="text" name="nome" value="<?php echo $registro[1];?>" required><label> Nome </label></div></td>

							<td><div class="user-boxalterafun"><input type="text" name="sobrenome" value="<?php echo $registro[2];?>" required><label> Sobrenome </label></div></td>
						
							<td><div class="user-boxalterafun"><input type="text" name="login" value="<?php echo $registro[3];?>" required><label> Login </label></div></td>

							<td><div class="user-boxalterafun"><input type="password" name="senha" value="<?php echo $registro[4];?>" required><label> Senha </label></div></td>

						  </tr>


						  <tr>

							<td><div class="user-boxalterafun"><input type="text" name="telefone" value="<?php echo $registro[5];?>" required><label> Telefone </label></div></td>

							<td><div class="user-boxalterafun"><input type="text" name="cep" value="<?php echo $registro[6];?>" required><label> CEP </label></div></td>

							<td><div class="user-boxalterafun"><input type="text" name="bairro" value="<?php echo $registro[7];?>" required><label> Bairro </label></div></td>

							<td><div class="user-boxalterafun"><input type="text" name="uf" value="<?php echo $registro[8];?>" required><label> UF </label></div></td>

						  </tr>

						  <tr>

							<td><div class="user-boxalterafun"><input type="text" name="cidade" value="<?php echo $registro[9];?>" required><label> Cidade </label></div></td>

							<td><div class="user-boxalterafun"><input type="text" name="num_casa" value="<?php echo $registro[11];?>" required><label> N°Casa </label></div></td>

							<!--<td><div class="user-boxalterafun"><input type="text" name="nome" value="<?php echo $registro[12];?>" required><label> Status </label></div></td>-->

							<!--<td>
								    <label> Função </label></br>
										<input type="radio" name="funcao" value="Estoquista" <?php if ($registro[10] == "Estoquista") { echo "checked"; }?>> Estoquista
										<input type="radio" name="funcao" value="Vendedor" <?php if ($registro[10] == "Vendedor") { echo "checked"; }?>> Vendedor
							</td>-->

							<td>

							<select name="funcao">

											<option value="Estoquista"
												<?php
												 if ($registro[10] == "Estoquista") {
												  echo "selected";
												 }	
												?>
												> Estoquista </option>

											<option value="Vendedor"
												<?php
												 if ($registro[10] == "Vendedor") {
												  echo "selected";
												 }	
												?>
												> Vendedor </option>
							</select>

							</td>

							<!--<td>
								    <label> Status </label></br>
										<input type="radio" name="status" value="A" <?php if ($registro[12] == "A") { echo "checked"; }?>> Ativo
										<input type="radio" name="status" value="I" <?php if ($registro[12] == "I") { echo "checked"; }?>> Inativo
							</td>-->

							<td>

							<select name="status">

											<option value="A"
												<?php
												 if ($registro[12] == "A") {
												  echo "selected";
												 }	
												?>
												> Ativo </option>

											<option value="I"
												<?php
												 if ($registro[12] == "I") {
												  echo "selected";
												 }	
												?>
												> Inativo </option>
							</select>
							
							</td>

						  </tr>

						</table>	

						<?php
							}
						?>

        <p class="back"><a href="funcionarios.php">Voltar</a></p>

        <div class="btnalterafun">
            <input type="submit" value="Alterar" class="btnaltera">
        </div>

      
      </div>
    </div>
</form>
    <div class="rodapeinicial">

    </div>
  </div>

</body>

</html>