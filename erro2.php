<!DOCTYPE HTML>
<html lang="pt-br"> <!-- indicando a linguagem que iremos usar no codigo html -->
<head>
<meta charset="utf-8">
    <title>Produto não encontrado</title>
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
	
	include 'conexao.php';	
	include 'nav.php';
	include 'cabecalho.html';
	
?>
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4 text-center">
				<h2>Nenhum carro foi encontrado!</h2>
			</div>
		</div>
	</div>
	<br>
	<?php include 'rodape.html' ?>
</body>
</html>