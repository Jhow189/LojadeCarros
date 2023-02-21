<?php
date_default_timezone_set('America/Sao_Paulo');
echo date('d/m/Y')."<br>";
echo date('H:i')."<br>";
$saudacao="";
$hora = date("H");

if ($hora >= 00 && $hora < 12){
    $saudacao = "Bom dia!";
}
else if ($hora >= 12 && $hora < 18){
    $saudacao="Boa tarde!";
}
else{
    $saudacao="Boa noite!";
}
echo $saudacao;

?>