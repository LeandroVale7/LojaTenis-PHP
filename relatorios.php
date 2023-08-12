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
        <h1> RELATÓRIOS</h1>
        
        <div class="topo_menu">
          <ul>
            <li> <?php include "valida_login.php"; ?> </li>
            <li><a href="desconectar.php"> Sair </a></li>
          </ul>
        </div>
        </div>

      </div>

      <div class="conteudo">
        <div class="menu">
      
    <ul>
  
            <li><a href="rel_estoque.php">Relatório de Tênis no estoque</a></li>
            <li><a href="rel_vendas.php">Relatório Total de Vendas</a></li>
            <li><a href="rel_funcionarios.php">Relatório de Funcionários</a></li></br>
            <li><a href="administracao.php"> Página Inicial </a></li>
            
          </ul>

      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>

</html>