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
                    
          $sql_consulta = "SELECT matr, nome, sobrenome, login, telefone, cep, bairro, uf, cidade,funcao, num_casa, status
          FROM funcionario";
                    
          $resultado_consulta = mysqli_query ($conectar, $sql_consulta);
          ?>

          <table class="funcionario">

          <tr>

          <td class="borda">
            <p> Nome </p>
          </td>
          <td class="borda">
            <p> Sobrenome </p>
          </td>
          <td class="borda">
            <p> Login </p>
          </td>
          <td class="borda">
            <p> Telefone </p>
          </td>
          <td class="borda">
            <p> Bairro </p>
          </td>
          <td class="borda">
            <p> Cidade </p>
          </td>
          <td class="borda">
            <p> Função </p>
          </td>
          <td class="borda">
            <p> Status </p>
          </td>
          <td class="borda">
            <p> Ação </p>
          </td>

          </tr>

          <?php
            while ($registro = mysqli_fetch_row ($resultado_consulta)) {
          ?>

          <tr>
            
            <td> <p> <?php echo "$registro[1]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[2]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[3]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[4]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[6]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[8]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[9]"; ?> </p> </td>
            <td> <p> <?php echo "$registro[11]"; ?> </p> </td>
            <td class="link"> <p><a href="altera_fun.php?codigo=<?php echo "$registro[0]"; ?> "> Alterar </a></p> </td>

          </tr>

          <?php
            }
          ?>
        </table>

        <p class="back"><a href="administracao.php">Voltar</a></p>
        <p class="cadastrafun"><a href="cadastro_fun.php">Cadastrar</a></p>
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>

</body>

</html>