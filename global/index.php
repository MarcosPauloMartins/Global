<?php error_reporting(0);?>

<?php require_once 'config.php';?>
<?php include (HEADER_TEMPLATE)?>
<?php
	//error_reporting(0); // para o caso de server gratuito.
?>

<?php
    include_once "./database.php";
	include_once "./model/cliente.php";
	include_once "./model/usuario.php";
    include BASEURL."view/menu.php";
		if (!empty($_GET['controller'])) {
		    $controller = $_GET['controller'];
		}	
		if(!$controller) $controller = $_POST['controller'];
		if(!$controller || $controller=='login') $controller='clientes';	
		if($controller =='clientes'){
			include 'controller/clientes.php';
		}elseif($controller =='usuarios'){
			include '../controller/usuarios.php';
		}elseif($controller =='blocos'){
			include '../controller/blocos.php';
		}
		elseif($controller =='apartamentos'){
		    include '../controller/apartamentos.php';
		}
    
	
?>
<?php include ('view/cadastroCliente.php');?>
<?php include (FOOTER_TEMPLATE)?>