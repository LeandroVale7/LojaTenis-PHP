<!--PAULO HAITTY S.S.S 3°D-->
<?php
	$conectar = mysqli_connect("localhost", "root", "", "loja_tenis"); 

	$cod_tenis = $_GET ["cod_tenis"]; 

	
	 $sql_altera = "UPDATE tenis
                   SET carrinho = 'N'
                   WHERE cod_tenis = '$cod_tenis'";

     $sql_resultado_alteracao = mysqli_query($conectar, $sql_altera);
     

     if ($sql_resultado_alteracao == true) {
     


     	echo "<script>
     			alert('Tênis retirado na fila de compra com sucesso!')
     		 </script>";
     	echo "<script> 
     	 		location.href = ('ver_carrinho.php')
     	 	   </script>";	 
     	exit(); 	   
     }
     else{
     	echo "<script>
     			alert('Ocorreu um erro no servidor. O tênis não foi retirado da fila de compras. Tente de novo!')
     		 </script>";
     	echo "<script> 
     	 		location.href = ('ver_carrinho.php')
     	 	   </script>";	 
     }
?>