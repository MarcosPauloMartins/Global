<?php include './view/header.php';?>
<?php
	//error_reporting(0); // para o caso de server gratuito.
?>

<?php

    include_once "./model/database.php";
	include_once "./model/cliente.php";
	//include_once "./model/usuario.php";
    include "./view/menu.php";
    
   
    
		if (!empty($_GET['controller'])) {
		    $controller = $_GET['controller'];
		}   
		if(!$controller || $controller=='login') $controller='clientes';	
		if($controller =='clientes'){
            include './controller/clientes.php';
		}elseif($controller =='usuarios'){
			include './controller/usuarios.php';
		}
    
?>
<?php include './view/footer.php';?>