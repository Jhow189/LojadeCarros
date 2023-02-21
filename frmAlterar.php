<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Minha Loja - Logon de usuário</title>
	
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
<script src="jquery.mask.js"></script>

<script>
	
	
/* mscara para o preço */	
$(document).ready(function(){
	
$('#preco').mask('000.000.000.000.000,00', {reverse: true});	
	
});
	
</script>
	
<style>

.navbar{
	margin-bottom: 0;
}
	
	
</style>
	
	
	
	
</head>

<body>
	
<?php
	session_start();	
	
// se a sessão id estiver vazia ou se a sessão status for diferente de adm entao execute
	if(empty($_SESSION['Status']) || $_SESSION['Status'] != 1){ //verifica se tem linha do status 1 no banco
			header('location:index.php');  // redireciona para página index.php
	}
	
	//recuperando os IDS que foram enviados pela lista.php
	$cd = $_GET['id']; // primeiro é do carro
	$cd2 = $_GET['id2']; // segundo é categoria
	$cd3 = $_GET['id3']; // terceiro é a marca
	
	
	include 'conexao.php';	//busca as informações das paginas e inclui no meu arquivo atual
	include 'nav.php';
	include 'cabecalho.html';
	
	
	$consulta = $cn->query("select * from tbl_carro where cd_carro='$cd'");	
	$exibe = $consulta->fetch(PDO::FETCH_ASSOC);
	
	$consultaCat = $cn->query("select cd_categoria, ds_categoria from tbl_categoria where cd_categoria='$cd2' union select cd_categoria, ds_categoria FROM tbl_categoria where cd_categoria !='$cd2'");
	
	$consultaMarca = $cn->query("select cd_marca, nm_marca from tbl_marca where cd_marca='$cd3' union select cd_marca, nm_marca from tbl_marca where cd_marca !='$cd3'");
	
	?>
	
	
	<div class="container-fluid">
	
		<div class="row">
		
			<div class="col-sm-4 col-sm-offset-4">
				
				<h2>Alteração de produto</h2>
				
				<form method="post" action="alterarProduto.php?cd_altera=<?php echo $cd;?>" name="incluiProd" enctype="multipart/form-data">
				
					<div class="form-group">					

						<label for="sltcat">Categoria</label>

						<select class="form-control" name="sltcat">
							<?php					
								while($exibecat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibecat['cd_categoria'];?>"><?php echo $exibecat['ds_categoria'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
						<label for="txtlivro">Nome do Carro</label>
						<input type="text" name="txtcarro" value="<?php echo $exibe['nm_carro']; ?>"  class="form-control" required id="txtcarro">
					</div>
					
					<div class="form-group">					

						<label for="sltmarca">Marca</label>

						<select class="form-control" name="sltMarca">
							<?php					
								while($exibemarca = $consultaMarca->fetch(PDO::FETCH_ASSOC)){
							?>
							<option value="<?php echo $exibemarca['cd_marca']; ?>"><?php echo $exibemarca['nm_marca'];?></option>;
							<?php }	?>	
						</select>
					</div>
					
					<div class="form-group">
				
					<label for="preco">Preço</label>
					
					<input type="text" class="form-control" required name="txtpreco" value="<?php echo $exibe['vl_preco']; ?>" id="preco">

					</div>
					
					<div class="form-group">
				
					<label for="txtqtde">Quantidade em Estoque</label>
					
					<input type="number" class="form-control" name="txtqtde" value="<?php echo $exibe['qt_estoque']; ?>" required id="txtqtde">

					</div>
					
					<div class="form-group">
				
					<label for="txtresumo">Resumo do veículo</label>
					
						<textarea rows="5" class="form-control" name="txtresumo"><?php echo $exibe['ds_resumo_carro']; ?></textarea>
						
					</div>
					
					<div class="form-group">
				
					<label for="txtfoto1">Foto do Veículo</label>
					
					<input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">

					</div>
					
					<div class="form-group">
						
					<img src="imagens/<?php echo $exibe['camin_img']; ?>" width="100px" >
						
					</div>
					
					<div class="form-group">
				
					<label for="sltlanc">Lançamento?</label>
					
					<select class="form-control" name="sltlanc">					  				
					<!-- se o sg_lancamento == S este valor estará selecionado senão vazio -->
					<option value="S" <?=($exibe['sg_lancamento'] == 'S')?'selected':''?>>Sim</option>	<option value="N" <?=($exibe['sg_lancamento'] == 'N')?'selected':''?>>Não</option>	  
					</select>
						
					</div>
						
					<button type="submit" class="btn btn-lg btn-default">
					
					<span class="glyphicon glyphicon-pencil"> Alterar </span>
					
				</button>
				
				</form>	
			</div>
		</div>
	</div>
    <br>
	<?php include 'rodape.html' ?>
</body>
</html>