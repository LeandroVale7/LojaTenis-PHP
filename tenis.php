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

                $sql_consulta = "SELECT cod_tenis, modelo, marca, genero, tamanho, preco, cor, tipo, altura_cano, foto
                                 FROM tenis
                                 WHERE nf_cod_nf IS null
                                 AND carrinho = 'N'";        
                                         

                $resultado_consulta = mysqli_query ($conectar, $sql_consulta);

                ?>
        <p class="back"><a href="administracao.php">Voltar</a></p>
        <?php if($_SESSION["funcao"] == "Administrador") { ?> <p class="cadastrartenis"><a href="cadastra_tenis.php">Cadastrar Tênis</a></p> <?php } else {} ?>

        <table class="exibetenis">
          <tr>

            <td class="borda">
              <p> Modelo </p>
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
              <p>Preço</p>
            </td>

            <td class="borda">
              <p> Cor </p>
            </td>

            <td class="borda">
              <p> Tipo </p>
            </td>

            <td class="borda">
              <p>Altura do cano</p>
            </td>

            <?php if($_SESSION["funcao"] == "Administrador") { ?> <td class="borda">
              <p>Ação</p>
            </td> <?php } else {} ?>

          </tr>

          <?php
                    while ($registro = mysqli_fetch_row ($resultado_consulta)) {
                    ?>
          <td class="link">
          <p><a href="exibe_tenis.php?codigo=<?php echo $registro[0];?>">
            <?php echo "$registro[1]"; ?>
            </a></p>
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
              $<?php echo $registro[5]; ?>
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
          </td>
          <td>
            <p>
              <?php echo $registro[8]; ?>
            </p>
          </td>
          
          <?php if($_SESSION["funcao"] == "Administrador") { ?>
            <td class="link">
            <p>
            <a href="alteratenis.php?codigo=<?php echo $registro[0];?>"> Alterar </a>
            </p>
            </td>
            </td> <?php } else {} ?>

          

          </tr>
          <!--</div>-->
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