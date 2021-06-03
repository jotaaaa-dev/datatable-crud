<?php

include('conexao.php');

        $sql = $pdo->prepare("INSERT INTO tab_familia (familia, descricao, sigla) VALUES (:familia, :descricao, :sigla)");
        $result = $sql->execute(
            array(
                ':familia'      => $_POST["familia"],
                ':descricao'=> $_POST["descricaofami"],
                ':sigla'    => $_POST["siglafami"],
            )
        );

        header("Location: indexfamilia.php")
?>