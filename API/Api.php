<?php
    if($_SERVER['REQUEST METHOD'] == 'POST'){
        $con = mysqli_connect("localhost", "root", "", "test") or die
        ("Favor verificar conexão");

        $nomeCurso = $_POST['nomeCurso'];
        $duracaoCurso = $_POST['duracaoCurso'];
        $valorCurso = $_POST['valorCurso'];

        $comandoSql = "insert into tb_curso (nome, duracao, valor) 
                        values ('$nomeCurso','$duracaoCurso','$valorCurso')";

        if(mysqli_query($con, $comandoSql))
            echo ("true");
        else
            echo("false");
    }
?>