<!DOCTYPE html>
<html lang ="pt-br">
<head>
    <meta charset="utf-8">
    <title>tabela</title>
    <style>
        .cor1{background-color: blue;}
        .cor2{background-color: yellow;}
    </style>
<body>
    <table border ="1" width="50%">
        <?php
            for($cont = 1; $cont < 16; $cont ++){
                if($cont%2 == 0){
                    echo '<tr class = "cor1">';
                    echo '<td>&nbsp;</td>';
                    echo '<td>&nbsp;</td>';
                    echo '</tr>';
            }
            else{
                    echo '<tr class = "cor2">';
                    echo '<td>&nbsp;</td>';
                    echo '<td>&nbsp;</td>';
                    echo '</tr>';
            }
        }
        ?>
    </table>    
</body>
</html>