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
        <h1> RELATÓRIOS DE VENDAS </h1>

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
      
      $sql_consulta_vendas = "SELECT preco from tenis WHERE carrinho = 'V'";
      
      $resultado_consulta = mysqli_query ($conectar, $sql_consulta_vendas);   
              
        
            $valor_total = 0;
            while ($registro_total_vendas = mysqli_fetch_row ($resultado_consulta))
            {
              $valor_total = $valor_total + $registro_total_vendas[0];
          
            }
    ?>
        <p class="totalvendas"> Valor total da venda: <?php echo $valor_total; ?> </p>

        <p class="back"> <a href="relatorios.php"> Voltar </a> </p>
      </div>

    </div>

    <div class="rodapeinicial">

    </div>

  </div>
</body>

</html>