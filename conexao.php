<?php

    $servidor = "localhost";
    $usuario = "ead";
    $senha = "123456789";
    $banco = "db_ead";
    $cn = new PDO("mysql:host=$servidor;dbname=$banco", $usuario, $senha);
    $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>