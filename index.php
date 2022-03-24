<?php include("cabecalho.php");  ?>
<?php include("menu.php");  ?>
<?php include("conexao.php"); ?>


<section>
	
		<?php
			$stmt = $pdo->prepare("select count(*) from tbProduto");	
			$stmt ->execute();
			
			$row = $stmt ->fetch(PDO::FETCH_NUM);

			echo "Total de produtos: $row[0]";			
		?>

		<?php
			$stmt2 = $pdo->prepare("select sum(valor) from tbProduto");	
			$stmt2 ->execute();
			
			$row2 = $stmt2 ->fetch(PDO::FETCH_NUM);

			echo "Soma dos valores dos produtos: $row2[0]";			
		?>
		
</section>



<?php include("rodape.php")  ?>
