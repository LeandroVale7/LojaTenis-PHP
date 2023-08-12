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
        <h1> Cadastrar Tênis </h1>

        <div class="topo_menu">
          <ul>
            <li> <?php include "valida_login.php"; ?> </li>
            <li><a href="desconectar.php"> Sair </a></li>
          </ul>
        </div>

      </div>

      <div class="conteudo">

        <p class="back"><a href="tenis.php">Voltar</a></p>

        <div class="cadastratenis">
          
          <form method="post" action="processa_cadastra_tenis.php" enctype="multipart/form-data">
            <table class="cadastratenis">
              
                <tr>
                
                <td><div class="user-boxcadastratenis"><input type="text" name="modelo" required><label> Modelo </label></div></td>

                <td><div class="user-boxcadastratenis"><input type="text" name="marca" required><label> Marca </label></div></td>
                              
                <td><div class="user-boxcadastratenis"><input type="text" name="tamanho" required><label> Tamanho </label></div></td>

                </tr>

                <tr>
                <td><div class="user-boxcadastratenis"><input type="text" name="preco" required><label> Preço </label></div></td>
               
                <td><div class="user-boxcadastratenis"><input type="text" name="cor" required><label> Cor </label></div></td>

                <td><div class="user-boxcadastratenis"><input type="text" name="tipo" required><label> Tipo </label></div></td> 
                
                </tr>

                <tr>

                  <td><div class="user-boxcadastratenis"><input type="text" name="altura_cano" required><label> Altura do cano </label></div></td>

                <td>
                  <label> Gênero </label>
                  <p>

                    <select name="genero" required>
                      <option> Selecione... </option>
                      <option value="Feminino" required>Feminino</option>
                      <option value="Masculino" required>Masculino</option>

                    </select>

                  </p>
                </td>

                <td><label> Foto </label><input type="file" name = "foto" required></td>

                </tr>

            </table>

            <div class="btncadastratenis">
            <input type="submit" value="Cadastrar" class="btntenis">
            </div>

          </form>
        </div>
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>
  </div>
</body>

</html>