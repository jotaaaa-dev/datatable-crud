<?php

include('conexao.php');

  $sql = $pdo->prepare('UPDATE produtos SET produto = :produto WHERE codigo = :codigo');
  $sql->execute(array(
    ':codigo'   => $codigo,
    ':produto' => $produto
  ));

?>