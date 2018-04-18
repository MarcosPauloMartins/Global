<?php

if($_POST[login]!=''){
    $usuario = usuario::search($_POST[login]);
    
    if($_POST[senha] == $usuario->getSenha()){
        $_SESSION['logado'] = $usuario->getNome();
        $_SESSION['usuario'] = $usuario->getUsuario();
        $_SESSION['nivel'] = $usuario->getNivel();
        $_SESSION['id'] = $usuario->getId();
        $logged = 1;
    }
}

if(!$logged){
    include "./view/login.php";
}

?>