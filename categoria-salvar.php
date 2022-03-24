<?php

    $idCategoria = $_POST['txIdCategoria'];
    $categoria = $_POST['txProduto'];

    include("conexao.php");

    if($idProduto>0){
        $stmt = $pdo->prepare("update tbCategoria set 
                            categoria='$categoria'
                            ,idCategoria = $idCategoria");	
    }
    else{
        $stmt = $pdo->prepare("insert into tbCategoria values(null,'$categoria');");
    }
    
	$stmt ->execute();
    header("location:categoria-exibir.php");
?>