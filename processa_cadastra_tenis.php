<!--PAULO HAITTY S.S.S 3°D-->
<?php
    $conectar = mysqli_connect("localhost", "root", "", "loja_tenis");

    $modelo = $_POST["modelo"];
    $marca = $_POST["marca"];
    $genero = $_POST["genero"];
    $tamanho = $_POST["tamanho"];
    $preco = $_POST["preco"];
    $cor = $_POST["cor"];
    $tipo = $_POST["tipo"];
    $altura_cano = $_POST["altura_cano"];
    $foto = $_FILES["foto"];

    $foto_nome = "img/".$foto["name"];
    move_uploaded_file($foto["tmp_name"], $foto_nome);
    
    $sql_cadastrar = "INSERT INTO tenis (modelo, marca, genero, tamanho, preco, cor, tipo, altura_cano, foto)
                      VALUES ('$modelo', '$marca', '$genero', '$tamanho', '$preco', '$cor', '$tipo', '$altura_cano', '$foto_nome')";

    $sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);

   if ($sql_resultado_cadastrar == true) {
    echo "<script>
          alert ('$modelo cadastrado com sucesso !')
          alert ('Voltando...')
          </script>";
    echo "<script>
          location.href = ('tenis.php')
        </script>";
  }
  else {
    echo "<script>
          alert ('Ocorreu um erro no servidor ao tentar cadastrar !')
          alert ('Voltando...')
          </script>";
      echo "<script>
          location.href = ('cadastra_tenis.php')
        </script>";
  } 
?>