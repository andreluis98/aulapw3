<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao.php");

	echo "<h1 class='title'> Exibir Categorias </h1>";

?>

<section>

	<!--<form method="post" action="produto-inserir.php">-->
	<form method="post" action="categoria-salvar.php">	
		<div>
			<input type="hidden" placeholder="idProduto" name="txIdCategoria" value="<?php echo @$_GET['id']; ?>" />
		</div>

		<div>
			<input  class="input" type="text" placeholder="Produto" name="txProduto" value="<?php echo @$_GET['categoria']; ?>" />
			<span class="input-border"></span>
		</div>


		<div>
			<input class="submit" type="submit" value="Salvar" />
		</div>
	</form>

</section>

<section>
	
	<table border="1">
		<!--<th>Id</th> -->
		<!--<th>IdCategoria</th> -->
		<th> Categoria </th>
		<th> &nbsp; </th>

			<tbody>
				<?php
					$stmt = $pdo->prepare("select * from tbCategoria");	
					$stmt ->execute();
					
					while($row = $stmt ->fetch(PDO::FETCH_BOTH)){

						echo "<tr>";
							//echo "<td> $row[0] </td>";
							//echo "<td> $row[0] </td>";
							echo "<td> $row[1] </td>";
							echo "<td>";
								echo "<a href='categoria-excluir.php?id=$row[0]'> Excluir </a>"; 
							echo "</td>";
						echo "</tr>";					
					}	
				?>
		</tbody>
	</table>

</section>

<?php include("rodape.php");?>