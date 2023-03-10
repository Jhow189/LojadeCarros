<!DOCTYPE HTML>
<html lang="pt-br"> <!-- indicando a linguagem que iremos usar no codigo html -->
<head>
<title>Ruryon</title>
<meta charset="UTF-8"> <!-- indicando o sistema de caractere utf-8 -->

<!--
	o nosso site será responsivo, para isto precisaremos usar uma metatag
	que irá conter informações da viewport(area que o site aparece no browser)
	Na viewport informaremos que a largura sera = a largura da janela
    do meu navegador (Browser), seja em um tablet ou celular.
 -->
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery livraria -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- JavaScript compilado-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    .navbar{margin-bottom:0px}
</style>
</head>
<body>

    <?php
    session_start();
    include 'conexao.php';
    include 'nav.php';
    include 'cabecalho.html';

    $cat = $_GET['cat'];

    //variavel consulta vai receber variavel $cn que receberá o resultado de uma query
    $consulta = $cn->query("select nm_carro, vl_preco, camin_img, qt_estoque from vw_carro where ds_categoria = '$cat'");

    ?>

    <div class="container-fluid">
        <div class="row">
            <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                <div class="col-sm-3">
                    <img src="imagens/<?php echo $exibe['camin_img'];?>" class="img-responsive" style="width:100%">
                    <div><h3><b> <?php echo mb_strimwidth($exibe ['nm_carro'],0,30,'...'); ?></b></h3></div>
                    <div><h4>€ <?php echo number_format($exibe ['vl_preco'],2,',','.'); ?></h4></div>

                    <div class = "text-center">
                        <a href="detalhes.php?cd=<?php echo $exibe ['cd_carro'];?>">
                        <button class = "btn btn-lg btn-block btn-info">
                            <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
                        </button>
                        </a>
                    </div>
                    

                    <div class = "text-center" style="margin-top:5px; margin-bottom:5px;">
                        <?php if($exibe['qt_estoque'] > 0) { ?>
                        <a href="carrinho.php?cd=<?php echo $exibe ['cd_carro'];?>">
                        <button class = "btn btn-lg btn-block btn-success">
                            <span class="glyphicon glyphicon-usd"> Comprar</span>
                        </button>
                        </a>
                        <?php } else { ?>

                        <button class = "btn btn-lg btn-block btn-danger" disabled>
                            <span class="glyphicon glyphicon-remove-circle"> Indisponivel</span>
                        </button>
                        
                        <?php } ?>
                    </div>
                </div> 
            <?php } ?>
        </div>
    </div>
    <?php
        include 'Rodape.html';
    ?>
</body>
</html>
