<!--PAULO HAITTY S.S.S 3°D-->
<?php	
	if ($_SESSION["funcao"] == "Administrador") {
?>
  
<ul>
	
	<li><a href="tenis.php"><font color="white"> Tênis </font></a></li>
	<li><a href="funcionarios.php"><font color="white"> Funcionários </font></a></li>
	<li><a href="vendas.php"><font color="white"> Vendas </font></a></li>
	<li><a href="relatorios.php"><font color="white"> Relatórios </font></a></li>
	
</ul>

<!--<?php } if ($_SESSION["nome"] == "Paulo") { ?>
  <style>
  body {
  animation: gradient 15s ease infinite;
  background: linear-gradient(
      -45deg,
      #fca903,
      #ee7752,
      #e73c7e,
      #23a6d5,
      #23d5ab
    )
    no-repeat;
  background-size: 300% 300%;
  font-family: sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  height: 100vh;
  font-size: 150%;
       }
  </style>-->

<?php
	} elseif ($_SESSION["funcao"] == "Estoquista") {
?>

<ul>
		<li><a href="tenis.php"><font color="white"> Tênis </font></a></li>
</ul>

<?php
	} elseif ($_SESSION["funcao"] == "Vendedor") {
?>

<ul>
	<li><a href="vendas.php"><font color="white"> Vendas </font></a></li>
</ul>

<?php
	}
?>