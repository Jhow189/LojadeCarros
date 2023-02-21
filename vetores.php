<!DOCTYPE html>
<html lang ="pt-br">
<head>
    <meta charset="utf-8">
    <title>Vetores</title>
<body>
    <?php
        date_default_timezone_set('America/Sao_Paulo');

        $diaSemana[0] = "Domingo";
        $diaSemana[1] = "Segunda";
        $diaSemana[2] = "Terça";
        $diaSemana[3] = "Quarta";
        $diaSemana[4] = "Quinta";
        $diaSemana[5] = "Sexta";
        $diaSemana[6] = "Sábado";

        echo "Data: ".date("d/m/Y")."<br>";
        echo "Hoje é ".$diaSemana [date ("w")];
    ?>
</body>
</html>