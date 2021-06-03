<?php

include('conexao.php');

  $sql = $pdo->prepare('DELETE FROM produtos WHERE codigo = :codigo');
  $sql->execute(array(
    ':codigo'   => $codigo,
  ));

?>