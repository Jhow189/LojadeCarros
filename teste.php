<!DOCTYPE HTML>
<html lang="pt-br"> <!-- indicando a linguagem que iremos usar no codigo html -->
<head>
<meta charset="utf-8">
    <title>Mostrar produtos</title>
</head>
<body>
    <?php
        include 'conexao.php';

        // Variavel consulta vai receber a variavel cn que receberá o resultado de uma query
        $consulta = $cn->query('select * from vw_carro');
        // Variavel exibe receberá o resultado da consulta em forma de uma matriz tabela
        while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){

        echo $exibe ['nm_carro'].'<br>';
        echo $exibe ['vl_preco'].'<br>';
        echo '<hr>';
    }
    ?>
</body>
</html>