<?php

if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['senha']) && !empty($_POST['senha'])){

    require 'conexao.php';
    require 'Usuario.class.php';

    $u = new Usuario();

    $login = addslashes($_POST['login']);
    $senha = addslashes($_POST['senha']);

    if($u->login($login, $senha) == true){
        if(isset($_SESSION['idUser'])){
            header("Location: index.php");
        }else{
            header("Location: login.php");
        }
    }else{
        header("Location: login.php");
    }

}else{
    header("Location: login.php");
}

?>
