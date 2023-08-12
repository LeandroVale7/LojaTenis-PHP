<!--PAULO HAITTY S.S.S 3°D-->
<?php
	session_start ();
	
	$conectar = mysqli_connect ("localhost", "root", "", "loja_tenis");
	
	$codigo = $_POST["codigo"];
	$modelo = $_POST["modelo"];
	$marca = $_POST["marca"];
	$preco = $_POST["preco"];
	$tamanho = $_POST["tamanho"];
	$cor = $_POST["cor"];
	$tipo = $_POST["tipo"];
	$altura_cano = $_POST["altura_cano"];
	$genero = $_POST["genero"];
	$foto = $_FILES["foto"];

	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	else
	{
	$pesquisa_foto = "SELECT foto
	                  FROM tenis
	                  WHERE cod_tenis = '$codigo' ";

	$resultado_pesquisa_foto = mysqli_query ($conectar, $pesquisa_foto);

	$registro_foto = mysqli_fetch_row ($resultado_pesquisa_foto);

	$foto_nome = $registro_foto[0];

    }

	$sql_altera = "UPDATE
	                      tenis
				   SET
   				   		  modelo = '$modelo',
   				   		  marca = '$marca',
                  preco = '$preco',
                  tamanho = '$tamanho',
                  cor = '$cor',
                  tipo = '$tipo',
                  altura_cano = '$altura_cano',
                  genero = '$genero',
                  foto = '$foto_nome'
				   WHERE
						  cod_tenis = '$codigo'";

	$sql_resultado_altera = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_altera == true){
		echo "<script>
		alert ('$modelo alterado com sucesso !')
		alert ('Voltando...')
		      </script>";
		echo "<script>
		location.href = ('tenis.php')
		      </script>";
		exit();
	}
	else
	{
	    echo "<script>
	    alert ('Ocorreu um erro no servidor, dados do Amplificador não foram alterados, Tente de Novo !')
	    alert (Voltando...)
	          </script>";
        echo "<script>
        location.href = ('alteratenis.php')
              </script>";
        exit();
    }    
?>