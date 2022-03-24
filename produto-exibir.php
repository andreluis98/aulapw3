<?php 
	include("cabecalho.php");
	include("menu.php");
	include("conexao.php");

	echo "<h1 class='title'> Exibir produtos </h1>";

?>

<section>

	<!--<form method="post" action="produto-inserir.php">-->
	<form method="post" action="produto-salvar.php">	
		<div>
			<input  type="hidden" placeholder="idProduto" name="txIdProduto" value="<?php echo @$_GET['id']; ?>" />
		</div>

		<div>
			<input class="input" type="text" placeholder="Produto" name="txCategoria" value="<?php echo @$_GET['categoria']; ?>" />
			<span class="input-border"></span>
		</div>

		<!-- Categorias -->
		<?php
			$stmtCat = $pdo->prepare("select * from tbCategoria");	
			$stmtCat ->execute();				
		?>
		<div>
			<?php 
				//variável para controlar qual item do select será exibido
				$idCat = @$_GET['cat'];				
			?>

			<select name="txIdCategoria">
				<option  value='0' > Escolha uma categoria </option>
				<?php 
					while($rowCat = $stmtCat ->fetch(PDO::FETCH_BOTH)){
						if($idCat==$rowCat[0]){
							$sel = "selected";
						}
						else{
							$sel = "";
						}
						echo "<option value='$rowCat[0]' $sel> $rowCat[1] </option>";											
					}
				?>				
			</select>
			<!-- <input type="text" placeholder="idCategoria" name="txIdCategoria" value="<?php //echo @$_GET['idCategoria'];?>" />-->
		</div>
		<!-- Fim Categorias -->

		<div>
			<input class="input" type="text" placeholder="Valor" name="txValor" value="<?php echo @$_GET['valor'];?>" />
			<span class="input-border"></span>
		</div>

		<div>
			<input class="submit" type="submit" value="Salvar" />
		</div>
	</form>

</section>

<section style="overflow-x: auto;">
	
	<table border="1">
		<!--<th>Id</th> -->
		<th>Produto</th>
		<th>Categoria</th>
		<th>Valor</th>
		<th> &nbsp; </th>
		<th> &nbsp; </th>

			<tbody>
				<?php
					$stmt = $pdo->prepare("select p.idProduto,p.produto,c.categoria,p.valor,p.idCategoria
					from tbproduto p
					inner join tbcategoria c
					on p.idCategoria = c.idCategoria");	
					$stmt ->execute();
					
					while($row = $stmt ->fetch(PDO::FETCH_BOTH)){

						echo "<tr>";
							//echo "<td> $row[0] </td>";
							echo "<td> $row[1] </td>";
							echo "<td> $row[2] </td>";
							echo "<td> $row[3] </td>";
							echo "<td>";
								echo "<a href='produto-excluir.php?id=$row[0]'> Excluir </a>"; 
							echo "</td>";
							echo "<td>";								
								echo "<a href='?id=$row[0]&produto=$row[1]&cat=$row[4]&valor=$row[3]'> Alterar </a>"; 
							echo "</td>";
						echo "</tr>";					
					}	
				?>
		</tbody>
	</table>

</section>

<?php include("rodape.php");?>