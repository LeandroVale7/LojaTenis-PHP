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
        <div class="menu">


        </div>

        <?php
                $conectar = mysqli_connect("localhost", "root", "", "loja_tenis");

                $codigo = $_GET["codigo"];

                $sql_consulta = "SELECT cod_tenis, foto, marca, genero, tamanho, preco, cor, tipo, altura_cano, modelo 
                                 FROM tenis
                                 WHERE cod_tenis = '$codigo'";        
                                         

                $resultado_consulta = mysqli_query ($conectar, $sql_consulta);

                ?>

        <?php if($_SESSION["funcao"] == "Vendedor") { ?> <p class="back"><a href="vendas.php">Voltar</a></p> <?php } else { ?>
        <p class="back"><a href="tenis.php">Voltar</a></p> <?php } ?>
        
        <table class="exibetenis">
          <tr>

            <td>
              <p> Exibição do Produto </p>
            </td>

          </tr>
          <?php
                    while ($registro = mysqli_fetch_row ($resultado_consulta)) {
                    ?>
          
          <td colspan="2" class="effect_foto">
                <img src="<?php echo "$registro[1]"; ?>">
              </td>

          </tr>

          <?php

                    }
                    ?>
        </table>
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>

</html>