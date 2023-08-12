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
        <h1> Altera Tênis </h1>

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
                    
            $sql_pesquisa = "SELECT  cod_tenis, modelo, marca, genero, tamanho, preco, cor, tipo, altura_cano, foto
                    FROM tenis
                     WHERE cod_tenis = '$codigo'";

            $resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);  
            
            $registro = mysqli_fetch_row ($resultado_pesquisa);
          ?>

          <form method="post" action="processa_altera_tenis.php" enctype="multipart/form-data">
            <input type="hidden" name="codigo" value="<?php echo "$codigo"; ?>">
            <table class="alteratenis">
          <tr>

            <td><div class="user-boxcadastratenis"><input type="text" name="modelo" value="<?php echo "$registro[1]"; ?>" required><label> Modelo </label></div></td>

            <td><div class="user-boxcadastratenis"><input type="text" name="marca" value="<?php echo "$registro[2]"; ?>" required><label> Marca </label></div></td>

            <td><div class="user-boxcadastratenis"><input type="text" name="tamanho" value="<?php echo "$registro[4]"; ?>" required><label> Tamanho </label></div></td>

          </tr>  

            <tr>
                <td><div class="user-boxcadastratenis"><input type="text" name="preco" value="<?php echo "$registro[5]"; ?>" required><label> Preço </label></div></td>
              

              
                
                <td><div class="user-boxcadastratenis"><input type="text" name="cor" value="<?php echo "$registro[6]"; ?>" required><label> Cor </label></div></td>
                              

                
                <td><div class="user-boxcadastratenis"><input type="text" name="tipo" value="<?php echo "$registro[7]"; ?>" required><label> Tipo </label></div></td>
                
                
            </tr>

            <tr>

                  <td><div class="user-boxcadastratenis"><input type="text" name="altura_cano" value="<?php echo "$registro[8]"; ?>" required><label> Altura do cano </label></div></td>

                <td>
                  <label> Gênero </label>
                  <p>

                    <select name="genero" value="<?php echo "$registro[3]"; ?>" required>
                      <option value="Feminino" <?php
                            if ($registro[3] == "Feminino") {
                              echo "selected";
                            }
                          ?> >Feminino</option>
                      <option value="Masculino" <?php
                            if ($registro[3] == "Masculino") {
                              echo "selected";
                            }
                          ?> >Masculino</option>

                    </select>

                  </p>
                </td>

                <td><label> Foto </label><input type="file" name = "foto"></td>

                </tr>
          </table>
          <div class="btnalteratenis">
            <input type="submit" value="Alterar" class="btntenis">
            </div>
          </form>
          <p class="back"><a href="tenis.php">Voltar</a></p>
        </div>

        

      </div>
      <div class="rodapeinicial">

    </div>
    </div>

    
  </div>

</body>

</html>