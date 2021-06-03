<?php

include('conexao.php');

        $sql = $pdo->prepare("INSERT INTO produtos (produto, descricao, familia, unidadeMedida, custoUnitario) VALUES (:produto, :descricao, :combofamilia, :medida, :custo)");
        $result = $sql->execute(
            array(
                ':produto'      => $_POST["produto"],
                ':descricao'    => $_POST["descricao"],
                ':combofamilia' => $_POST["familia"],
                ':medida'       => $_POST["medida"],
                ':custo'        => $_POST["custo"],
            )
        );

        header("Location: index.php")
?>