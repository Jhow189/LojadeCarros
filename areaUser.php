<!doctype html>

<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>Minha Loja</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	
	.navbar{
		margin-bottom: 0;
	}
	
	
	</style>
	
	
	
</head>

<body>	
	
	<?php
	
	session_start();
	
    if(empty($_SESSION['ID'])) {
    	header("location:formlogon.php");
    }
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';

    $cd_Usuario = $_SESSION['ID'];
    $consultaVenda = $cn->query("select * from vw_venda where cd_cliente ='$cd_Usuario'");

	?>
	
<div class="container-fluid">
	
	<div class="row" style="margin-top: 20px;">
		<h1 class="text-center"> Minhas Compras</h1>
	</div>

	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-2 col-sm-offset-1"><h4> Ticket </h4></div>
		<div class="col-sm-2"><h4> Data da compra </h4></div>
		<div class="col-sm-2"><h4> Produto </h4></div>
		<div class="col-sm-2"><h4> Quantidade </h4></div>
		<div class="col-sm-2"><h4> Preço </h4></div>		
	</div>		
	
	<?php while ($exibeVenda = $consultaVenda->fetch(PDO::FETCH_ASSOC)) { ?>
	<div class="row" style="margin-top: 15px;">
		
		<div class="col-sm-2 col-sm-offset-1"><a href="ticket.php?ticket=<?php echo $exibeVenda['no_Ticket'];?>"><?php echo $exibeVenda['no_Ticket'];?></a></div>
		<div class="col-sm-2"><?php echo date('d/m/Y', strtotime($exibeVenda['dt_Venda']));?></div>
		<div class="col-sm-2"><?php echo $exibeVenda['nm_carro'];?></div>
		<div class="col-sm-2"><?php echo $exibeVenda['qt_carro'];?></div>
		<div class="col-sm-2"><?php echo number_format($exibeVenda['vl_total_item'],2,',','.');?></a></div>

	</div>
	<?php } ?>
	<br>
</div>
	
	<?php
	
	include 'rodape.html';
		
	?>
	
</body>
</html>