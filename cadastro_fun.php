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

          <form method="post" action="processa_cadastra_fun.php" enctype="multipart/form-data">
            <table class="cadastrofun">
              
                <tr>
                <td><div class="user-boxcadastratenis"><input type="text" name="nome" required><label> Nome </label></div></td>
              
                <td><div class="user-boxcadastratenis"><input type="text" name="sobrenome" required><label> Sobrenome </label></div></td>
                              
                <td><div class="user-boxcadastratenis"><input type="text" name="login" required><label> Login </label></div></td>

                </tr>

                <tr>

                <td><div class="user-boxcadastratenis"><input type="text" name="senha" required><label> Senha </label></div></td>
               
                <td><div class="user-boxcadastratenis"><input type="text" name="telefone" required><label> Telefone </label></div></td>

                <td><div class="user-boxcadastratenis"><input type="text" name="cep" required><label> CEP </label></div></td> 
                
                </tr>

                <tr>
                  
                <td><div class="user-boxcadastratenis"><input type="text" name="bairro" required><label> Bairro </label></div></td>
               
                <td><div class="user-boxcadastratenis"><input type="text" name="uf" required><label> UF </label></div></td>

                <td><div class="user-boxcadastratenis"><input type="text" name="cidade" required><label> Cidade </label></div></td> 
                
                </tr>

                <tr>

                  <td><div class="user-boxcadastratenis"><input type="text" name="num_casa" required><label> N°Casa </label></div></td> 

                <td>
                  <label> Função </label>
                  <p>

                    <select name="funcao" required>
                      <option> Selecione... </option>
                      <option value="Estoquista" required>Estoquista</option>
                      <option value="Vendedor" required>Vendedor</option>

                    </select>

                  </p>
                </td>

                <td>
                  <label> Status </label>
                  <p>

                    <select name="status" required>
                      <option> Selecione... </option>
                      <option value="A" required>Ativo</option>
                      <option value="I" required>Inativo</option>

                    </select>

                  </p>
                </td>

                </tr>

            </table>

            <div class="btncadastratenis">
            <input type="submit" value="Cadastrar" class="btntenis">
            </div>

          </form>

        <p class="back"><a href="administracao.php">Voltar</a></p>
      </div>
    </div>

    <div class="rodapeinicial">

    </div>
  </div>

</body>

</html>